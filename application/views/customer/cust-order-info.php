<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cart.css?ts=<?=time()?>"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<PLACE_YOUR_API_KEY_HERE>"></script>
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

    <div class="cart-container">
    <div class="cart-items">
         
            <div class="cart-item-container left">
            <?php echo form_open("customer_controller/proceedToPaymentDetails","post",['id'=>"detailsform"]);?>
                <h2>Order type</h2><br>
                <div class="radios">
                    <label class="radio-inline">
                        <input type="radio" name="opinion" value="dine-in" id="r_dine" onclick="detailsDisplay()" <?php if($_POST['opinion']=="dine-in" or $_POST['opinion']==NULL) echo "checked=\"checked\""; ?>/>
                        <i></i>
                        <span>Dine-in</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="opinion" value="pick-up" id="r_pick" onclick="detailsDisplay()" <?php if($_POST['opinion']=="pick-up") echo "checked=\"checked\""; ?>/>
                        <i></i>
                        <span>Pick-up</span>
                    </label>
                    <label>
                        <input type="radio" name="opinion" value="delivery" id="r_deli" onclick="detailsDisplay()" <?php if($_POST['opinion']=="delivery") echo "checked=\"checked\""; ?>/>
                        <i></i>
                        <span>Delivery</span>
                    </label>
                </div>
                <h2>Order is for</h2><br>
                <div class="radios">
                    <label class="radio-inline">
                        <input type="radio" name="opinion2" value="me" id="me" onclick="detailsDisplay()" checked/>
                        <i></i>
                        <span>Me</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="opinion2" value="else" id="someone_else" onclick="detailsDisplay()"/>
                        <i></i>
                        <span>Someone else</span>
                    </label>
                  
                </div>
                <h2>Details</h2><br>
                <div class="details">
                    <div id="receiver">
                    <p> Receiver's information </p>
                        <?php echo form_input(['type'=>'text', 'name'=>'Customer_name', 'placeholder'=>'Name*', 'value'=>$this->set_value('Customer_name')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Customer_name'])):?>
                            <?php echo $this->errors['Customer_name'];?>
                            <?php endif;?>
                        </div>
                        <?php echo form_input(['type'=>'tel', 'name'=>'Customer_phone', 'placeholder'=>'Phone no.*' ,'value'=>$this->set_value('Customer_phone')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Customer_phone'])):?>
                            <?php echo $this->errors['Customer_phone'];?>
                            <?php endif;?>
                        </div>
                    </div><br>
                    
                    <?php date_default_timezone_set('Asia/Colombo');?> 
                    <div id="dine-in">
                    
                        <p> Dine-in Date</p>
                        <?php echo form_input(['type'=>'date', 'name'=>'Dine-in-date', 'placeholder'=>'Dine-in Date' ,'value'=>date('Y-m-d'), 'min'=>date('Y-m-d'), 'max'=>date('Y-m-d')])?>
                       
                        <p> Dine-in Time </p>
                        <?php echo form_input(['type'=>'time', 'name'=>'Dine-in-time', 'placeholder'=>'Dine-in Time' , 'value'=>$this->set_value('Dine-in-time'), 'min'=>date('06:00'), 'max'=>date('19:00')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Dine-in-time'])):?>
                            <?php echo $this->errors['Dine-in-time'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    <div id="pick-up">
                       
                        <p> Pick-up Date </p>
                        <?php echo form_input(['type'=>'date', 'name'=>'Pick-up-date', 'placeholder'=>'Pick-up Date' ,'value'=>date('Y-m-d'), 'min'=>date('Y-m-d'), 'max'=>date('Y-m-d')])?>
                      
                        <p> Pick-up Time </p>
                        <?php echo form_input(['type'=>'time', 'name'=>'Pick-up-time', 'placeholder'=>'Pick-up Time' , 'value'=>$this->set_value('Pick-up-time'), 'min'=>date('06:00'), 'max'=>date('19:00')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Pick-in-time'])):?>
                            <?php echo $this->errors['Pick-in-time'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    <div id="delivery">

                    <p> Delivery Address </p>
                        <?php echo form_input(['type'=>'text', 'id'=>'address_input', 'class'=>'del_details' ,'name'=>'Delivery-address', 'placeholder'=>'Address*', 'value'=>$this->set_value('Delivery-address')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Delivery-address'])):?>
                            <?php echo $this->errors['Delivery-address'];?>
                            <?php endif;?>
                        </div>
                    <p> Delivery Date </p>
                        <?php echo form_input(['type'=>'date','class'=>'del_details' , 'name'=>'Delivery-date', 'placeholder'=>'Delivery Date' ,'value'=>date('Y-m-d'), 'min'=>date('Y-m-d'), 'max'=>date('Y-m-d')])?>
                        
                    <p> Delivery Time </p>
                        <?php echo form_input(['type'=>'time','class'=>'del_details' , 'name'=>'Delivery-time', 'placeholder'=>'Delivery Time' ,'value'=>$this->set_value('Delivery-time'), 'min'=>date('06:00'), 'max'=>date('19:00')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Delivery-time'])):?>
                            <?php echo $this->errors['Delivery-time'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    

                </div><br>
                <input type="submit" class="checkout-button" value="CONTINUE">
                <?php echo form_close();?>    
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
            <div class="summary-title"><h2>Order Summary</h2></div><br>
            <!-- <div class="input-details">
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div><br> -->
            <div class="total">Subtotal: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></div><br>
            <div class="total">Service charges (5.00%): LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05,2,'.', ','); ?></div>   <br>                 
            <div class="total final"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05 + $this->get_session('cart_sub_total'), 2,'.', ','); ?></b></div><br>
            
            <!-- <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/payment", "PROCEED TO CHECKOUT") ?></button> -->

        </div>
        <!-- modal end -->

        <div class="summary-container">
            <div class="summary-title"><h3>Order Summary</h3></div>
            <!-- <div class="input-details">
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div> -->
            <div class="total">Subtotal: LKR <?php echo number_format($this->get_session('cart_sub_total'),2,'.', ','); ?></div>
            <div class="total">Service charges(5.00%): LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05,2,'.', ','); ?></div>                
            <div class="total final"><b>Total: LKR <?php echo number_format($this->get_session('cart_sub_total')*0.05 + $this->get_session('cart_sub_total'), 2,'.', ','); ?></b></div>
            <!-- <input type="submit" class="checkout-button" value="PROCEED TO CHECKOUT"> -->
            <!-- <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/payment", "PROCEED TO CHECKOUT") ?></button> -->
            
        </div>
        <?php echo form_close();?>  
       
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
        
        function detailsDisplay() {
            // Get the checkbox

            var me = document.getElementById("me");
            var someone_else = document.getElementById("someone_else");

            var dine = document.getElementById("r_dine");
            var pick = document.getElementById("r_pick");
            var deli = document.getElementById("r_deli");
            // Get the output text
            var receiver_text = document.getElementById("receiver");
            var dine_text = document.getElementById("dine-in");
            var pick_text  = document.getElementById("pick-up");
            var deli_text  = document.getElementById("delivery");


            // If the checkbox is checked, display the output text
            if (me.checked == true){
                receiver_text.style.display = "none";
            }else if(someone_else.checked == true){
                receiver_text.style.display = "initial";
            }
            if (<?php echo json_encode($_POST['opinion'])?> == "dine-in" || dine.checked == true ){
                dine_text.style.display = "initial";
                pick_text.style.display = "none";
                deli_text.style.display = "none";

            } else if (<?php echo json_encode($_POST['opinion'])?> == "pick-up" || pick.checked == true ){
                dine_text.style.display = "none";
                pick_text.style.display = "initial";
                deli_text.style.display = "none";
            } else if(<?php echo json_encode($_POST['opinion'])?> == "delivery" || deli.checked == true ){
                dine_text.style.display = "none";
                pick_text.style.display = "none";
                deli_text.style.display = "initial";
            }
                
        }
    </script>
    <script>
        var session = eval('(<?php echo json_encode($_SESSION)?>)');
        console.log(session);

        function validationFunction() {
            var num_of_done_fields = 0;
            $('.del_details').each(function() {
                if($(this).val()){
                    num_of_done_fields++;
                }
            });
            if(num_of_done_fields == 3) 
                return true;
            
            return false;
        }

        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById("address_input")), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "LK"
                }
            });

            $(window).keydown(function(key){
                if( (key.keyCode == 13) && (validationFunction() == false) ) {
                    key.preventDefault();
                    return false;
                }
            });
        });

        document.addEventListener("keyup", function(key){
            if( (key.keyCode == 13) && (validationFunction() == true) ) {
                document.getElementById("detailsform").submit();
            }
        });

    </script>
</body>
</html>