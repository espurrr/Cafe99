<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhostg", "root", "", "cafe99");  
      $sql = "select Date(Order_Date_Time) AS date,SUM(Item_Count) AS item_count_of_day,SUM(Total_price) AS total_price_of_day From orders where (CURRENT_DATE - INTERVAL 7 DAY) Group By date";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["date"].'</td>  
                          <td>'.$row["item_count_of_day"].'</td>  
                          <td>'.$row["total_price_of_day"].'</td>  
                           
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Weekly Sales Report");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Weekly Sales Report</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="30%">Date</th>  
                <th width="30%">Item Count</th>  
                <th width="40%">Total Price</th>  
                 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head> 
      <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?> 
           <title>Cafe99 | Weekly Sales Report</title>  
                      
      </head>  
      <body>  
           <br />
             
                <h4 align="center"> Weekly Sales Report</h4><br />  
                  
                    
                     <form method="post">  
                           
                          <div class="btn-container">
                          <button type="submit" name="generate_pdf" class="btn submit-btn">Generate PDF</button>
                          </div>
                     
                     </form>  
                     
                     <br/>
                     <br/>
                     <table>  
                          <tr>  
                               <th width="30%">Date</th>  
                               <th width="30%">Item Count</th>  
                               <th width="40%">Total Price</th>    
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                  
             
      </body>  
</html>