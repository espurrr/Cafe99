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

    <!-- Content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food item</title>
    <?php echo link_css("css/food-item.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <!-- Footer -->
    <?php echo link_css("css/footer_2.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
</head>
<body style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;">
<?php  if ($this->get_session('logged')){
          include '../application/views/header/cust-logged-in-header.php';
    }else{
      include '../application/views/header/header.php';
    }
?>
    <ul class="breadcrumb">
        <li><?php echo anchor("account_controller/index", "Home")?></li>
        <li><?php echo $data[0]->Category_name;?></li>
        <li><?php echo $data[0]->Subcategory_name;?></li>
        <li><?php echo $data[0]->Food_name;?></li>
    </ul>
    <?php
        foreach($data as $row)
    ?>
    <div class="food_item_wrapper">
    <div class="food_item_container">
        <?php
            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
        ?>
        <div class="container__image">
            <!-- <div class="image" style="background-image: url('<?php //echo $img_path?>');"></div> -->
            <?php
                //$img_path = "http://localhost:8080/test/VegetablesFriedRice1.jpg";
                $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
            ?>
            <img src="<?php echo $img_path; ?>" alt="Food Item"/>
        </div>
        <div class="container__text">
            <div class="availability"><p><?php echo ucfirst($row->Availability); ?></p></div>
            <h1><?php echo $row->Food_name; ?></h1>
            <div class="des"><?php echo $row->Description; ?></div>
            <div class="price">LKR: <?php echo $row->Unit_Price;?></div>
            <div class="quantity">
                <label>Quantity: </label>
                <input type="text" class="input" value="1" min="1" name="quantity"/>
            </div>
            <div class="btn-container">
                <button href="#" class="fav btn"><i class="fas fa-heart"></i></button>
                <button href="#" class="cart btn"><i class="fas fa-shopping-cart"></i> <span class="cart-text">&nbsp;&nbsp;Add to cart</span></button>
            </div>
        </div>
    </div>
    </div>
    <?php //include '../application/views/footer/footer_2.php';?>
    <?php echo link_js("js/favourites.js"); ?>
</body>
</html>
