<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Jquery link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cart.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
    <title>Cart</title>
</head>
<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">


<?php include '../application/views/header/cust-logged-in-header.php';?>

<ul class="breadcrumb">
    <li><?php echo anchor("account_controller/index", "Home") ?></li>
    <li><?php echo anchor("customer_controller/mycart", "Cart") ?></li>
    <li>Order</li>
    <li>Payment</li>
  
</ul>

<div class="cartflash">
        <?php $this->flash('emptyCartAlert','alert alert-info','fa fa-info-circle'); ?>
        <?php $this->flash('cartitemsError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('cartitemsUnavailable','alert alert-danger','fa fa-times-circle'); ?>
  </div><br><br><br>

  <!-- Delete pop up modal starts here -->
  <div id="popup-window" class="popup-window">
        <div class="win-content-wrapper">
            <div class="win-content">
                <p id="cart_mod">Are you sure you want to delete the item?</p>
                <div class="btn-container">
                    <div class="btn-wrapper">
                        <button class="btn cancel-btn" id="modal-cancel-btn">Cancel</button>
                        <button class="btn delete-btn" id="modal-delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        </div><!-- win-content-wrapper ends here -->
    </div><!-- popup=window ends here -->
  <!-- Delete pop up modal ends here -->

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
        
       
    </div><!-- cart-container ends here -->
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
     <?php echo link_js("js/cust_removefromcart.js"); ?>
</body>
</html>