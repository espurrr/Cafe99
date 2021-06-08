<?php

class Customer_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        if(!$this->get_session('user_id')){
            redirect("account_controller/forbidden");
        }
        if($this->get_session('role')!="customer"){
            $this->destroy_session();
            redirect("account_controller/forbidden");
            // $this->view('error');

        }
        $this->model = $this->model("customer_model");
        $this->food_model = $this->model("food_model");
        $this->account_model = $this->model("account_model");

    }
    

    public function index(){
        $food_names = $this->food_model->get_food_names();
        // print_r($food_names['data']);
        $most_popular_food = $this->account_model->get_most_popular_food();
        $new_food = $this->account_model->get_newly_introduced_fooditem();

        $this->view('home', ['food_names'=>$food_names['data'], 'most_popular_food'=>$most_popular_food['data'], 'newly_added'=>$new_food['data']]);
    }

    public function logout(){
        $this->destroy_session();
        redirect('account_controller/index');
    }

    public function myprofile($page=""){
        if(empty($page)){
            $this->view('customer/cus_profile');
        }else{
            switch($page){
                case 'update':
                    // $values = ;
                    $this->profile_update_values();
                    break;
                case 'resetpw':
                    $this->view('customer/cus_profile_pw');
                    break;
                case 'deactivate':
                    $this->view('customer/cus_profile_delete');
                    break;
                default:
                    $this->view('customer/cus_profile');
            }

        }
        
    }

    public function profile_update_values(){

        $user_id = $this->get_session('user_id');

        $result = $this->model->cus_data($user_id);

        if($result === "User_not_found"){
           // echo "user no";
            $this->set_flash("userError", "Hmm.. You are an imposter, aren't you??");
            $this->view('customer/cus_profile_update');
        }else if($result === "Data_not_retrieved"){
           // echo "datano";
            $this->set_flash("dbError", "It seems like your data is not ready yet.");
            $this->view('customer/cus_profile_update');
        }else if($result['status'] === "success"){
            $this->view('customer/cus_profile_update',$result['data']);
        }

    }

    public function profile_update_save(){

        $user_id = $this->get_session('user_id');
        
        $this->validation('User_name', 'Name' , 'not_int|max_len|50');
        $this->validation('Phone_no','Phone number', 'int|len|10');
  
        if($this->run()){
            // echo "Form is submitted";
         
            $User_name = $this->post('User_name');
            $Phone_no = $this->post('Phone_no');
        
            $data = [
                'User_name' => $User_name,
                'Phone_no' => $Phone_no,
            ];
            // print_r($data);

            if($this->model->cus_data_update($data, $user_id)){
                $this-> set_flash("updateSuccess","Hey $User_name! Your profile is successfully updated.");
                $this->view('customer/cus_profile');
               
            }else{
                $this->set_flash("updateError", "Something went wrong :( Please try again.");
                $this->view('customer/cus_profile');
            }
            
        }else{
            redirect('customer_controller/myprofile/update');
        }
    }

    public function resetpw_save(){

        $user_id = $this->get_session('user_id');
        
        $this->validation('User_Password', 'Current Password' , 'required');
        $this->validation('New_Password','New Password', 'required|min_len|8');
        $this->validation('Confirm_Password','Confirm Password', 'required|confirm|New_Password');

  
        if($this->run()){
           $current_pw = $this->post('User_Password');
           $new_pw = $this->hash($this->post('New_Password'));
           $result = $this->model->password_update($current_pw,$new_pw,$user_id);
        
            if($result==="Current_pw_wrong"){
                $this->set_flash("currPwWarning", "Opps! That's not your current password.");
                $this->view('customer/cus_profile_pw');
                
            }else if($result==="success"){
                $this->set_flash("pwSucess", "Your password has been changed successfully.");
                //send a notification email to user

                $this->view('customer/cus_profile_pw');
            }

        }else{
            $this->view('customer/cus_profile_pw');
        }
    }

    public function deactivate(){

        $user_id = $this->get_session('user_id');
        $user_name = $this->get_session('user_name');
         
        $text = $this->post('bye');
        
        if($text==="GOODBYE"){
            $result = $this->model->deactivate_user($user_id);
            if(!$result){
                $this->set_flash("dbError", "Something went wrong :( Please try again.");
                $this->view('customer/cus_profile_delete');
                
            }else if($result){
                $this->informational("successfully deactivated @user_id=$user_id");
                $this->set_flash("deactivateSuccess", "Good bye friend! You will be missed :)");
                redirect("account_controller/signup");
            }
        }else{
            $this->set_flash("wrongGoodBye", "Nice teasing, $user_name :) Stay with us please");
            $this->view('customer/cus_profile_delete');
        }
        
    }
        
    

    public function myfavourites(){
        $user_id = $this->get_session('user_id');

        $result = $this->model->getFavs($user_id);

        if($result === "Favs_not_found"){
            $this->set_flash("favsError", "You don't have any favourites yet. Let's make some? :) ");
            $this->view('customer/cust-favorites');
        }else if($result === "Favs_not_retrieved"){
            $this->set_flash("dbError", "It seems like your data is not ready yet.");
            $this->view('customer/cust-favorites');
        }else if($result['status'] === "success"){
            $this->view('customer/cust-favorites',$result['data']);
        }

        // $this->view('customer/cust-favorites');
    }

    public function fav_submit(){
        if(isset($_POST['action'])){
            echo json_encode(array('action'=>$_POST['action'],'food_id'=>$_POST['food_id']));
            //echo json_encode(array('msg'=>'does this work oyeaaass'));
            $food_id = $_POST['food_id'];
            $action = $_POST['action'];
            $user_id = $this->get_session('user_id');
            //echo $user_id;

            switch($action){

                case 'add':
                    $this->model->addtoFavs($user_id, $food_id);
                    //echo "added to favs successfullyyyy";
                    break;
                case 'remove':
                    $this->model->removeFromFavs($user_id, $food_id);
                    // echo "removed from favs successfullyyyy";
                    break;

                default:
                    break;
                    
            }
            

        }
        
        //$this->view('customer/cust-favorites');
    }

    public function fav_delete($food_id){
      
            $user_id = $this->get_session('user_id');
            //echo $user_id;
            $this->model->removeFromFavs($user_id, $food_id);
            
        //$this->view('customer/cust-favorites');
    }


    public function mycart(){
        $cart_id = $this->get_session('cart_id');
        $result = $this->model->get_cart_items($cart_id);

        if($result === "Cart_items_not_retrieved"){
            $this->set_flash("cartitemsError", "Sorry! Your cart cannot be viewed at the moment.");
            $this->view('customer/cust-cart');
        }else if($result === "Empty_cart"){
            $this->set_flash("emptyCartAlert", "Your cart seems to be empty.. You know you're hungry😏");
            $this->view('customer/cust-cart');
        }else if($result['status'] === "success"){
            $this->view('customer/cust-cart',$result['data']);
        }

    }

    public function addtocart(){
        if(isset($_POST['action'])){
            //echo json_encode(array('msg'=>'does this work'));
            // data for cartitem table
            $food_id = $_POST['food_id'];
            $food_subcat = $_POST['food_subcat'];
            $food_cat = $_POST['food_cat'];

            $food_name = $_POST['food_name'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $user_id = $this->get_session('user_id');
            $cart_id = $this->get_session('cart_id');
            $cart_item_total = ($price * $qty);
            $cart_sub_total = $this->get_session('cart_sub_total');    

            //data for the cart table
            $prev_item_count =  $this->get_session('cart_item_count');
            $new_item_count = $prev_item_count + 1;
            date_default_timezone_set('Asia/Colombo');
            $mod_time = date('Y-m-d H:i:s');

            //bundled data
            $data_cartitem = [
                'Cart_id' => $cart_id,
                'Food_ID' => $food_id,
                'Quantity' => $qty,
                'Price' => $price,
                'CartItem_total' => $cart_item_total
            ];

            $data_cart = [
                'Item_count' => $new_item_count, 
                'Sub_total' => $cart_sub_total + $cart_item_total,
                'ModifiedDateTime' => $mod_time
            ];
         
            if($this->model->addtoCart($data_cartitem, $data_cart)){
                //increment the cart item count of session data
               $this->set_session('cart_item_count', $data_cart['Item_count']);
                //increment the cart sub total of session data
               $this->set_session('cart_sub_total', $data_cart['Sub_total']);

               //add to cart success modal box---------------------------------------------todo
            }
  
        }
        
    }


    public function removefromcart($food_id, $food_qty, $food_price){
        
        $cart_id = $this->get_session('cart_id');
        //to update count in table 
        $current_count = $this->get_session('cart_item_count');
        $new_count = $current_count - 1;

        //to update subtotal in table
        $cart_item_total = $food_qty * $food_price;
        $current_cart_subtotal = $this->get_session('cart_sub_total');
        $new_cart_subtotal = $current_cart_subtotal - $cart_item_total;

        $data = [
            'cart_id' => $cart_id,
            'food_id' => $food_id,
            'food_qty' => $food_qty,
            'food_price' => $food_price,
            'cart_item_count' =>  $new_count,
            'cart_subtotal' => $new_cart_subtotal
        ];

        $result = $this->model->removefromCart($data);
        
        if($result){
            $_SESSION['cart_item_count'] = $new_count;
            $_SESSION['cart_sub_total'] = $new_cart_subtotal;
        }
    }

    public function proceedToOrderDetails(){
        
        $this->validation('specialnote','Special Notes', 'max_len|100');
    
        if($this->run()){
            //check if the items are available as of now
            $cart_id = $this->get_session('cart_id');
            $result = $this->cart_checkFoodItemAvailability($cart_id);

            if($result['status']=='unavail'){
                $food_name = $result['data'];
                $this->set_flash("cartitemsUnavailable", "Sorry! the amount of $food_name you requested are not available now.");
                redirect("customer_controller/mycart");
            }
            else{
                $note = $this->post('specialnote');
                $this->set_session('cart_special_notes',$note);
                $this->view('customer/cust-order-info');
            }

        }else{
            redirect("customer_controller/mycart");  
        }

    }

    public function proceedToPaymentDetails(){
       
        $user_id = $this->get_session('user_id');
        $cart_id = $this->get_session('cart_id');
        $order_address = "";  //for dinein and pickup, theres no address

        $order_type = $this->post('opinion');
        $order_is_for = $this->post('opinion2');
   

        //order type
        if($order_type=='dine-in'){
            $this->validation('Dine-in-time', 'Dine-in time' , 'required|service_time');
      
            $order_date = $this->post('Dine-in-date');
            $order_time = $this->post('Dine-in-time');
          
       }else if($order_type=='pick-up'){
            $this->validation('Pick-up-time', 'Pick-up time' , 'required|service_time');

            $order_date = $this->post('Pick-up-date');
            $order_time = $this->post('Pick-up-time');
    
        }else if($order_type=='delivery'){
           // echo 'delivery';
            $this->validation('Delivery-address', 'Delivery address' , 'required|Maharagama');
            $this->validation('Delivery-time', 'Delivery time' , 'required|service_time');//....................................................................|service_time put
            $order_date = $this->post('Delivery-date');
            $order_time = $this->post('Delivery-time');
            $order_address = $this->post('Delivery-address');
            $order_address = str_replace(',', '$', $order_address);
        
        }

        //order is for whom?
        if($order_is_for=='me'){
            $order_is_for_me = 1;
            $order_receiver_id = $user_id;
            // echo $order_receiver_id;

        }else if($order_is_for=='else'){
            $order_is_for_me = 0;
            $this->validation('Customer_name', 'Receiver\'s name' , 'required|not_int|max_len|50');
            $this->validation('Customer_phone', 'Receiver\'s phone no.' , 'required|int|len|10');
            $rec_name = $this->post('Customer_name');
            $rec_phone = $this->post('Customer_phone');

            if($this->get_session('order_is_for_me')==0){   //order recipient is already created, now the user wishes to edit the details
                $this->model->updateOtherRecipient($user_id, $cart_id, $rec_name, $rec_phone);
            }else{
                // make a new receipient in table
                $this->model->createOtherRecipient($user_id, $cart_id, $rec_name, $rec_phone);
                //set session order is not for me
                $_SESSION['order_is_for_me'] = 0;
            }
            

       }
        
        if($this->run()){
            if($order_is_for_me==0){ //if order is for other recipient
                //mod session data, modifying here because session_start happens after this->run
                $this->set_session('order_is_for_me',0);   /////////////////////////////////////why doesnt it workkkkkkk???     
            }
            date_default_timezone_set('Asia/Colombo');
            $mod_time = date('Y-m-d H:i:s');

            //we make a token just in case the user selects payhere. there should be a way to
            //identify the cart as payhere gateway only respond with order_id as the param. 
            //in our case we havent created the order yet.

            $Token_Payhere_Order_ID = bin2hex(openssl_random_pseudo_bytes(16));

            $data = [
                'Special_notes' => $this->get_session('cart_special_notes'),
                'Order_type' => $order_type,
                'Order_is_for_me' => $order_is_for_me,
                'Service_date' => $order_date,
                'Service_time' => $order_time,
                'Service_address' => $order_address,
                'ModifiedDateTime' => $mod_time,
                'Token_Payhere_Order_ID' => $Token_Payhere_Order_ID
            ];
            // print_r($data);
            //update food cart in db
            $this->model->updateOrderDetailsInCart($data, $cart_id);   


            $order_data_for_payhere = [
                'order_id' => $Token_Payhere_Order_ID,
                'amount' => $this->get_session('cart_sub_total') + $this->get_session('cart_sub_total')*0.05 , //including service charges
                'first_name' => $this->get_session('user_name'),
            ];
            $this->view('customer/cust-payment',$order_data_for_payhere);//-----------------------------------can use this data to check if delivery ? shipping cost- 0

        }else{
            $this->view('customer/cust-order-info');
        }
         
          

    }

    public function completeOrder(){
       
        $user_id = $this->get_session('user_id');
        $cart_id = $this->get_session('cart_id');
        date_default_timezone_set('Asia/Colombo');
        $ip = $_SERVER['SERVER_ADDR'];

         //check if the items are available as of now
        $result = $this->cart_checkFoodItemAvailability($cart_id);

        if($result['status']=='unavail'){
            $food_name = $result['data'];
            $this->set_flash("cartitemsUnavailable", "Sorry! the amount of $food_name you requested are not available now.");
            redirect("customer_controller/mycart");

        }else if($result['status']=='avail'){
            $payment_type = $this->post('pay_option');// if this arrives here, must be cash

            //get cart data
            $cart_data = $this->model->get_cart_data($cart_id);

            //A possible attempt to form resubmission
            if($cart_data['data']->Item_count==0){
                //logs
                $this->warning("possible form resubmission (create order): @user = $user_id, @ip = $ip");
                $this->set_flash("OrderFormResubmission", "Opps! Sorry, You cannot resubmit the form");
                $this->view('customer/cust-cart');

            }else{
                if($cart_data['status'] === "success"){
    
                    $data = [
                        'Order_Date_Time' => date($cart_data['data']->Service_date ." ". $cart_data['data']->Service_time), //combined serve date and time
                        'Item_count' => $cart_data['data']->Item_count,
                        'Total_price' => $cart_data['data']->Sub_total + $cart_data['data']->Sub_total*0.05, //including service charge, disregarded discounts here...
                        'Service_charge' => $cart_data['data']->Sub_total*0.05, //service charge is 5%
                        'Special_notes' => $cart_data['data']->Special_notes,
                        'Payment_method' => $payment_type,     //payement method from local variable
                        'Order_type' => $cart_data['data']->Order_type,
                        'Delivery_Address' => $cart_data['data']->Service_address,
                        'Order_is_for_me' => $cart_data['data']->Order_is_for_me,
                        'User_ID' => $cart_data['data']->User_ID,
                    ];
        
                    if($payment_type=="cash"){
                        //make a new order
                        $result_data = $this->model->createNewOrder($data, $cart_id);
                        //header cart count flag sets to zero
                        $_SESSION['cart_item_count'] = 0;
                        //cart sub total flag sets to zero
                        $_SESSION['cart_sub_total'] = 0;
                        //cart special notes flag sets to zero
                        $_SESSION['cart_special_notes'] = "";
                        //order for whome flag sets to zero
                        $_SESSION['order_is_for_me'] = 1;
                        //header cart count flag sets to zero
                        $_SESSION['cart_id'] = $result_data['newCartID'];
                        
                        $result_data['Status'] = 'success';

                        //update food item count
                        $order_id = $result_data['orderID'];
                        $isUpdated = $this->model->updateFoodItemCount($order_id);

                        if($isUpdated=="item_count_updated"){
                            //logs
                            //$this->debug("item count updated success");
                        }else if($isUpdated=="item_count_not_updated"){
                            //logs
                            $this->informational("item count updated failed");

                        }else if($isUpdated=="order_items_not_found"){
                            //logs
                            //$this->debug("order items not found");

                        }

        
                        $this->invoiceEmail($order_id, $data);
                        //logs
                        $amount = $data['Total_price'];
                        $this->informational("cash on service order placed. @amount=$amount, @order_id=$new_order_id, @user=$user_id");
                        
                        if($result_data['newCartID']){
                            //order success
                            $this->view('customer/cust-isorderplaced',$result_data);    /////////////////////////////////////payment successs page
                        }
            
                    }        
                
                }
            }

        }

        
        
        
    
    }


    public function payhere_form(){  
        header("Location: https://sandbox.payhere.lk/pay/checkout");
        die();
        // $this->view('customer/cust-order-success');
    }

    public function payhere_notify(){  //updates the database.. cannot be tested unless it has a dedicated IP

        $merchant_id         = $_POST['merchant_id'];
        $order_id             = $_POST['order_id'];
        $payhere_amount     = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig                = $_POST['md5sig'];

        $merchant_secret = 'XXXXXXXXXXXXX'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
                //TODO: Update your database as payment success
                $data = [
                    'Order_ID'=>$_POST['order_id'],
                    'Amount'=>$_POST['payhere_amount'],
                    'Currency'=>$_POST['payhere_currency'],
                    'Status_code'=>$_POST['status_code']
                ];

                $this->model->updatePayhereInfo($data);

        }
        
    }

    public function payhere_success(){
        if(isset($_GET['order_id'])){

            $order_id = $_GET['order_id'];

            //get cart data
            $cart_data = $this->model->payhere_get_cart_data($order_id);

            $data = [
                'Order_ID' => $order_id,
                'Status' => 'success',
                'User_ID' => $cart_data['data']->User_ID
            ];

            $this->model->Payhere_update($data);
    
            date_default_timezone_set('Asia/Colombo');
    
            if($cart_data['status'] === "success"){
       
                $data_order = [
                    'Order_Date_Time' => date($cart_data['data']->Service_date ." ". $cart_data['data']->Service_time), //combined serve date and time
                    'Item_count' => $cart_data['data']->Item_count,
                    'Total_price' => $cart_data['data']->Sub_total + $cart_data['data']->Sub_total*0.05, //including service charge, disregarded discounts here...
                    'Service_charge' => $cart_data['data']->Sub_total*0.05, //service charge is 5%
                    'Special_notes' => $cart_data['data']->Special_notes,
                    'Payment_method' => "payhere",     //payement was completed via payhere gateway
                    'Order_type' => $cart_data['data']->Order_type,
                    'Delivery_Address' => $cart_data['data']->Service_address,
                    'Order_is_for_me' => $cart_data['data']->Order_is_for_me,
                    'User_ID' => $cart_data['data']->User_ID,
                ];
                
                //make a new order
                $result_data = $this->model->createNewOrder($data_order, $cart_data['data']->Cart_id);
                //header cart count flag sets to zero
                $_SESSION['cart_item_count'] = 0;
                //cart sub total flag sets to zero
                $_SESSION['cart_sub_total'] = 0;
                //cart special notes flag sets to zero
                $_SESSION['cart_special_notes'] = "";
                //order for whome flag sets to zero
                $_SESSION['order_is_for_me'] = 1;
                //header cart count flag sets to zero
                $_SESSION['cart_id'] = $result_data['newCartID'];
                
                //email the invoice
                $this->invoiceEmail($result_data['orderID'], $data_order);
                //logs
                $new_order_id = $result_data['orderID'];
                $user_id = $data_order['User_ID'];
                $amount = $data_order['Total_price'];
                $this->informational("payhere order placed. @amount=$amount, @order_id=$new_order_id, @user=$user_id");

                $result_data['Status'] = 'success';

                if($result_data['newCartID']){
                    //order success
                    $this->view('customer/cust-isorderplaced',$result_data);    /////////////////////////////////////payment successs page
                }
               
            
            }
           
        }  

    }

    public function payhere_failed(){ 

        if(isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
          
            //get the cart id 
            $cart_data = $this->model->payhere_get_cart_data($order_id);

            $user_id =  $cart_data['data']->User_ID;
            $data = [
                'Order_ID' => $order_id,
                'Status' => 'failed',
                'User_ID' => $user_id
            ];
            $this->model->Payhere_update($data);
            //logs
            $this->warning("cash on service order failed. @user=$user_id");

        }  

        $this->view('customer/cust-order-isorderplaced',$data);             /////////////////////////////////////payment failed page
    }

    public function order(){  
        $this->view('customer/cust-order-info');
    }

    public function payment(){ 
        $this->view('customer/cust-payment');
    }

    
  
    public function myorders(){

        $user_id = $this->get_session('user_id');

        $result = $this->model->getMyOrders($user_id);

        if($result === "orders_not_found"){
            $this->set_flash("Orders404Error", "You haven't made any order yet. Let's place one? :) ");
            $this->view('customer/cust-myorders');

        }else if($result['status'] === "success"){

            $result_array = $result['data'];
            $order_list = [];

            foreach($result_array as $order){
                $datetime = $order->Order_Date_Time;
                //print_r($result['data']);
                $only_date = date("Y-m-d",strtotime($datetime));

                $o_status = $order->Order_status;
                $o_type = $order->Order_type;
                $p_method = $order->Payment_method;

                //onqueue, processing are status of order in KM's POV
                //which should be "Preparing" in customer's POV
                if($o_status =="onqueue" or $o_status =="processing"){
                    $order_status = "Preparing";

                //when order is ready in kitchen, 
                //DINE-IN, PICK-UP order=>
                    //which should be "Ready" or "Awaiting Pickup" in customer's POV
                //DELIVERY order => dispatched to a certain delivery person chosen by KM
                    //which should be "Awaiting delivery" in customer's POV
                }else if($o_status =="ready" and $o_type == "dine-in" ){
                    $order_status = "Ready";
                }else if($o_status =="ready" and $o_type == "pick-up" ){
                    $order_status = "Awaiting Pickup";
                }else if($o_status =="ready" and $o_type == "delivery" ){
                    $order_status = "Awaiting delivery";

                //when order is dispatched from  kitchen, 
                //DINE-IN order => dispatched to waiter
                //PICK-UP order => dispatched to customer
                //DELIVERY orders dont have a status "dispatched" instead it has "delivery_new"
                    //which should be "Ready" in customer's POV
                }else if($o_status =="dispatched" and $o_type == "dine-in"){
                    $order_status = "Served";
                }else if($o_status =="dispatched" and $o_type == "pick-up"){
                    $order_status = "Picked up";
                }
                else if($o_status =="delivery_new"){
                    $order_status = "Awaiting delivery";
                }
                //other status of DELIVERY orders =>
                else if($o_status =="delivery_ondelivery"){
                    $order_status = "On Delivery";
                }
                else if($o_status =="delivery_dispatched"){
                    $order_status = "Delivered";
                }
                //order completed
                else if($o_status =="done" and $o_type == "dine-in"){
                    $order_status = "Served";
                }
                else if($o_status =="done" and $o_type == "pick-up"){
                    $order_status = "Picked up";
                }
                else if($o_status =="done" and $o_type == "delivery" ){
                    $order_status = "Delivered";
                }

                //Payment method
                if($p_method == "cash"){
                    $payment_method = "Cash on Service";
                }else if($p_method == "payhere"){
                    $payment_method = "PayHere";
                }

                //prepare the amount to print
                $amount =  $order->Total_price;
                $amount = number_format($amount, 2, ".", "");
          
                $order_items = $this->model->getOrderItemsforMyOrders($order->Order_ID);
                $order_item_list = $order_items['data'];
                //one order row
                $order_row = [
                    "Order_ID" => $order->Order_ID,
                    "Date" =>  $only_date,
                    "Payment_Method" => $payment_method,
                    "Order_Status" => $order_status,
                    "Amount" => $amount,
                    "Item_list" => $order_item_list
                ];

                //append order_row array to the order_list after converting it to stdObj
                array_push($order_list, (object)$order_row);

            }
            //print_r($order_list);
            $this->view('customer/cust-myorders',$order_list);
        }

    }



    public function invoiceEmail($order_id, $data_order){//$
        // if(file_exists('../system/plugins/PHPMailer/mailer.php')) echo 'yes IN TEST';
        $mailer = new JB_Mailer(true);
        // echo "in activationEmail ";
        $payment_method = $data_order['Payment_method'];
        $order_type = $data_order['Order_type'];
        $delivery_address = $data_order['Delivery_Address'];
        $item_count = $data_order['Item_count'];
        $order_item_list = $this->model->getOrderItems($order_id);
        $total_amount = $data_order['Total_price'];
        $service_charge = $data_order['Service_charge'];
        $recipient_name = $this->get_session('user_name');
        $isOrderforMe = $data_order['Order_is_for_me'];
        //get recipient email address
        $recipient_email = $this->model->getEmail($this->get_session('user_id'));

        date_default_timezone_set('Asia/Colombo');
        $dateOfOrder = date("Y.m.d");
        
        $subject = "Your $order_type order #$order_id is placed";

        $email_head = "<html>
        <head>
            <style type=\"text/css\" rel=\"stylesheet\" media=\"all\">
                @import url(\"https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap\");
                body {
                    width: 100% !important;
                    height: 100%;
                    margin: 0;
                }
                
                a {
                    color: #3869D4;
                }
                
                a img {
                    border: none;
                }
                
                td {
                    word-break: break-word;
                }
                
                body,
                td,
                th {
                    font-family: \"Nunito Sans\", Helvetica, Arial, sans-serif;
                }
                
                h1 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 22px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h2 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h3 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: left;
                }
                
                td,
                th {
                    font-size: 16px;
                }
                
                p,
                ul,
                ol,
                blockquote {
                    margin: .4em 0 1.1875em;
                    font-size: 16px;
                    line-height: 1.625;
                }
                
                p.sub {
                    font-size: 13px;
                }
                
                .align-right {
                    text-align: right;
                }
                
                .align-left {
                    text-align: left;
                }
                
                .align-center {
                    text-align: center;
                }
                
                @media only screen and (max-width: 500px) {
                    .button {
                        width: 100% !important;
                        text-align: center !important;
                    }
                }
                
                .purchase {
                    width: 100%;
                    margin: 0;
                    padding: 35px 0;
                }
                
                .purchase_content {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                }
                
                .purchase_item {
                    padding: 10px 0;
                    color: #51545E;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .purchase_heading {
                    padding-bottom: 8px;
                    border-bottom: 1px solid #EAEAEC;
                }
                
                .purchase_heading p {
                    margin: 0;
                    color: #85878E;
                    font-size: 12px;
                }
                
                .purchase_footer {
                    padding-top: 15px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .purchase_total {
                    margin: 0;
                    text-align: right;
                    font-weight: bold;
                    color: #333333;
                }
                
                .purchase_total--label {
                    padding: 0 15px 0 0;
                }
                
                body {
                    background-color: white;
                    color: #51545E;
                }
                
                p {
                    color: #51545E;
                }
                
                p.sub {
                    color: #6B6E76;
                }
                
                .email-wrapper {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    background-color: #F4F4F7;
                }
                
                .email-content {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }
                
                .email-body {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    background-color: #FFFFFF;
                }
                
                .email-body_inner {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    background-color: #FFFFFF;
                }
                
                .email-footer {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    text-align: center;
                }
                
                .content-cell {
                    padding: 35px;
                }
                
                @media only screen and (max-width: 600px) {
                    .email-body_inner,
                    .email-footer {
                        width: 100% !important;
                    }
                }
            </style>
        
        </head>
        ";
        $email_body = "
        <body>
        <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">
            <tr>
                <td align=\"center\">
                    <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">
                        <tr>
                            <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                                <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">
                                    <tr>
                                        <td class=\"content-cell\">
                                            <div class=\"f-fallback\">
                                                <h1>Hi $recipient_name,</h1>
                                                <p>Thanks for your order. This is an invoice for your recently placed order.</p>
                                                <table class=\"purchase\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                                                    <tr>
                                                        <td>
                                                            <h3>Order #$order_id</h3>
                                                        </td>
                                                        <td>
                                                            <h3 class=\"align-right\">$dateOfOrder</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan=\"2\">
                                                            <table class=\"purchase_content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                                                                <p> Payment method : $payment_method </p>
                                                                <tr>
                                                                    <th class=\"purchase_heading\" align=\"left\">
                                                                        <p class=\"f-fallback\">Description</p>
                                                                    </th>
                                                                    <th class=\"purchase_heading\" align=\"right\">
                                                                        <p class=\"f-fallback\">Amount</p>
                                                                    </th>
                                                                </tr>
        ";
        $order_item_records = "";
        foreach($order_item_list['data'] as $row){
            //append each order string to order_item_records
            $order_item_records .= "<tr>
                     <td width=\"80%\" class=\"purchase_item\"><span class=\"f-fallback\">$row->Food_name x $row->Quantity</span></td>
                     <td class=\"align-right\" width=\"20%\" class=\"purchase_item\"><span class=\"f-fallback\">$row->Price</span></td>
                </tr>";
        }
        $service_charge_row .= "<tr>
                <td width=\"80%\" class=\"purchase_item\"><span class=\"f-fallback\">Service Charges(5%)</span></td>
                <td class=\"align-right\" width=\"20%\" class=\"purchase_item\"><span class=\"f-fallback\">$service_charge</span></td>
                </tr>";
        $total_row = "
        <tr>
            <td width=\"80%\" class=\"purchase_footer\" valign=\"middle\">
                <p class=\"f-fallback purchase_total purchase_total--label\">Total</p>
            </td>
            <td width=\"20%\" class=\"purchase_footer\" valign=\"middle\">
                <p class=\"f-fallback purchase_total\">LKR $total_amount</p>
            </td></tr></table></td></tr></table>";
        
        $extra_rows = "";

        if($order_type=="delivery"){
            $delivery_address = str_replace('$', ',', $delivery_address);
            $extra_rows .= "<p> Delivery address : $delivery_address </p>";
        }
        if(!$isOrderforMe){
            //get recipient info name, phone no
            $other_recipient = $this->model->getOtherRecipient($order_id);
            $extra_rows .= "<p> Recipient name : $other_recipient </p>";
        }
        
        $email_footer ="
        <p>If you have any questions about this invoice, simply reply to this email or reach out to our <a href=\"mailto:cafe99.teamdashcode@gmail.com\">support team</a> for help.</p>
        <p>Cheers,<br>Team Cafe99.</p></div></td></tr></table></td></tr></table></td></tr></table></body></html>
        ";
        $html_body = $email_head . $email_body . $order_item_records . $service_charge_row .  $total_row . $extra_rows  . $email_footer ;

        $send = $mailer->sendEmail($recipient_email, $recipient_name, $subject, $html_body, "");//

        if($send){
            $this->informational("email invoice sent; @orderID = $order_id, @email = $recipient_email");
            return TRUE;
        } 
        else return FALSE;
    }

    public function reorder_checkFoodItemAvailability($order_id){
        //get order items from order_items and fooditem tables (ordered qty, food item_count)
        $food_items_and_qty = $this->model->getQtywithItemCount_reorder($order_id);
        // $this->debug($food_items_and_qty, $order_id);
        if($food_items_and_qty['status'] === "success"){

            foreach($food_items_and_qty['data'] as $item){
                if($item->Quantity >= $item->Current_count){
                    return false;
                }
            }
            return true;
        }
    }


    public function reorderSubmit($order_id){

        if(!$this->reorder_checkFoodItemAvailability($order_id)){
            $this->set_flash("ItemsNotSufficient", "Sorry, some of the items you tried to reorder are not available right now");
            redirect('customer/cust-myorders');
        }else{

            $user_id = $this->get_session('user_id');
            date_default_timezone_set('Asia/Colombo');
            $order_data = $this->model->getOrderDetails($order_id);

            //order time is due, current time + 30 mins
            $current_time =  strtotime(date('H:i'));
            $order_time = date('H:i', strtotime('+30 minutes',$current_time));
            $data = [
                'Order_Date_Time' => date("Y-m-d ". $order_time), //combined order time with current date 
                'Item_count' => $order_data->Item_count,
                'Total_price' => 0, //temp set to zero, cause prices might have changed 
                'Service_charge' => 0, //temp set to zero
                'Special_notes' => $order_data->Special_notes,
                'Payment_method' => "cash",     //reordering is only for cash 
                'Order_type' => $order_data->Order_type,
                'Delivery_Address' => $order_data->Delivery_Address,
                'Order_is_for_me' => 1, //reordering is only for self
                'User_ID' => $order_data->User_ID,
            ];
            
            //make a new order with current prices for the food items
            $result_data = $this->model->createReorder($data, $order_id);
            $data['Total_price'] = $result_data['Total_price'];
            $data['Service_charge'] = $result_data['Service_charge'];
            $this->invoiceEmail($result_data['Order_ID'], $data);
            //logs
            

            if($result_data['Order_ID']){
                //order success
                $this->view('customer/cust-isorderplaced',$result_data);    /////////////////////////////////////payment successs page
            }

        }    

    }

    public function cart_checkFoodItemAvailability($cart_id){
        
        //get order items from cartitem and fooditem tables (requested qty, food item_count)
        $food_items_and_qty = $this->model->getQtywithItemCount_cart($cart_id);
        //print_r($food_items_and_qty['data']);
        if($food_items_and_qty['status'] === "success"){

            foreach($food_items_and_qty['data'] as $item){
                if($item->Quantity > $item->Current_count){
                    return ['status'=>'unavail', 'data'=>$item->FoodName];
                }
            }
            return ['status'=>'avail'];
        }
    }

  

}