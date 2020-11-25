<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager Dashboard</title>
    <?php echo link_css("css/restaurantmanager/analytics/analytics-sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/analytics/analyticsnew.css?ts=<?=time()?>");?>

</head>
</head>
<body>
    <?php include "analytics-sidebar.php"; ?>
    <?php include  "../application/views/header/header-dashboard.php";?>
    
    <div class="wrapper">
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
       
   <!--<a href="#" class="button">Export</a>
       <a href="chart.php" class="button">Get Chart</a>-->
      

        <div class="content">
        <div class="row">
     <!--   <div class="box">-->
            <div class="column">
            <div class="order-received-box">
            <h2>Orders received:</h2><br>
            <h2>250</h2>
            </div>
            </div>

            <div class="column">
            <div class="order-delivered-box">
            <h2>Orders deilivered:</h2><br>
            <h2>100</h2>
            </div>
            </div>

            <div class="column">
            <div class="new-customer-box">
            <h2>New Customer:</h2><br>
            <h2>23</h2>
            </div>
            </div>

            <div class="column">
            <div class="net-earning-box">
            <h2>Net earning:</h2><br>
            <h2>Rs.15,000</h2>
            </div>
          </div> 
            
        </div>
<br><br><br>
        <div class="column-line">
            <div class="column-graph">
            <?php //include "column.php"?>
            <img src="<?php echo BASE_URL?>/public/images/analytics-chart/column.jpg">
           </div>
          
            <div class="line-graph">
            <?php //include "line.php"?>
            <img src="<?php echo BASE_URL?>/public/images/analytics-chart/line.jpg">
            </div>
        </div>
            
           
            <div class="cus-pay">
            <div class="customer-pie-chart">
            <?php //include "cuspie.php"?>
            <img src="<?php echo BASE_URL?>/public/images/analytics-chart/cuspie.jpg">
            </div>

            <div class="payment-pie-chart">
            <?php //include "paymentpie.php"?>
            <img src="<?php echo BASE_URL?>/public/images/analytics-chart/paymentpie.jpg">
            </div>
            </div>
        </div>
       </div>
   
  
</div>
<?php //include '../application/views/footer/footer_3.php';?> 

</body>
</html>