
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
  <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
  <!-- Footer -->
  <link rel="stylesheet" href="css/footer_2.css?ts=<?=time()?>">
  <?php echo link_css("css/footer.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- Jquery link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

        

</head>

<body>
  <?php include '../application/views/header/cust-logged-in-header.php';?>
  <ul class="breadcrumb">
        <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li>
        <li>Favourites</li>
  </ul>

  <!-- Delete pop up modal starts here -->
  <div id="popup-window" class="popup-window">
                <div class="win-content">
                    <p id="favNo"></p>
                    <div class="btn-container">
                        <button class="btn cancel-btn" id="modal-cancel-btn">Cancel</button>
                        <button class="btn delete-btn" id="modal-delete-btn" data-id="" >Delete</button>
                    </div>
                </div>
          </div>
  <!-- Delete pop up modal ends here -->
  

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
          <h3><?php echo anchor("food_controller/menu/".$row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID, $row->Food_name) ?></h3>
          <p>LKR <?php echo $row->Unit_Price; ?></p>
        </div>
        <div class="btn-container">
            <button id=trashbtn class="fav btn toggle-fav"><i class="far fa-trash-alt trash-btn" onclick='showDeleteModal("\"<?php echo $row->Food_name;?>\"",<?php echo $row->Food_ID;?>)'></i></button>
        </div>
      </article>

      <?php
      }
      ?>
      
    </main>
  </div>
  </div>
  <?php include '../application/views/footer/footer_1.php';?>
 
  <?php echo link_js("js/cust_myfavs.js"); ?>
</body>
</html>

