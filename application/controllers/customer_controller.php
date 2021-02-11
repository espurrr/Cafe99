<?php

class Customer_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="customer"){
            $this->destroy_session();
            redirect("account_controller/login");
            // $this->view('error');

        }
        $this->model = $this->model("customer_model");
    }
    

    public function index(){
        $this->view('home');
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
            echo "user no";
            $this->set_flash("userError", "Hmm.. You are an imposter, aren't you??");
            $this->view('customer/cus_profile_update');
        }else if($result === "Data_not_retrieved"){
            echo "datano";
            $this->set_flash("dbError", "It seems like your data is not ready yet.");
            $this->view('customer/cus_profile_update');
        }else if($result['status'] === "success"){
            $this->view('customer/cus_profile_update',$result['data']);
        }

    }

    public function profile_update_save(){

        $user_id = $this->get_session('user_id');
        
        $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        $this->validation('Phone_no','Phone number', 'required|int|len|10');
        $this->validation('AddressLine1','Address Line 1', '');
        $this->validation('AddressLine2','Address Line 2', '');
        $this->validation('City','City', '');
  
        if($this->run()){
            // echo "Form is submitted";
         
            $User_name = $this->post('User_name');
            $Phone_no = $this->post('Phone_no');
            $AddressLine1 = $this->post('AddressLine1');
            $AddressLine2 = $this->post('AddressLine2');
            $City = $this->post('City');

            $data = [
                'User_name' => $User_name,
                'Phone_no' => $Phone_no,
                'AddressLine1' => $AddressLine1,
                'AddressLine2' => $AddressLine2,
                'City' => $City
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
        $this->validation('New_Password','New Password', 'required|min_len|5');
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
        $new_pw = $this->hash($this->post('New_Password'));
        $result = $this->model->password_update($current_pw,$new_pw,$user_id);
    
        if($text==="GOODBYE"){
            $result = $this->model->deactivate_user($user_id);
            if($result==="DB_error"){
                $this->set_flash("dbError", "Something went wrong :( Please try again.");
                $this->view('customer/cus_profile_delete');
                
            }else if($result==="success"){
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


    public function myorders(){
        $this->view('customer/cust-myorders');
        // NEED UI
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
            $cart_item_total = ($price * $qty) * (1-$discount);
            $cart_sub_total = $this->get_session('cart_sub_total');
            //get the discount of the food, if any -> need to consider
            $discount = 0; //must be percentage as decimal. eg: 70% --> 0.7

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

    public function removefromcart(){

    }

    public function proceedToOrderDetails(){
        
        $this->validation('specialnote','Special Notes', 'max_len|100');
    
        if($this->run()){


           $note = $this->post('specialnote');
           $this->set_session('cart_special_notes',$note);
           $this->view('customer/cust-order-info');

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
        // echo $order_type;
        // echo $order_is_for;

        //order type
        if($order_type=='dine-in'){
            $this->validation('Dine-in-time', 'Dine-in time' , 'required|service_time');
      
            $order_date = $this->post('Dine-in-date');
            $order_time = $this->post('Dine-in-time');
            // echo $order_date;
            // echo $order_time;
       }else if($order_type=='pick-up'){
            $this->validation('Pick-up-time', 'Pick-up time' , 'required|service_time');

            $order_date = $this->post('Pick-up-date');
            $order_time = $this->post('Pick-up-time');
            // echo $order_date;
            // echo $order_time;
        }else if($order_type=='delivery'){
           // echo 'delivery';
            $this->validation('Delivery-address', 'Delivery address' , 'required');
            $this->validation('Delivery-time', 'Delivery time' , 'required');//....................................................................|service_time put
            $order_date = $this->post('Delivery-date');
            $order_time = $this->post('Delivery-time');
            $order_address = $this->post('Delivery-address');
            $order_address = str_replace(',', '$', $order_address);
            // echo $order_date;
            // echo $order_time;
            // echo $order_address;
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
            }
            

            // echo $order_receiver_id;
            // echo $rec_name;
            // echo $rec_phone;
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

        $payment_type = $this->post('pay_option');// if this arrives here, must be cash

        //get cart data
        $cart_data = $this->model->get_cart_data($cart_id);
        
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
                $new_cart_ID = $this->model->createNewOrder($data, $cart_id);
                //header cart count flag sets to zero
                $_SESSION['cart_item_count'] = 0;
                //header cart count flag sets to zero
                $_SESSION['cart_id'] = $new_cart_ID;
                if($new_cart_ID){
                    //order success
                    $this->view('customer/cust-order-success',$data);
                }else{
                    //order failed
                    $this->view('customer/cust-order-success',$data);
                }
    
            }
            
            if($payment_type=="payhere"){
               //taken care of by payment gateway
            }      

        }
     

        $this->view('customer/cust-order-info');

    
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
            $data = [
                'Order_ID' => $order_id,
                'Status' => 'success'
            ];
            $this->model->Payhere_update($data);
    
            date_default_timezone_set('Asia/Colombo');
    
            //get cart data
            $cart_data = $this->model->payhere_get_cart_data($order_id);
            
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
                //header cart count flag sets to zero
                $_SESSION['cart_id'] = $result_data['newCartID'];
                
                //email the invoice

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
        }  

        $this->view('customer/cust-order-isorderplaced',$data);             /////////////////////////////////////payment failed page
    }

    public function order(){  
        $this->view('customer/cust-order-info');
    }

    public function payment(){ 
        $this->view('customer/cust-payment');
    }


}