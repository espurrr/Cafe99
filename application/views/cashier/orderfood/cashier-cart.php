<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cashier/cashier_cart.css"); ?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <title>Cart</title>
</head>
<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php";?>
    <?php include "../application/views/header/header-dashboard.php";?> 

    <ul id="breadcrumbs">
        <li>Cart</li>
        <!-- <li><?php echo anchor("cashier_controller/order", "Order") ?></li>
        <li>Payment</li> -->
  
    </ul>

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
                        <a href="#" class="delete"><i class="fas fa-trash-alt" onclick='showDeleteModal(<?php echo $row->Quantity;?>,"\"<?php echo $row->Food_name;?>\"",<?php echo $row->Food_ID;?>,<?php echo $row->Price; ?>)'></i></a>
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
        <!-- modal starts -->
        <div class="modal" id="modal">
            <button class="modal-close-btn" id="close-btn">
                <i class="fa fa-times" title="cross"></i>
            </button>
            <?php echo form_open("customer_controller/proceedToOrderDetails","post");?><br>

            <div class="summary-title"><b>Order Summary</b></div><br>
            <div class="input-details">
                <p type="Special Notes to Chef">  <?php echo form_input(['type'=>'text', 'name'=>'specialnote', 'value'=>$this->get_session('cart_special_notes')])?></p>
            </div><br>
            <div class="total"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></b></div><br>
            <input type="submit" class="checkout-button" value="PROCEED TO CHECKOUT">

            
            <?php echo form_close();?>    
        </div>
        <!-- modal end -->

        <div class="summary-container">
        
        <?php echo form_open("customer_controller/proceedToOrderDetails","post");?><br>
            <div class="summary-title">Order Summary</div><br>
            <div class="input-details"><br>
                <p type="Special Notes to Chef">  <?php echo form_input(['type'=>'text', 'name'=>'specialnote', 'value'=> $this->get_session('cart_special_notes')])?></p>
               
            </div><br><br>
            <div class="total"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></b></div><br>
            <input type="submit" class="checkout-button" value="PROCEED TO CHECKOUT">

        <?php echo form_close();?>    
        </div>
        
       
    </div>
    <script>
        // Modal script
        document.getElementById('float').addEventListener('click', function() {
            document.getElementById('overlay').classList.add('is-visible');
            document.getElementById('modal').classList.add('is-visible');
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });


    </script>
    <?php include '../application/views/footer/footer_3.php';?>
</body>
</html>