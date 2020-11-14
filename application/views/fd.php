<!-- <?php
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "cafe99";

    // $db = mysqli_connect($server, $username, $password, $database);

    // if(mysqli_connect_errno()){
    //     echo "Error: Could not connect to database";
    //     exit;
    // }
    // $subcat_name = "Pizza";
    // $sql = "SELECT * FROM fooditem 
    // INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
    // WHERE subcategory.Subcategory_name ='".$subcat_name."'";
    // $result = mysqli_query($db, $sql);
?> -->

<!DOCTYPE html>
<html lang="en" >
<head>
  <!-- Header -->
  <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <script src="js/header.js"></script>

  <!-- Content -->
  <meta charset="UTF-8">
  <title>Products</title>
  <?php echo link_css("css/food-menu.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
  <!-- Footer -->
  <?php echo link_css("css/footer_2.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

</head>

<body style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;">
<?php  if ($this->get_session('role')=='customer'){
          include '../application/views/header/cust-logged-in-header.php';
    }else{
      include '../application/views/header/header.php';
    }
     ?>
       <ul class="breadcrumb">
        <!-- <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li> -->
        <li><?php echo anchor("account_controller/index", "Home")?></li>
        <li><?php echo $data[0]->Category_name?></li>

        <li><?php echo $data[0]->Subcategory_name?></li>
  </ul>

  <div class="food_menu_wrapper">
  <div class="container">
    <main class="grid">

      <?php
      foreach($data as $row){
      ?>

      <article>
        <?php
          $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
        ?>
        <a href="#"><img src="<?php echo $img_path;?>" alt="Image Not Found"></a>
        <div class="text">
          <h3><a href="#"><?php echo $row->Food_name; ?></a></h3>
          <p>LKR <?php echo $row->Unit_Price; ?></p>
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
  <?php include '../application/views/footer/footer_2.php';?>

</body>
</html>
