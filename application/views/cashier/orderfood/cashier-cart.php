<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cashier/cashier_cart.css"); ?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Cart</title>
</head>
<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php";?>
    <?php include "../application/views/header/header-dashboard.php";?> 

    <div class="cart-container">
        <div class="cart-items">
            <?php
                foreach($data as $row){
                ?>
            <!-- cart-item-container starts-->
                <div class="cart-item-container">
                    <div class="container-image">
                        <?php
                        $img_path = BASE_URL."/public/images/food-dash-images/".$row->Category_name."/".$row->Subcategory_name."/".str_replace(' ','',$row->Food_name).".jpg";
                        ?>
                        <img src="<?php echo $img_path;?>" alt="Image Not Found">
                    </div>
            
                    <div class="container-text">
                            <div class="food-name"><?php echo anchor("food_controller/menu/".$row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID, $row->Food_name) ?></div>
                            <div class="quantity">Quantity : <b><?php echo $row->Quantity; ?></b></div>
                            <div class="price">Price LKR: <?php echo $row->Price; ?></div>
                            <div class="subtotal">Subtotal LKR: <b><?php echo $row->CartItem_total; ?></b></div>
                    </div>

                    <div class="btn-container">
                        <!-- <a href="#" class="delete"><i class="fas fa-trash-alt" onclick='showDeleteModal(,"\"\"",,<?php //echo $row->Price; ?>)'></i></a> -->
                        <button id="remove_from_cart_btn<?php echo  $row->CartItem_ID ?>"
                            class="delete" onclick="onclickDeleteCartitem(<?php echo  $row->CartItem_ID ?>)"
                            data-id="<?php echo  $row->Food_ID; ?>"
                            data-name="<?php echo $row->Food_name; ?>"
                            data-qty="<?php echo $row->Quantity; ?>"
                            data-price="<?php echo $row->Price; ?>"
                            ><i class="fas fa-trash-alt"></i></button>
                    
                    </div>
                </div>
                <!-- cart-item-container ends-->
            <?php
            }
            ?>

        </div><!-- cart-items ends here-->

        <div class="cart">
            <a href="#" id="float">
            <i class="fa fa-plus my-float"></i>
            </a>
        </div>

        <div class="overlay" id="overlay"></div>

        <div class="summary-container">
        
        <?php echo form_open("cashier_controller/completeOrder","post");?><br>
            <div class="summary-title">Order Summary</div><br>
            <div class="input-details"><br>
                <p type="Special Notes to Chef">  <?php echo form_input(['type'=>'text', 'name'=>'specialnote'])?></p>
               
            </div><br><br>
            <div class="total"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></b></div><br>
            <input type="submit" class="checkout-button" value="COMPLETE  ORDER">

        <?php echo form_close();?>    
        </div>
        
       
    </div>

    <?php include '../application/views/footer/footer_3.php';?>
    <?php echo link_js("js/cashier/orderfood/cashier_removefromcart.js"); ?>

</body>
</html>