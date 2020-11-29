<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cart.css?version=51"); ?>
    <?php echo link_css("css/customer/order_success_popup.css?ts=<?=time()?>"); ?>
    <title>Cart</title>
</head>
<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">

<?php include '../application/views/header/cust-logged-in-header.php';?>
<ul id="breadcrumbs">    
    <li><?php echo anchor("account_controller/index", "Home") ?></li>
    <li><?php echo anchor("customer_controller/mycart", "Cart") ?></li>
    <li><?php echo anchor("customer_controller/order", "Order") ?></li>
    <li>Payment</li>
</ul>

 <!-- Pop up modal starts here -->

 <div id="popup-window" class="popup-window">
        <div class="win-content">
            
            <div class="win-table">
                <i class="fas fa-check fa-8x"></i>
                <p class="para">Congratulations! Your order has been placed successfully.<br><br>We have emailed you the order details. <br>Please Check inbox.</p>

                <div class="popup-btn-container">
                    <button id="orderSuccess" class="popup-btn btn av-btn"><?php echo anchor("account_controller/index", "OK") ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal ends here -->

    <div class="cart-container">
    <div class="cart-items">
         
            <div class="cart-item-container left">
            <form>
                <h2>Payment Method</h2><br>
                <div class="radios">
                    <label class="radio-inline">
                        <input type="radio" name="opinion" id="payhere" onclick="paymentMethod()" checked/>
                        <i></i>
                        <span><a href="<Your_PayHere_Link_Here>"><img src="https://www.payhere.lk/downloads/images/pay_with_payhere.png" alt="Pay with PayHere" width="150"/></a></span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="opinion" id="cash" onclick="paymentMethod()"/>
                        <i></i>
                        <span>Cash on Service</span>
                    </label>
    
                </div>
            <button class="checkout-button mob-complete" onclick="showModal()">complete</button>
            
               
               
            </form>
            </div>
        </div>
    
        





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
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div><br>
            <div class="total">Service charges: 50.00</div>                
            <div class="total"><b>Total: 1000.00</b></div><br>
            

        </div>
        <!-- modal end -->

        <div class="summary-container">
            <div class="summary-title">Order Summary</div>
            <div class="input-details">
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div>
            <div class="total">Service charges: 50.00</div>                
            <div class="total"><b>Total: 1000.00</b></div>
            <button class="checkout-button" onclick="showModal()" >complete</button>
            
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
        
        function paymentMethod() {
            // Get the checkbox
            var payhere = document.getElementById("payhere");
            var cash = document.getElementById("cash");
    
            // Get the output text
            var dine_text = document.getElementById("payhere_info");

            // If the checkbox is checked, display the output text
        
            if (payhere.checked == true){
                payhere_info.style.display = "initial";
            } else{
                payhere_info.style.display = "none";
            }
                
        }



    </script>
    
    <script>//order successful modal
        var popup_win = document.getElementById("popup-window");
        var view_btn = document.getElementById("ok-btn");
       

        function showModal(){
          popup_win.style.display = "block";
        }

        close_btn.onclick = function() {
            popup_win.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == popup_win) {
            popup_win.style.display = "none";
          }
        }

    };

  </script>
    
</body>
</html>