<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
 <!--   <link rel="stylesheet" href="aboutus.css">-->
 <?php echo link_css("css/footercontent/aboutus/aboutus.css?ts=<?=time()?>"); ?>
 <!--   <link rel="stylesheet" href="sidebar.css">-->
 <?php echo link_css("css/footercontent/aboutus/sidebar.css?ts=<?=time()?>"); ?>
    <title>About Us</title>
</head>
<body>
<?php include '../application/views/header/header.php';?>   
<?php include "sidebar.php";?>
<div class="topic">
<h1>About Us</h1>
</div>
<br><br>
<div class="wrapper">
    <div class="aboutus-content">
    <h1>Providing a Daily,fresh baking concepts that complements the needs of the urban household !</h1>
   </div>
<br><br>
   <div class="content">
       <p>At the heart of what we do is the idea of providing a daily, fresh baking concept that complements the needs of the urban household. We strive to be the country leading bakery known for quality, service standard and value. We currently operate 50 outlets.</p>
   </div>
   <br><br><br><br><br><br>
 <!--  <div class="img">
       <img src="cafe99.jpg" style="padding-right:100px;">
       <img src="Staffpic.jpg" style="padding-right:100px;">
       <img src="caf.jpg">
   </div>-->
</div>
<?php include '../application/views/footer/footer_1.php';?>    
</body>
</html>