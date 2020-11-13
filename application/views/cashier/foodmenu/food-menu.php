<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cafe99";

    $db = mysqli_connect($server, $username, $password, $database);

    if(mysqli_connect_errno()){
        echo "Error: Could not connect to database";
        exit;
    }
    $subcat_name = "Pizza";
    $sql = "SELECT * FROM fooditem 
    INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
    WHERE subcategory.Subcategory_name ='".$subcat_name."'";
    $result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>

    
  <!-- Header -->
  <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <script src="js/header.js"></script>

  <!-- Content -->
  <meta charset="UTF-8">
  <title>Products</title>
  <?php echo link_css("css/cashier/cashier_food-menu.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
  <!-- Footer -->
  <?php echo link_css("css/footer.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php echo link_css("css/kitchen-manager/newsfeed/sidebar.css?ts=<?=time()?>"); ?>

</head>

<body style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;">
  <!-- <?php include 'header.php';?> -->
  <?php include "sidebar.php";?>
    <?php include "../application/views/header/header-dashboard.php";?> 
  <ul class="breadcrumb">
        <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li>
        <li>Subcategory</li>
  </ul>

  <?php
  //  print_r($data);
    if(count($data)==3){
      echo $data['cat'];
      echo $data['subcat'];
      echo $data['id'];
    }elseif(count($data)==2){
      echo $data['cat'];
      echo $data['subcat'];
    }
       
      
       
  
  
  ?>
  <div class="food_menu_wrapper">
  <div class="container">
    <main class="grid">
      <?php
          while($row = mysqli_fetch_assoc($result)){
      ?>
              <article> 
              <?php
                $subcat_id = $row['Subcategory_ID'];
                //$subcat_id = 1;
                $sql_cat = "SELECT category.Category_name, subcategory.Subcategory_name FROM category INNER JOIN subcategory 
                ON category.Category_ID = subcategory.Category_ID WHERE subcategory.Subcategory_ID='".$subcat_id."'"; 
                
                $result_cat = mysqli_query($db, $sql_cat);
                $row_cat = mysqli_fetch_assoc($result_cat);

                $img_path = "/public/images/food-dash-images/".$row_cat['Category_name'] ."/".$row_cat['Subcategory_name']."/".str_replace(' ','',$row['Food_name']).".jpg";
              ?>                                            
              <a href="/cafe99_food_item/food_item.php?id=<?php echo $row['Food_id']?>"><img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found"></a>
              <div class="text">
                  <h3><a href="/cafe99_food_item/food_item.php?id=<?php echo $row['id']?>"><?php echo $row['Food_name']; ?></a></h3>
                  <p>LKR <?php echo $row['Unit_Price']; ?><p>
              </div>
              <div class="btn-container">
                  <button class="fav btn"><i class="fas fa-heart"></i></button>
              </div>
              </article>

      <?php
          }
      ?>
    </main>
  </div>
  </div>
  <!-- <?php include 'footer_1.php';?> -->

</body>
</html>
