<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cart.css?ts=<?=time()?>"); ?>
    
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
            <form>
                <h2>Order type</h2><br>
                <div class="radios">
                    <label class="radio-inline">
                        <input type="radio" name="opinion" id="r_dine" onclick="detailsDisplay()" checked/>
                        <i></i>
                        <span>Dine-in</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="opinion" id="r_pick" onclick="detailsDisplay()"/>
                        <i></i>
                        <span>Pick-up</span>
                    </label>
                    <label>
                        <input type="radio" name="opinion" id="r_deli" onclick="detailsDisplay()"/>
                        <i></i>
                        <span>Delivery</span>
                    </label>
                </div>
                <h2>Order is for</h2><br>
                <div class="radios">
                    <label class="radio-inline">
                        <input type="radio" name="opinion2" id="me" onclick="detailsDisplay()" checked/>
                        <i></i>
                        <span>Me</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="opinion2" id="someone_else" onclick="detailsDisplay()"/>
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
                            <?php if(!empty($this->errors['User_name'])):?>
                            <?php echo $this->errors['User_name'];?>
                            <?php endif;?>
                        </div>
                        <?php echo form_input(['type'=>'tel', 'name'=>'Customer_phone', 'placeholder'=>'Phone no.*' ,'value'=>$this->set_value('Customer_phone')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                    </div><br>

                    <div id="dine-in">
                    
                        <p> Dine-in Date </p>
                        <?php echo form_input(['type'=>'date', 'name'=>'Dine-in-date', 'placeholder'=>'Dine-in Date' ,'value'=>$this->set_value('Dine-in-date')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                        <p> Dine-in Time </p>
                        <?php echo form_input(['type'=>'time', 'name'=>'Dine-in-time', 'placeholder'=>'Dine-in Time' ,'value'=>$this->set_value('Dine-in-time')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    <div id="pick-up">
                       
                        <p> Pick-up Date </p>
                        <?php echo form_input(['type'=>'date', 'name'=>'Pick-up-date', 'placeholder'=>'Pick-up Date' ,'value'=>$this->set_value('Pick-up-date')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                        <p> Pick-up Time </p>
                        <?php echo form_input(['type'=>'time', 'name'=>'Pick-up-time', 'placeholder'=>'Pick-up Time' ,'value'=>$this->set_value('Pick-up-time')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    <div id="delivery">

                    <p> Delivery Address </p>
                        <?php echo form_input(['type'=>'text', 'name'=>'Delivery_address', 'placeholder'=>'Address*', 'value'=>$this->set_value('Delivery_address')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['User_name'])):?>
                            <?php echo $this->errors['User_name'];?>
                            <?php endif;?>
                        </div>
                    <p> Delivery Date </p>
                        <?php echo form_input(['type'=>'date', 'name'=>'Delivery-date', 'placeholder'=>'Delivery Date' ,'value'=>$this->set_value('Delivery-date')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                    <p> Delivery Time </p>
                        <?php echo form_input(['type'=>'time', 'name'=>'Delivery-time', 'placeholder'=>'Delivery Time' ,'value'=>$this->set_value('Delivery-time')])?>
                        <div class="error">
                            <?php if(!empty($this->errors['Email_address'])):?>
                            <?php echo $this->errors['Email_address'];?>
                            <?php endif;?>
                        </div>
                    </div>

                    

                </div>
               
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
            <!-- <div class="input-details">
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div><br> -->
            <div class="total">Service charges: 50.00</div>                
            <div class="total"><b>Total: 1000.00</b></div><br>
            <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/payment", "PROCEED TO CHECKOUT") ?></button>

        </div>
        <!-- modal end -->

        <div class="summary-container">
            <div class="summary-title">Order Summary</div>
            <!-- <div class="input-details">
            <p type="Enter Coupon">  <?php echo form_input(['type'=>'text', 'name'=>'message', 'placeholder'=>''])?><button class="checkout-button coupon" href="#" >APPLY</button></p>
            </div> -->
            <div class="total">Service charges: 50.00</div>                
            <div class="total"><b>Total: 1000.00</b></div>
            <button class="checkout-button" href="#" ><?php echo anchor("customer_controller/payment", "PROCEED TO CHECKOUT") ?></button>
            
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
            if (dine.checked == true){
                dine_text.style.display = "initial";
                pick_text.style.display = "none";
                deli_text.style.display = "none";

            } else if (pick.checked == true){
                dine_text.style.display = "none";
                pick_text.style.display = "initial";
                deli_text.style.display = "none";
            } else if(deli.checked == true){
                dine_text.style.display = "none";
                pick_text.style.display = "none";
                deli_text.style.display = "initial";
            }
                
        }



    </script>
    
</body>
</html>