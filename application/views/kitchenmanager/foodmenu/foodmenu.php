<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/foodmenu/foodmenu.css?ts=<?=time()?>"); ?>
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

    <?php foreach($data['category'] as $category): ?>
        <?php if($status == $category->Category_name): ?>
            <div class="tab" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
                <?php foreach($data['category'] as $inner_category): ?>
                    <button class="tablinks <?php if($inner_category->Category_name == $status) echo "active"?>" onclick="changeFoodTab(event, '<?php echo strtolower($inner_category->Category_name) ?>')"><?php echo $inner_category->Category_name?></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    

    <!-- ************ Category ************ -->
    <?php foreach($data['category'] as $category): ?>
    <div id="<?php echo strtolower($category->Category_name) ?>" class="menu_container" style="display: <?php echo ($status == $category->Category_name) ? "block": "none"; ?>;">
    <div class="reset_btn_contianer">
        <form action="<?php echo BASE_URL; ?>/km_controller/updateCountToDefault/<?php echo $category->Category_name ?>" method="POST">
            <button class="reset-btn">Reset <?php echo $category->Category_name; ?> Count</button>
        </form>
    </div>
    

    <!-- ************ Search bar ************ -->
        <div class="search_container">
            <?php //echo form_open("km_controller/searchfood/Food", "POST");?>
            <form action="<?php echo BASE_URL; ?>/km_controller/searchfood/<?php echo $category->Category_name ?>" method="POST">
                <input type="text" placeholder="Search.." name="search" value="<?php if($foodname != "") echo $foodname; ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <?php //echo form_close();?>
        </div>

        <!-- ************ Flash msgs ************ -->
        <?php if($status == $category->Category_name): ?>
        <div class="status-msg-wrapper">
            <div class="status-msg" style="margin-bottom:20px">
                <?php $this->flash('updateSuccess','alert alert-success','fa fa-check'); ?>
                <?php $this->flash('updateUnsuccess','alert alert-danger','fa fa-times-circle'); ?>
                <?php $this->flash('foodNotFound','alert alert-warning','fa fa-times-circle'); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- ************ Searched results ************ -->
        <?php if ($searched == true): ?>
        <?php if ($status == $category->Category_name): ?>
        <div class="subcategory-title">Result</div>
            <main class="grid">
            <?php foreach($data['food'] as $row): ?>
            <?php if($row->Category_name === $category->Category_name): ?>
                <article>
                    <?php
                        $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                    ?>
                    <img src="<?php echo $img_path;?>" alt="Image Not Found">
                    <div class="foodname">
                        <h4><?php echo $row->Food_name;?></h4>
                    </div>

                    <div class="quantity">
                    <?php echo form_open("km_controller/updateCurrentCount/".$row->Food_ID."/".$category->Category_name, "POST");?>
                        <label for="quantity">Count :</label>
                        <input type="number" id="quantity" name="quantity" value=<?php echo $row->Current_count;?> min="1" max="1000">
                        <input type="submit" value="submit">
                        <!-- <button type="submit" id="count_submit"><i class="fas fa-check"></i></button> -->
                    <?php echo form_close();?>
                    </div>

                    <div class="text">
                        <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                        <p class="availability"><?php echo $row->Availability; ?></p>
                    </div>

                    <?php echo form_open("km_controller/updateAvailability/".$row->Category_name, "POST");?>
                    <!-- <form action="" method="POST"> -->
                    <div class="btn-container">
                        <button class="btn inactive av-btn" disabled type="submit" name="av" value="<?php echo $row->Food_ID;?>" ><i class="fas fa-check"></i></button>
                        <button class="btn inactive unav-btn" disabled type="submit"  name="unav" value="<?php echo $row->Food_ID;?>"><i class="fas fa-times"></i></button>                 
                    </div>
                    <?php echo form_close();?>
                    <!-- </form> -->
                </article>
            <?php endif; ?>
            <?php endforeach; ?><!-- Food ends here -->
            </main>
        <?php endif; ?>
        <?php endif; ?>

    <!-- ************ Subcategory ************ -->
        <?php if ($searched == false): ?>
        <?php foreach($data['subcat'] as $subcat): ?>
            <?php if($subcat->Category_name === $category->Category_name):?>
                <div class="subcategory-title" ><?php echo $subcat->Subcategory_name; ?></div>
                    <main class="grid">
                    <!-- ************ Food items ************ -->
                    <?php foreach($data['food'] as $row): ?>
                    <?php if($row->Category_name === $category->Category_name && $row->Subcategory_name === $subcat->Subcategory_name):?>
                            <article>
                                <?php
                                    $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                                ?>
                                <img src="<?php echo $img_path;?>" alt="Image Not Found">
                                <div class="foodname">
                                    <h4><?php echo $row->Food_name;?></h4>
                                </div>

                                <div class="quantity">
                                <?php echo form_open("km_controller/updateCurrentCount/".$row->Food_ID."/".$category->Category_name, "POST");?>
                                    <label for="quantity">Count :</label>
                                    <input type="number" id="quantity" name="quantity" value=<?php echo $row->Current_count;?> min="1" max="1000">
                                    <input type="submit" value="submit">
                                <?php echo form_close();?>
                                </div>

                                <div class="text">
                                    <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                                    <p class="availability"><?php echo $row->Availability; ?></p>
                                </div>
                                

                                <?php echo form_open("km_controller/updateAvailability/".$row->Category_name, "POST");?>
                                <!-- <form action="" method="POST"> -->
                                <div class="btn-container">
                                    <button class="btn inactive av-btn" disabled type="submit" name="av" value="<?php echo $row->Food_ID;?>" ><i class="fas fa-check"></i></button>
                                    <button class="btn inactive unav-btn" disabled type="submit"  name="unav" value="<?php echo $row->Food_ID;?>"><i class="fas fa-times"></i></button>                 
                                </div>
                                <?php echo form_close();?>
                                <!-- </form> -->
                            </article>
                    <?php endif; ?>
                <?php endforeach; ?><!-- Food/ Drinks/ Desserts ends here -->
                </main>
            <?php endif; ?>
        <?php endforeach; ?><!-- subcat ends here -->
        <?php endif; ?>

        
    </div> <!--Category ends here -->
    <?php endforeach; ?><!-- Category ends here --> 

    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_3.php';?>
    </div> <!-- page-contianer ends-->
    
    <?php echo link_js("js/kitchen-manager/foodmenu/searchbar.js"); ?>
    <?php echo link_js("js/kitchen-manager/foodmenu/foodmenu.js"); ?>

</body>
</html> 