<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/newsfeed/newsfeed.css?ts=<?=time()?>"); ?>
</head>

<body>
    <?php include "sidebar.php";?>
    <?php include "../application/views/header/header-dashboard.php";?> 
    <div class="newsfeed-wrapper">
        <div class="admin-content">
            <div class="content">
            <?php include "cashier-food-item.php";?>
            </div>
        </div>
    </div>
<!-- <script src="./dropdownlist.js"></script> -->
<?php include '../application/views/footer/footer_3.php';?>
</body>
</html>