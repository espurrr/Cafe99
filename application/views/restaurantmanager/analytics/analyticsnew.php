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
<div class="page-container">
    <?php include "analytics-sidebar.php"; ?>
    <div class="content-wrapper">
    <?php include  "../application/views/header/header-dashboard.php";?>
    
    <div class="wrapper">
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
       
   <!--<a href="#" class="button">Export</a>
       <a href="chart.php" class="button">Get Chart</a>-->
    <?php 
    $d=[
        'card1'=>$data['count'],
        'card2'=>$data['delivery_count'],
        'card3'=>$data['sum'],
        'card4'=>$data['new_customer'],
    ];
    ?>

        <div class="content">
        <?php //foreach($data as $row) {?>
        <div class="row">
        
     <!--   <div class="box">-->
            <div class="column">
            <div class="order-received-box">
            <h3>Orders received</h3><br>
            <h1><?php print_r($d['card1']);?></h1>
            </div>
            </div>

            <div class="column">
            <div class="order-delivered-box">
            <h3>Orders delivered</h3><br>
            <h1><?php print_r($d['card2']);?></h1>
            </div>
            </div>

            <div class="column">
            <div class="new-customer-box">
            <h3>New Customer</h3><br>
            <h1><?php print_r($d['card4']);?></h1>
            </div>
            </div>

            <div class="column">
            <div class="net-earning-box">
            <h3>Net earning</h3><br>
            <h1>Rs.<?php print_r($d['card3']);?></h1>
            </div>
          </div> 
            
        </div>
        <?php //} ?>
<br><br><br>
<div class="chart"><?php include 'multichart.php';?></div>
<div class="report"><?php echo anchor("rm_controller/weeklyReport", "Get Weekly Sales Report",['class'=>"button"])?>
<?php echo anchor("rm_controller/monthlyReport", "Get Monthly Sales Report",['class'=>"button"])?>
</div>
       <!-- <div class="column-line">
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
            </div>-->
        </div>
       </div>
   
  
</div>
</div><!-- content-wrapper ends here -->
<?php include '../application/views/footer/footer_3.php';?> 
</div><!-- page-container ends here -->
</body>
</html>