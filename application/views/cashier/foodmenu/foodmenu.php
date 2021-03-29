<?php
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "cafe99";
    // $db = mysqli_connect($server, $username, $password, $database);
    // $sql = "SELECT * FROM bun"; 
    // $result = mysqli_query($db, $sql);

    // Search button
    // if (isset($_GET['search'])){
    //     $id = $_GET['search'];
    //     $sql = "SELECT * FROM bun WHERE title LIKE '%".$id."%'"; 
    //     $result = mysqli_query($db, $sql);
    // }
    // Available button
    // if (isset($_POST['av'])){
    //     $id = (int)$_POST['av'];
    //     $sql = "UPDATE bun SET availability='available' WHERE id=$id"; 
    //     mysqli_query($db, $sql);
    //     header('Location: food_menu.php');
    // }
    // //Unavailable button
    // else if(isset($_POST['unav'])){
    //     $id = (int)$_POST['unav'];
    //     $sql = "UPDATE bun SET availability='unavailable' WHERE id=$id"; 
    //     mysqli_query($db, $sql);
    //     header('Location: food_menu.php');
    // }
 
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
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/foodmenu/foodmenu.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/foodmenu/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body onload="changeAvButton()">
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php"?>
    <div class="content-wrapper" >

    <?php include '../application/views/header/header-dashboard.php';?>

    <div class="tab" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;" >
        <button class="tablinks active" onclick="changeFoodTab(event, 'food')">Food</button>
        <button class="tablinks" onclick="changeFoodTab(event, 'drinks')">Drinks</button>
        <button class="tablinks" onclick="changeFoodTab(event, 'desserts')">Desserts</button>
    </div>
    
    <!-- ************ Food ************ -->
    <div id="food" class="menu_container" style="display: block;">
        <!-- <div class="search_container">
            <form>
                <input type="text" placeholder="Search.." name="search" onkeyup="showResult(this.value)">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->
        <div class="status-msg-wrapper">
            <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('updateSuccess','alert alert-success','fa fa-check'); ?>
            </div>
            <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('updateUnsuccess','alert alert-danger','fa fa-times-circle'); ?>
            </div>
        </div>
    

        <div class="subcategory-title">Rice</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Rice"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                            <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="addtocartbtn" >Add to Cart</button>
                        </div>
                        
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Pizza</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Pizza"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                            
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Savouries</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Savouries"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>    
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Cakes</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Cakes"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                            
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>
        
        <div class="subcategory-title">NoodlesPasta</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "NoodlesPasta"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Biriyani</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Biriyani"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Buns</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Food" && $row->Subcategory_name === "Buns"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>
    </div>

    <div id="drinks" class="menu_container" >

        <div class="subcategory-title">Coffee</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Drinks" && $row->Subcategory_name === "Coffee"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Fresh Fruit Juice</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Drinks" && $row->Subcategory_name === "Fresh Fruit Juice"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <img src="<?php echo $img_path;?>" alt="Image Not Found">
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Ice Blended</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Drinks" && $row->Subcategory_name === "Ice Blended"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <img src="<?php echo $img_path;?>" alt="Image Not Found">
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Milk Shakes</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Drinks" && $row->Subcategory_name === "Milk Shakes"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <img src="<?php echo $img_path;?>" alt="Image Not Found">
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Tea</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Drinks" && $row->Subcategory_name === "Tea"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

    </div>
    
    <div id="desserts" class="menu_container">

        <div class="subcategory-title">Ice creams</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Desserts" && $row->Subcategory_name === "Ice creams"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                            
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Custards & Puddings</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Desserts" && $row->Subcategory_name === "Custards&Puddings"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                            
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Muffins</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Desserts" && $row->Subcategory_name === "Muffins"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                            
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>

        <div class="subcategory-title">Cheese Cakes</div>
        <main class="grid">

            <?php foreach($data as $row): ?>
            <?php if($row->Category_name === "Desserts" && $row->Subcategory_name === "CheeseCakes"):?>
                    <article>
                        <?php
                            $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <!-- <img src="<?php echo $img_path;?>" alt="Image Not Found"> -->
                        <div class="text">
                            <h4><?php echo $row->Food_name;?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>

                        <?php echo form_open("km_controller/updateAvailability","POST");?>
                        <!-- <form action="" method="POST"> -->
                        <div class="btn-container">
                        <div class="row">
                                    <!-- <button class="button-cart">-</button> -->
                                        <input type="text" class="input-cart" value="1" min="1" />
                                    <!-- <button class="button-cart">+</button> -->
                                </div>
                            <button class="btn" >Add to Cart</button>
                            
                        </div>
                        <?php echo form_close();?>
                        <!-- </form> -->
                    </article>
            <?php endif; ?>
            <?php endforeach; ?>
        </main>
    </div>

    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_3.php';?>

    </div> <!-- page-contianer ends-->
    <?php echo link_js("js-cashier/foodmenu/cashier_addtocart.js"); ?>
    <?php echo link_js("js/kitchen-manager/foodmenu/searchbar.js"); ?>
    <?php echo link_js("js/kitchen-manager/foodmenu/foodmenu.js"); ?>
</body>
</html> 
<script>
    $(function() {
 $(".button-cart").on("click", function() {
   var $button = $(this);
   var $parent = $button.parent(); 
   var oldValue = $parent.find('.input-cart').val();

   if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 1;
      }
      }
    $parent.find('a.add-to-cart').attr('data-quantity', newVal);
    $parent.find('.input-cart').val(newVal);
 });
});
</script>