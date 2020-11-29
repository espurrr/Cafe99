<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
 <!--   <link rel="stylesheet" href="contact.css">-->
 <?php echo link_css("css/footercontent/contact/contact.css?ts=<?=time()?>"); ?>
 <!--   <link rel="stylesheet" href="sidebar.css">-->
 <?php echo link_css("css/footercontent/contact/sidebar.css?ts=<?=time()?>"); ?>
    <title>Contact</title>
</head>
<body style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<div class="page-container">
<div class="content-wrapper" >

<?php   
        if ($this->get_session('role')=='customer'){
            include '../application/views/header/cust-logged-in-header.php';
        }else{
            include '../application/views/header/header.php';
        }
    ?>  
<?php // include "sidebar.php";?>
<div class="wrapper">
    <div class="contact-content">
    <br><br>
     <h1>Contact us</h1>
     <br><br><br><br>
     <li><i class="fa fa-map-marker" style="font-size:24px;padding-right:20px"></i>Maharagama,Colombo</li><br><br><br>
     <li><i class='fas fa-phone' style='font-size:24px;padding-right:20px'></i>0112-554534</li><br><br><br>
     <li><i class='fas fa-at' style='font-size:24px;padding-right:20px'></i>cafe99.teamdashcode@gmail.com</li><br><br><br>
<!--<a href="#"><i class="fa fa-map-marker" style="font-size:24px;padding-right:20px"></i>Maharagama,Colombo</a><br><br>
<a href="#"><i class='fas fa-phone' style='font-size:24px;padding-right:20px'></i>0112-554534</a><br><br>
<a href="#"><i class='fas fa-at' style='font-size:24px;padding-right:20px'></i>cafe99.teamdashcode@gmail.com</a><br>-->

     </div>
</div>
</div><!-- content-wrapper ends-->
<?php include '../application/views/footer/footer_1.php';?> 
</div> <!-- page-contianer ends-->     
</body>
</html>