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
      
      <!-- search bar -->
      <?php echo link_css("css/cust-searchbar.css?ts=<?=time()?>"); ?>

      <!-- Content -->
      <meta charset="UTF-8">
      <title>Products</title>
      <?php echo link_css("css/food-menu.css?ts=<?=time()?>"); ?>
      <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
      
      <!-- Footer -->
      <?php echo link_css("css/footer_2.css?ts=<?=time()?>"); ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
      <!-- Jquery link -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
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
            <li><?php echo $data['data'][0]->Category_name?></li>
            <li><?php echo anchor("food_controller/menu/".$data['data'][0]->Category_name."/". $data['data'][0]->Subcategory_name, $data['data'][0]->Subcategory_name)?></li>
            
      </ul>

      <div class="authMessage">
        <?php $this->flash('nofoodError','alert alert-warning','fa fa-warning'); ?>
        <?php $this->flash('databaseError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('nofoodItemError','alert alert-warning','fa fa-times-circle'); ?>
      </div>

      <!-- Food names are concatenated into a single string -->
      <?php
          $food_names = "";
          foreach($data['food_names'] as $row){
            $food_names .= $row->Food_name . ",";
          }
          $food_names = rtrim($food_names, ",");
      ?>
      <!-- Hidden field to store all the foodname -->
      <input type="hidden" id="search_food_names" value="<?php echo $food_names; ?>">

      <!-- Search bar -->
      <div class="search_container search_page" id="search_page_container" style="display: none">
          <?php //echo form_open("food_controller/searchfood", "POST");?>
          <form autocomplete="off" action="<?php echo BASE_URL ?>/food_controller/search_food" method="POST">
            <div class="autocomplete" style="width:300px;">
              <input id="search_page" type="text" name="search_food" placeholder="Search...">
            </div>
            <button type="submit" id="searchbar_submit"><i class="fa fa-search"></i></button>
          </form>
          <?php //echo form_close();?>
      </div>

      <div class="food_menu_wrapper">
      <div class="container">
        <main class="grid">
    
          <?php
          $isfav = new Food_model;
          // print_r($data['data']); 
          foreach($data['data'] as $row){
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
                <?php if ($isfav->is_favorite($row->Food_ID)){ ?>
                <button id=heartbtn class="fav btn toggle-fav"><i class="fas fa-heart heart-btn" data-id="<?php echo $row->Food_ID;?>"></i></button>
                <?php } else{?>
                <button id=heartbtn class="fav btn toggle-fav"><i class="far fa-heart heart-btn" data-id="<?php echo $row->Food_ID;?>"></i></button>
                <?php } ?>
            </div>
          </article>
    
          <?php
          }
          ?>
          
         
        </main>
      </div>
      </div>
      <!-- <?php include '../application/views/footer/footer_2.php';?> -->
      <?php echo link_js("js/favourites.js"); ?>
      <?php echo link_js("js/cust_searchbar.js"); ?>
    <!-- Jquery scrips goes here -->
     
    </body>
    </html>
    