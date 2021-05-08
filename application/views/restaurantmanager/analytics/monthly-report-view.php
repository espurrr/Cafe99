<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "cafe99");  
      $sql = "select Monthname(Date(Order_Date_Time)) AS month,SUM(Item_Count) AS item_count_of_month,SUM(Total_price) AS total_price_of_month From orders where now() - INTERVAL 12 month Group By month";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["month"].'</td>  
                          <td>'.$row["item_count_of_month"].'</td>  
                          <td>'.$row["total_price_of_month"].'</td>  
                           
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
      $obj_pdf->SetTitle("Monthly Sales Report");  
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
      <h2 align="center">Monthly Sales Report | Cafe99</h2><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="30%">Month</th>  
                <th width="30%">Item Count</th>  
                <th width="40%">Total Price</th>  
                 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('monthlyfile.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <?php echo link_css("css/restaurantmanager/analytics/analytics-sidebar.css?ts=<?=time()?>");?>
      <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?> 
      <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
      <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?> 
           <title>Cafe99 | Monthly Sales Report</title>  
                      
      </head>  
      <body>
     <div class="page-container">
     <?php include "analytics-sidebar.php"; ?>
     <div class="content-wrapper">
     <?php include  "../application/views/header/header-dashboard.php";?>  
           <br />

        <div class="wrapper">
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
        <div class="content">    
                <h1 align="center"> Monthly Sales Report</h1><br />  
                  
                    
                     <form method="post">  
                           
                          <div class="btn-container">
                          <button type="submit" name="generate_pdf" class="btn submit-btn">Generate PDF</button>
                          </div>
                     
                     </form>  
                     
                     <br/>
                     <br/>
                     <table>  
                          <tr>  
                               <th width="30%">Month</th>  
                               <th width="30%">Item Count</th>  
                               <th width="40%">Total Price</th>    
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>

       </div>
       </div>
       </div>  
                  
 </div><!-- content-wrapper ends here -->
<?php include '../application/views/footer/footer_3.php';?> 
</div><!-- page-container ends here -->     
      </body>  
</html>