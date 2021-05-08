<?php
class Cashier_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        $this->model = $this->model("cashier_model");

        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="cashier"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
    }

    public function index(){
        $this->foodmenu();
     }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
    public function orders($status = "Onqueue"){
        $result =  $this->model->getOrders();

        if($result === "Order_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show orders at the moment. Please try again later.");
            $this->view('cashier/orders/orders');
            //echo"dberror";
        }else if($result === "Order_not_found"){
            $this->set_flash("noordersError", "Sorry, cannot show orders at the moment. Please try again later.");
            $this->view('cashier/orders/orders');
            //echo"nofood";
        }else if($result['status'] === "success"){
            //$this->view('cashier/orders/orders',$result['data']);
            // print_r($result['data']);

            $data = $result['data'];
            // $this->view('cashier/orders/orders');

            if(file_exists("../application/views/cashier/orders/orders.php")){
                require_once "../application/views/cashier/orders/orders.php";
            }else{
                include "../application/views/error.php";
                die();
                // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry View <strong>".$view_name."</strong> is not found</div>");
            }
        }
    }

    // public function foodmenu(){
    //     $this->view('cashier/foodmenu/foodmenu');
    // }

    public function foodmenu($status = "Food", $searched = false){
        // $result =  $this->model->getFooditems();

        // if($result === "Food_not_retrieved"){
        //     $this->set_flash("databaseError", "Sorry, cannot show fooditems at the moment. Please try again later.");
        //     //echo"dberror";
        // }else if($result === "Food_not_found"){
        //     $this->set_flash("nofoodError", "Sorry, cannot show fooditems at the moment. Please try again later.");
        //     //echo"nofood";
        // }else if($result['status'] === "success"){
        //     $this->view('cashier/foodmenu/foodmenu',$result['data']);
        // }

        $result =  $this->model->getFooditems();

        if($result === "Food_not_retrieved" || $result === "Subcat_not_retrieved" || $result === "Category_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"dberror";
        }else if($result === "Food_not_found" || $result === "Subcat_not_found" || $result === "Category_not_found"){
            $this->set_flash("nofoodError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"nofood";
        }else if($result['status'] === "success"){
            $data = $result['data'];
            // print_r($data);

            // $this->view('cashier/foodmenu/foodmenu_new',$result['data']);
            if(file_exists("../application/views/cashier/foodmenu/foodmenu_new.php")){
                require_once "../application/views/cashier/foodmenu/foodmenu_new.php";
            }else{
                include "../application/views/error.php";
                die();
                // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry View <strong>".$view_name."</strong> is not found</div>");
            }
        }

    }

    public function searchfood($status = "Food"){
        if(isset($_POST["search"])){
            $foodname = $_POST["search"];
            $searched = ($foodname == "")? false : true;

            if($searched == false){
                $this->foodmenu($status);
            }else{
                $result =  $this->model->getSearchFooditems($foodname);
                if($result === "Food_not_retrieved" || $result === "Category_not_retrieved"){
                    $this->set_flash("databaseError", "Sorry, cannot show fooditems at the moment. Please try again later.");
                    //echo"dberror";
                }else if($result === "Food_not_found" || $result === "Category_not_found"){
                    $this->set_flash("foodNotFound", "It looks like there aren't many great matches for your search");
                    $this->foodmenu();
                    //echo"nofood";
                }else if($result['status'] === "success"){
                    $data = $result['data'];
                    // print_r($data);
    
                    if(file_exists("../application/views/cashier/foodmenu/foodmenu_new.php")){
                        require_once "../application/views/cashier/foodmenu/foodmenu_new.php";
                    }else{
                        include "../application/views/error.php";
                        die();
                        // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry View <strong>".$view_name."</strong> is not found</div>");
                    }
                }
            }
        }else{
            $this->foodmenu($status);
        }
    }

    public function newsfeed(){
        $result = $this->model->getAnnouncement();
        //$this->view('cashier/newsfeed/newsfeed');
        if($result === "Announcement_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show Announcement at the moment. Please try again later.");
            $this->view('cashier/newsfeed/newsfeed');
            // echo"dberror";
        }else if($result === "Announcement_not_found"){
            $this->set_flash("noAnnouncementError", "There is no announcements at the moment");
            $this->view('cashier/newsfeed/newsfeed');
            // echo"noAnnouncement";
        }else if($result['status'] === "success"){
            $this->view('cashier/newsfeed/newsfeed', $result['data']);

        }
    }
    public function orderfood(){
        $this->view('cashier/orderfood/orderfood');
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

            }
  
        }
        
    }

    public function removefromcart(){
        if(isset($_POST['action'])){
            $food_id = $_POST['food_id'];
            $food_name = $_POST['food_name'];
            $food_qty = $_POST['qty'];
            $food_price = $_POST['price'];

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
    }

    public function mycart(){
        $cart_id = $this->get_session('cart_id');
        $result = $this->model->get_cart_items($cart_id);

        if($result === "Cart_items_not_retrieved"){
            $this->view('cashier/orderfood/cashier-cart');

        }else if($result === "Empty_cart"){
            $this->view('cashier/orderfood/cashier-cart');

        }else if($result['status'] === "success"){
            $this->view('cashier/orderfood/cashier-cart',$result['data']);

        }
        // $this->view('cashier/orderfood/cashier-cart');
    }

    public function proceedToOrderDetails(){
        
        $this->validation('specialnote','Special Notes', 'max_len|100');
    
        if($this->run()){
            //check if the items are available as of now
            $cart_id = $this->get_session('cart_id');
            $result = $this->cart_checkFoodItemAvailability($cart_id);

            if($result['status']=='unavail'){
                $food_name = $result['data'];
                redirect("cashier_controller/mycart");
            }
            else{
                $note = $this->post('specialnote');
                $this->set_session('cart_special_notes',$note);
                $this->view('cashier/orderfood/cashier-order-info');
            }

        }else{
            redirect("cashier_controller/mycart");  
        }

    }

    public function cart_checkFoodItemAvailability($cart_id){
        
        //get order items from cartitem and fooditem tables (requested qty, food item_count)
        $food_items_and_qty = $this->model->getQtywithItemCount_cart($cart_id);
        //print_r($food_items_and_qty['data']);
        if($food_items_and_qty['status'] === "success"){

            foreach($food_items_and_qty['data'] as $item){
                $this->debug("qty is",$item->Quantity, "count is",$item->Current_count);
                if($item->Quantity > $item->Current_count){
                    return ['status'=>'unavail', 'data'=>$item->FoodName];
                }
            }
            return ['status'=>'avail'];
        }
    }

    public function order(){  
        $this->view('cashier/orderfood/cashier-order-info');
    }
    

    public function payment(){ 
        $this->view('cashier/orderfood/cashier-payment');
    }

    public function orderSubmit(){  
        $this->view('cashier/orderfood/cust-order-info');
    }

    public function completeOrder(){
       
        $user_id = $this->get_session('user_id');
        $cart_id = $this->get_session('cart_id');
        date_default_timezone_set('Asia/Colombo');
        $ip = $_SERVER['SERVER_ADDR'];

            $payment_type = "cash";// if this arrives here, must be cash

            //get cart data
            $cart_data = $this->model->get_cart_data($cart_id);

            //A possible attempt to form resubmission
            if($cart_data['data']->Item_count==0){
                //logs
                $this->warning("possible form resubmission (create order): @user = $user_id, @ip = $ip");
                $this->set_flash("OrderFormResubmission", "Opps! Sorry, You cannot resubmit the form");
                $this->view('cashier/orderfood/cashier-cart');

            }else{
                if($cart_data['status'] === "success"){
    
                    $data = [
                        'Order_Date_Time' => date("Y-m-d H:i:s"), //combined serve date and time
                        'Item_count' => $cart_data['data']->Item_count,
                        'Total_price' => $cart_data['data']->Sub_total + $cart_data['data']->Sub_total*0.05, //including service charge, disregarded discounts here...
                        'Service_charge' => $cart_data['data']->Sub_total*0.05, //service charge is 5%
                        'Special_notes' => $this->post('specialnote'),
                        'Payment_method' => "cash",     //payement method from local variable
                        'Order_type' => "dine-in", //$cart_data['data']->Order_type
                        'User_ID' => $cart_data['data']->User_ID,
                    ];
                    // print_r($data);

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
                            $this->informational("item count updated success");
                        }else if($isUpdated=="item_count_not_updated"){
                            //logs
                            $this->informational("item count updated failed");

                        }else if($isUpdated=="order_items_not_found"){
                            //logs
                            $this->informational("order items not found");

                        }
                        
                        if($result_data['newCartID']){
                            //order success
                            $this->view('cashier/orderfood/cashier-isorderplaced',$result_data); 
                        }
            
                    }        
                
                }
            }

        // }

        
        
        
    
    }
   
}
?>