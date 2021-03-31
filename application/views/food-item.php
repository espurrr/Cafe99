<?php
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "cafe99_test";

    // $db = mysqli_connect($server, $username, $password, $database);

    // if(mysqli_connect_errno()){
    //     echo "Error: Could not connect to database";
    //     exit;
    // }
    // $id = $_GET['id'];
    // // $id = 1;
    // $sql = "SELECT * FROM bun WHERE id=1";
    // $result = mysqli_query($db, $sql);
    // $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header -->
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- search bar -->
    <?php echo link_css("css/cust-searchbar.css?ts=<?=time()?>"); ?>

    <!-- Content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food item</title>
    <?php echo link_css("css/food-item.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <!-- Footer -->
    <?php echo link_css("css/footer_2.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

        
</head>
<body style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;" onload="avColorChange()">
<?php  if ($this->get_session('logged')){
          include '../application/views/header/cust-logged-in-header.php';
    }else{
      include '../application/views/header/header.php';
    }
?>
    <ul class="breadcrumb">
        <li><?php echo anchor("account_controller/index", "Home")?></li>
        <li><?php echo $data['data'][0]->Category_name?></li>
        <li><?php echo anchor("food_controller/menu/".$data['data'][0]->Category_name."/". $data['data'][0]->Subcategory_name, $data['data'][0]->Subcategory_name)?></li>
        <li><?php echo $data['data'][0]->Food_name;?></li>
    </ul>

    <div class="authMessage">
        <?php $this->flash('nofoodItemError','alert alert-warning','fa fa-warning'); ?>
        <?php $this->flash('databaseError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('addtocartSuccess','alert alert-success','fa fa-check'); ?>
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
    
    <div class="food_item_wrapper">
    <div class="food_item_container">
        <?php
            $img_path = BASE_URL."/public/images/food-dash-images/".$data['data'][0]->Category_name."/".$data['data'][0]->Subcategory_name."/".str_replace(' ','',$data['data'][0]->Food_name).".jpg";
        ?>
        <div class="container__image">
            <!-- <div class="image" style="background-image: url('<?php //echo $img_path?>');"></div> -->
            <?php
                //$img_path = "http://localhost:8080/test/VegetablesFriedRice1.jpg";
                $img_path = BASE_URL."/public/images/food-dash-images/".$data['data'][0]->Category_name."/".$data['data'][0]->Subcategory_name."/".str_replace(' ','',$data['data'][0]->Food_name).".jpg";
            ?>
            <img src="<?php echo $img_path; ?>" alt="Food Item"/>
        </div>
        <div class="container__text">
            <div class="availability" id="availability"><p><?php echo ucfirst($data['data'][0]->Availability); ?></p></div>
            
            <h1><?php echo $data['data'][0]->Food_name; ?></h1>
            <div class="des"><?php echo $data['data'][0]->Description; ?></div>
            <div class="price" >LKR: <?php echo $data['data'][0]->Unit_Price;?></div>
            <div class="quantity">
                <label>Quantity:&nbsp; </label>
                <input type="number" id="qty" class="input" name="quantity" value="1" min="1" max="<?php echo $data['data'][0]->Current_count;?>" onKeyDown="return false">
         
            </div>
            <div class="btn-container">
                <!-- <button href="#" class="fav btn"><i class="fas fa-heart"></i></button> -->
                
                <button id="add_to_cart_btn"
                class="<?php if($data['data'][0]->Availability == "Available") echo "cart btn shoppingcartbtn"; else echo  "disable btn shoppingcartbtn"?>" 
                data-id="<?php echo $data['data'][0]->Food_ID;?>"
                data-name="<?php echo $data['data'][0]->Food_name;?>"
                data-price="<?php echo $data['data'][0]->Unit_Price;?>"
                >
                <i class="fas fa-shopping-cart" ></i> <span class="cart-text">&nbsp;&nbsp; Add to Cart</span></button>
            </div>
        </div>
    </div>
    </div>
    <?php //include '../application/views/footer/footer_2.php';?>
    <?php echo link_js("js/cust_addtocart.js"); ?>
    <?php echo link_js("js/cust_searchbar.js"); ?>
        <script>
            function avColorChange(){
                var av_btn = document.getElementById("availability");
                if(av_btn.textContent == "Available"){
                    av_btn.classList.add("av-color");
                }else{
                    av_btn.classList.add("unav-color");
                    document.getElementById("add_to_cart_btn").disabled = true;
                }
            }
        </script>
</body>
</html>
