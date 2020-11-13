
<!DOCTYPE html>
<html lang="en" >
<head>
  <!-- Header -->
  <?php echo link_css("css/cust-logged-in-header.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  

  <!-- Content -->
  <meta charset="UTF-8">
  <title>Favorites</title>
  <?php echo link_css("css/cust-favorites.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
  <!-- Footer -->
  <link rel="stylesheet" href="css/footer_2.css?ts=<?=time()?>">
  <?php echo link_css("css/footer.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

</head>

<body>
  <?php include '../application/views/header/cust-logged-in-header.php';?>
  <ul class="breadcrumb">
        <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li>
        <li>Favorites</li>
  </ul>
  <div class="food_menu_wrapper">
  <div class="container">
    <main class="grid">
      <?php
          while($row = mysqli_fetch_assoc($result)){
      ?>
              <article>
              <a href="/cafe99_food_item/food_item.php?id=<?php echo $row['id']?>"><img src="<?php echo "img/".$row['img_no'].".jpg"; ?>" alt="Bun"></a>
              <div class="text">
                  <h3><a href="/cafe99_food_item/food_item.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a></h3>
                  <p>LKR <?php echo $row['price']; ?><p>
              </div>
              <div class="btn-container">
                  <button class="bin btn"><i class="far fa-trash-alt"></i></button>
              </div>
              </article>

      <?php
          }
      ?>
    </main>
  </div>
  </div>
  <?php include '../application/views/footer/footer_1.php';?>

</body>
</html>
