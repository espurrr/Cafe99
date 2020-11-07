<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager Dashboard</title>
    <link rel="stylesheet" href="analytics.css">
    <link rel="stylesheet" href="analytics-sidebar.css">
    <link rel="stylesheet" href="../header-dashboard.css">
    <link rel="stylesheet" href="../admin.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js">
    <script src="analytics.js"></script>
</head>
</head>
<body>
    <?php include "analytics-sidebar.php"; ?>
    <?php include "../header-dashboard.php"; ?> 
    
    <div class="wrapper">
        <div class="admin-content">
       
       <a href="#" class="button">Export</a>
       <a href="chart.php" class="button">Get Chart</a>
      

        <div class="content">
            <h2 class="page-title">Sales Analytics Of Week</h2>
            <div style="overflow-x:auto;">
            <table id="dataTable">
                <tr>
                <th>Date</th>
                <th>Sum Of Quantity</th>
                <th>Sum Of Price</th>
                </tr>
                
                   <tr>
                    <td>Sunday</td>
                    <td>300</td>
                    <td>70000</td>
                   </tr>
                    <tr>
                    <td>Monday</td>
                    <td>175</td>
                    <td>50000</td>
                   </tr>
                   <tr>
                   <td>Tuesday</td>
                    <td>164</td>
                    <td>50550</td>
                   </tr>
                   <tr>
                    <td>Wendesday</td>
                    <td>190</td>
                    <td>54800</td>
                   </tr>
                   <tr>
                    <td>Thursday</td>
                    <td>100</td>
                    <td>40000</td>
                   </tr>
                   <tr>
                    <td>Friday</td>
                    <td>250</td>
                    <td>70000</td>
                   </tr>
                   <tr>
                    <td>Saturday</td>
                    <td>189</td>
                    <td>67900</td>
                   </tr>
                   <tr>
                    <td><b>Total of week</b></td>
                    <td><b>1368</b></td>
                    <td><b>403250</b></td>
                   </tr>
                 
               
            </table>
            <div id="chartContainer" style="height: 360px; width: 100%;"></div>
            </div>
        </div>
       </div>
   
  
</div>


</body>
</html>