<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/foodmenu/searchbar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/foodmenu/foodmenu.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/foodmenu/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>

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

        <!-- ************ Search bar ************ -->
        <div class="search_container">
            <?php //echo form_open("cashier_controller/searchfood/Food", "POST");?>
            <form action="<?php echo BASE_URL; ?>/cashier_controller/searchfood/<?php echo $category->Category_name ?>" method="POST">
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
                <article class="row">
                    <div class="column column1">
                        <div class="column_data_wrapper foodname_data_wrapper">
                            <h4><?php echo $row->Food_name; ?></h4>
                            <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                        </div>
                    </div>

                    <div class="column column2">
                        <div class="column_data_wrapper price_data_wrapper">
                            <p>Price :  <?php echo $row->Unit_Price; ?></p>
                        </div>
                    </div>

                    <div class="text column column3">
                        <div class="column_data_wrapper av_data_wrapper">
                            <p class="availability"><?php echo $row->Availability; ?></p>
                        </div>
                    </div>

                    <div class="column column4">
                        <div class="quantity_data_wrapper">
                            <div class="label_div">Quantity:</div>
                            <input type="number" id="qty" class="input" name="quantity" value="1" min="1" max="<?php echo $data['data'][0]->Current_count;?>">
                        </div>
                    </div>

                    <div class="action_container column column5">

                        <div class="action_data_wrapper">
                            <button id="add_to_cart_btn<?php echo  $row->Food_ID ?>"
                                <?php if($row->Availability == "Unavailable") echo "disabled"?>
                                class="<?php if($row->Availability == "Available") echo "cart btn shoppingcartbtn"; else echo"cart btn disablecartbtn"?>" 
                                onclick="onclickAddToCart(<?php echo  $row->Food_ID ?>)"
                                data-id="<?php echo  $row->Food_ID ?>"
                                data-name="<?php echo $row->Food_name ?>"
                                data-price="<?php echo $row->Unit_Price;?>"
                                data-cat="<?php echo $row->Category_name;?>"
                                data-subcat="<?php echo $row->Subcategory_name;?>"
                                >Add to Cart</button>
                        </div>
                        
                    </div><!-- action_container ends here -->
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
                            <article class="row">
                                <div class="column column1">
                                    <div class="column_data_wrapper foodname_data_wrapper">
                                        <h4><?php echo $row->Food_name; ?></h4>
                                        <p>Product ID :  <?php echo $row->Food_ID; ?></p>
                                    </div>
                                </div>

                                <div class="column column2">
                                    <div class="column_data_wrapper price_data_wrapper">
                                        <p>Price :  <?php echo $row->Unit_Price; ?></p>
                                    </div>
                                </div>

                                <div class="column column3">
                                    <div class="column_data_wrapper av_data_wrapper">
                                        <p class="availability"><?php echo $row->Availability; ?></p>
                                    </div>
                                </div>

                                <div class="column column4">
                                    <div class="quantity_data_wrapper">
                                        <div class="label_div">Quantity:</div>
                                        <input type="number" id="qty<?php echo  $row->Food_ID ?>" class="input" name="quantity" value="1" min="1" max="<?php echo $data['data'][0]->Current_count;?>">
                                    </div>
                                </div>

                                <div class="action_container column column5">
                                    <div class="action_data_wrapper">
                                        <button id="add_to_cart_btn<?php echo  $row->Food_ID ?>"
                                            <?php if($row->Availability == "Unavailable") echo "disabled"?>
                                            class="<?php if($row->Availability == "Available") echo "cart btn shoppingcartbtn"; else echo"cart btn disablecartbtn"?>" 
                                            onclick="onclickAddToCart(<?php echo  $row->Food_ID ?>)"
                                            data-id="<?php echo  $row->Food_ID ?>"
                                            data-name="<?php echo $row->Food_name ?>"
                                            data-price="<?php echo $row->Unit_Price;?>"
                                            data-cat="<?php echo $row->Category_name;?>"
                                            data-subcat="<?php echo $row->Subcategory_name;?>"
                                            >Add to Cart</button>
                                    </div>
                                    
                                </div><!-- action_container ends here -->
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
    
    <?php echo link_js("js/cashier/foodmenu/searchbar.js"); ?>
    <?php echo link_js("js/cashier/foodmenu/foodmenu.js"); ?>
    <?php echo link_js("js/cashier/foodmenu/searchbar.js"); ?>
    <?php echo link_js("js/cashier/orderfood/cashier-addtocart.js"); ?>

</body>
</html> 