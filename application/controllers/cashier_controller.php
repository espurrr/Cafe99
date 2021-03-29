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
                'Cart_id' => 203,
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

    public function mycart(){
        $this->view('cashier/orderfood/cashier-cart');
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
   
}
?>