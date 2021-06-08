<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cart.css?version=51"); ?>
    <?php echo link_css("css/customer/order_success_popup.css?ts=<?=time()?>"); ?>
    <title>Cart</title>
</head>
<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">

<?php include '../application/views/header/cust-logged-in-header.php';?>
<ul class="breadcrumb">    
    <li><?php echo anchor("account_controller/index", "Home") ?></li>
    <li><?php echo anchor("customer_controller/mycart", "Cart") ?></li>
    <li><?php echo anchor("customer_controller/order", "Order") ?></li>
    <li>Payment</li>
</ul>



    <div class="cart-container">
    <div class="cart-items">
         
            <div class="cart-item-container left">
            <form method="post" name="payment_form" onsubmit="return OnSubmitForm();" id="detailsform"> 
                <h2>Order Summary</h2><br>
            
                <div class="total">Subtotal: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></div><br>
            <div class="total">Service charges (5.00%): LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05,2,'.', ','); ?></div>   <br>                 
            <div class="total final"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05 + $this->get_session('cart_sub_total'), 2,'.', ','); ?></b></div><br><br><br>
                    <h2>Payment Method</h2><br>
                    <div class="radios">
                        <label class="radio-inline">
                            <input type="radio" name="pay_option" value="payhere" id="payhere" />
                            <i></i>
                            <span><img src="https://www.payhere.lk/downloads/images/pay_with_payhere.png" alt="Pay with PayHere" width="150"/></a></span>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pay_option" value="cash" id="cash"  checked/>
                            <i></i>
                            <span>Cash on Service</span>
                        </label>
        
                    </div>
                
                    <input type="hidden" name="merchant_id" value="">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="<?=BASE_URL?>/customer_controller/payhere_success/">
                    <input type="hidden" name="cancel_url" value="<?=BASE_URL?>/customer_controller/payhere_failed/">
                    <input type="hidden" name="notify_url" value="<?=BASE_URL?>/customer_controller/payhere_form">
                    <!-- Item Details -->
                    <input type="hidden" name="order_id" value=<?=$data['order_id'] ?>>
                    <input type="hidden" name="items" value=<?=$data['order_id'] ?>><br>
                    <input type="hidden" name="currency" value="LKR">
                    <input type="hidden" name="amount" value=<?=$data['amount'] ?>>  
                    <!-- Customer Details -->
                    <input type="hidden" name="first_name" value=<?=$data['first_name'] ?>>
                    <input type="hidden" name="last_name" value="-"><br>
                    <input type="hidden" name="email" value="-">
                    <input type="hidden" name="phone" value="-"><br>
                    <input type="hidden" name="address" value="-">
                    <input type="hidden" name="city" value="-">
                    <input type="hidden" name="country" value="Sri Lanka">
            
                    <input class="checkout-button" type="submit" value="COMPLETE ORDER">  
                
            </form>
           
            </div>
        </div>
    
        





        
       
    </div>


    <script>
 
    function OnSubmitForm(){
        if(document.payment_form.pay_option[0].checked == true)
        {
            document.payment_form.action ="https://sandbox.payhere.lk/pay/checkout";
        }
        else
        if(document.payment_form.pay_option[1].checked == true)
        {
            document.payment_form.action ="<?=BASE_URL?>/customer_controller/completeOrder";
        }
        return true;
    }
        
   


    </script>


<script>
 var session = eval('(<?php echo json_encode($_SESSION)?>)');
 console.log(session);

</script>
    
</body>
</html>