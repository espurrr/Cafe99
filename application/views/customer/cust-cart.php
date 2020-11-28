<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cart.css"); ?>
    <title>Cart</title>
</head>
<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">


<?php include '../application/views/header/cust-logged-in-header.php';?>

<ul id="breadcrumbs">
    <li>Cart</li>
    <li><?php echo anchor("customer_controller/order", "Order") ?></li>
    <li>Payment</li>
  
</ul>

    <div class="cart-container">
        <div class="cart-items">
            <!-- ccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                    <?php $img_path = BASE_URL."/public/images/food-dash-images/food/pizza/devilledchicken.jpg";?>
                    <img src="<?php echo $img_path;?>" alt="Image Not Found">
                </div>
        
                <div class="container-text">
                        <div class="food-name">Devilled Chicken</div>
                        <div class="quantity">Quantity : <b>1</b></div>
                        <div class="price">Price LKR: 490.00</div>
                        <div class="subtotal">Subtotal LKR: <b>490.00</b></div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div><!-- cart-item-container -->

            <!-- ccccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                <img src="<?php echo $img_path;?>" alt="Image Not Found">
                </div>
        
                <div class="container-text">
                        <div class="food-name">Devilled Chicken</div>
                        <div class="quantity">Quantity : <b>1</b></div>
                        <div class="price">Price LKR: 490.00</div>
                        <div class="subtotal">Subtotal LKR: <b>490.00</b></div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <!-- ccccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                <img src="<?php echo $img_path;?>" alt="Image Not Found">
                </div>
        
                <div class="container-text">
                        <div class="food-name">Devilled Chicken</div>
                        <div class="quantity">Quantity : <b>1</b></div>
                        <div class="price">Price LKR: 490.00</div>
                        <div class="subtotal">Subtotal LKR: <b>490.00</b></div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div> 
        </div><!-- cart-items ends here

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
            <div class="summary-title"><b>Order Summary</b></div><br>
            <div class="input-details">
                <p type="Note to Chef">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?></p>
            </div><br>
            <div class="total">Total: 1000.00</div><br>
    
            <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/order", "PROCEED TO CHECKOUT") ?></button>

        </div>
        <!-- modal end -->

        <div class="summary-container">
            <div class="summary-title">Order Summary</div>
            <div class="input-details">
                <p type="Note to Chef">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?></p>
            </div>
            <div class="total">Total: 1000.00</div>
            <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/order", "PROCEED TO CHECKOUT") ?></button>
            
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
    
</body>
</html>