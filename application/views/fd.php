<!DOCTYPE html>
<html lang="en" >
<head>
 
  <!-- Content -->
  <meta charset="UTF-8">
  <title>Products</title>
  <?php echo link_css("css/food-menu.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 
</head>

<body>
<?php  if ($this->get_session('logged')){
          include 'header/cust-logged-in-header.php';
    }else{
      include 'header/header.php';
    }
     ?>
 
  <ul class="breadcrumb">
        <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li>
        <li>Subcategory</li>
  </ul>
  <div class="food_menu_wrapper">
  <div class="container">
    <main class="grid">




     
    </main>
  </div>
  </div>
  <?php include 'footer/footer_1.php';?>

</body>
</html>
