<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cafe99";
    $db = mysqli_connect($server, $username, $password, $database);
    // $sql = "SELECT * FROM bun"; 
    // $result = mysqli_query($db, $sql);

    // Search button
    if (isset($_GET['search'])){
        $id = $_GET['search'];
        $sql = "SELECT * FROM bun WHERE title LIKE '%".$id."%'"; 
        $result = mysqli_query($db, $sql);
    }
    //Available button
    if (isset($_POST['av'])){
        $id = (int)$_POST['av'];
        $sql = "UPDATE bun SET availability='available' WHERE id=$id"; 
        mysqli_query($db, $sql);
        header('Location: food_menu.php');
    }
    //Unavailable button
    else if(isset($_POST['unav'])){
        $id = (int)$_POST['unav'];
        $sql = "UPDATE bun SET availability='unavailable' WHERE id=$id"; 
        mysqli_query($db, $sql);
        header('Location: food_menu.php');
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/foodmenu/foodmenu.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/foodmenu/sidebar.css?ts=<?=time()?>"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>
    <?php include "sidebar.php"?>
    <?php include '../application/views/header/header-dashboard.php';?>

    <div class="tab">
        <button class="tablinks active" onclick="changeFoodTab(event, 'food')">Food</button>
        <button class="tablinks" onclick="changeFoodTab(event, 'drinks')">Drink</button>
        <button class="tablinks" onclick="changeFoodTab(event, 'desserts')">Dessert</button>
    </div>
    
    <!-- ************ Food ************ -->
    <div id="food" class="menu_container" style="display: block;">
        <!-- <div class="search_container">
            <form>
                <input type="text" placeholder="Search.." name="search" onkeyup="showResult(this.value)">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->

        <div class="subcategory-title">Bun</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Food' AND subcategory.Subcategory_name = 'Bun'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                        <!-- <button class="available btn" id="av-btn" type="submit" name="av" value="<?php //echo $row['id'];?>" onclick="change_av(this.value)"><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php //echo $row['id'];?>" onclick="change_unav(this.value)"><i class="fas fa-times"></i></button> -->
                    
                    
                        <!-- <button class="available btn" id="av-btn" type="submit" data-btn-id="<?php //echo $row['id'];?>"><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit" data-btn-id="<?php //echo $row['id'];?>"><i class="fas fa-times"></i></button> -->
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>

        <div class="subcategory-title">Pizza</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Food' AND subcategory.Subcategory_name = 'Pizza'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>
        <div class="subcategory-title">Savouries</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Food' AND subcategory.Subcategory_name = 'Savouries'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>

        <div class="subcategory-title">Cake</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Food' AND subcategory.Subcategory_name = 'Cake'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>
    </div>

    <!-- ************ Drinks ************ -->
    <div id="drinks" class="menu_container">
        <!-- <div class="search_container">
            <form>
                <input type="text" placeholder="Search.." name="search" onkeyup="showResult(this.value)">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->

        <div class="subcategory-title">Fresh Fruit Juice</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Drinks' AND subcategory.Subcategory_name = 'Fresh Fruit Juice'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>

        <div class="subcategory-title">Ice Blended</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Drinks' AND subcategory.Subcategory_name = 'Ice Blended'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>
    </div>

    <!-- ************ Desserts ************ -->
    <div id="desserts" class="menu_container">
        <!-- <div class="search_container">
            <form>
                <input type="text" placeholder="Search.." name="search" onkeyup="showResult(this.value)">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->

        <div class="subcategory-title">Ice Cream</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Desserts' AND subcategory.Subcategory_name = 'Ice-cream'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>

        <div class="subcategory-title">Cheese Cake</div>
        <main class="grid" id="grid">
            <?php
                $sql = "SELECT fooditem.Food_ID AS id, fooditem.Food_name AS title, fooditem.Availability AS availability, subcategory.Subcategory_name, category.Category_name 
                        FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
                        INNER JOIN category ON subcategory.Category_ID = category.Category_ID
                        WHERE category.Category_name = 'Desserts' AND subcategory.Subcategory_name = 'CheeseCake'"; 
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                    <?php
                        $img_path = "/public/images/food-dash-images/".$row['Category_name'] ."/".$row['Subcategory_name']."/".str_replace(' ','',$row['title']).".jpg";  
                    ?>
                    <img src="<?php echo BASE_URL; echo $img_path;?>" alt="Image Not Found">
                    <div class="text">
                        <h4><?php echo $row['title'];?></h4>
                        <p>Product ID :  <?php echo $row['id']; ?></p>
                        <p class="availability" id="availability"><?php echo $row['availability']; ?></p>
                    </div>

                    <form method="POST" action="">
                    <div class="btn-container">
                        <button class="available btn" id="av-btn" type="submit" name="av" value="<?php echo $row['id'];?>" ><i class="fas fa-check"></i></button>
                        <button class="unavailable btn" id="unav-btn" type="submit"  name="unav" value="<?php echo $row['id'];?>"><i class="fas fa-times"></i></button>
                    
                    </div>
                    </form>
                </article>
            <?php
                }
            ?>
        </main>
    </div>

    <?php echo link_js("js/kitchen-manager/foodmenu/searchbar.js"); ?>
    <?php echo link_js("js/kitchen-manager/foodmenu/foodmenu.js"); ?>
</body>
</html> 