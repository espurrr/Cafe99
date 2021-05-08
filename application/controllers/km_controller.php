<?php
class KM_Controller extends JB_Controller{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("km_model");

        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="kitchen_manager"){
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
            $this->view('kitchenmanager/orders/orders');
            //echo"dberror";
        }else if($result === "Order_not_found"){
            $this->set_flash("noordersError", "Sorry, cannot show orders at the moment. Please try again later.");
            $this->view('kitchenmanager/orders/orders');
            //echo"nofood";
        }else if($result['status'] === "success"){
            //$this->view('kitchenmanager/orders/orders',$result['data']);
            //print_r($result['data']);

            $data = $result['data']['orders'];
            $dp_data =  $result['data']['dp'];
            // print_r($dp_data);

            if(file_exists("../application/views/kitchenmanager/orders/orders.php")){
                require_once "../application/views/kitchenmanager/orders/orders.php";
            }else{
                include "../application/views/error.php";
                die();
                // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry View <strong>".$view_name."</strong> is not found</div>");
            }
        }
    }
    public function foodmenu($status = "Food", $searched = false){
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

            // $this->view('kitchenmanager/foodmenu/foodmenu',$result['data']);
            if(file_exists("../application/views/kitchenmanager/foodmenu/foodmenu.php")){
                require_once "../application/views/kitchenmanager/foodmenu/foodmenu.php";
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
    
                    // $this->view('kitchenmanager/foodmenu/foodmenu',$result['data']);
                    if(file_exists("../application/views/kitchenmanager/foodmenu/foodmenu.php")){
                        require_once "../application/views/kitchenmanager/foodmenu/foodmenu.php";
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
        //$this->view('kitchenmanager/newsfeed/newsfeed');
        if($result === "Announcement_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show Announcement at the moment. Please try again later.");
            $this->view('kitchenmanager/newsfeed/newsfeed');
            // echo"dberror";
        }else if($result === "Announcement_not_found"){
            $this->set_flash("noAnnouncementError", "There is no announcement at the moment.");
            $this->view('kitchenmanager/newsfeed/newsfeed');
            // echo"noAnnouncement";
        }else if($result['status'] === "success"){

            $this->view('kitchenmanager/newsfeed/newsfeed',$result['data']);
        }
    }

    public function updateAvailability($refresh_state="Food"){
        if (isset($_POST['av'])){
            $food_id = (int)$_POST['av'];
            $data = ['Availability'=>'Available'];
        }
        if (isset($_POST['unav'])){
            $food_id = (int)$_POST['unav'];
            $data = ['Availability'=>'Unavailable'];
        }

        if($this->model->updateAvailability($data , $food_id)){
            $this-> set_flash("updateSuccess","Food item updated successfully");
        }
        else{
            $this-> set_flash("updateUnsuccess","Food item wasn't updated successfully");
        }
        // echo $refresh_state;
        redirect("km_controller/foodmenu/".$refresh_state);
        

    } // updateFooditemAvailability ends here

    public function updateCurrentCount($food_id, $refresh_state="Food"){
        if (isset($_POST['quantity'])){
            $quantity = (int)$_POST['quantity'];
            $data = ['Current_count'=>$quantity];
        }

        if($this->model->updateCurrentCount($data , $food_id)){
            $this-> set_flash("updateSuccess","Food item updated successfully");
        }
        else{
            $this-> set_flash("updateUnsuccess","Food item wasn't updated successfully");
        }
        // echo $refresh_state;
        redirect("km_controller/foodmenu/".$refresh_state);
    }

    public function updateCountToDefault($category_name){
        if($this->model->updateCountToDefault($category_name)){
            $this-> set_flash("updateSuccess","Food count updated successfully");
        }
        else{
            $this-> set_flash("updateUnsuccess","Food count wasn't updated successfully");

        }

        redirect("km_controller/foodmenu/".$category_name);

    }

    public function updateOrderStatus(){
        if (isset($_POST['onqueue'])){
            $order_id = (int)$_POST['onqueue'];
            $data = ['Order_status' => 'processing', 'Kitchen_Manager' => $this->get_session('user_id')];
            $refresh_state = "Onqueue";

        }

        if (isset($_POST['processing'])){

            $isPickup = 0;  //need to send an email notif when pick-up order is ready
            
            $order_id = (int)$_POST['processing'];
            $data = ['Order_status' => 'ready'];
            $refresh_state = "Processing";
            $order_result = $this->model->getOrderType($order_id);

            if($order_result === "Order_type_not_retrieved"){
                $this->set_flash("databaseError", "Sorry, cannot show order type at the moment. Please try again later.");
                $this->view('kitchenmanager/orders/orders');
                //echo"dberror";
            }else if($order_result === "Order_type_not_found"){
                $this->set_flash("noorderTypeError", "Sorry, cannot show order type at the moment. Please try again later.");
                $this->view('kitchenmanager/orders/orders');
                //echo"nofood";
            }else if($order_result['status'] === "success"){
                $order_type = $order_result['data'][0]->Order_type;
                //echo $order_type;
            }
            if($order_type == "pick-up"){
                $isPickup = 1;  //pick-up flag turns 1. need to send email notif.
            }

        }

        if (isset($_POST['ready'])){
            $order_id = (int)$_POST['ready'];
            $result = $this->model->getOrderType($order_id);


            if($result === "Order_type_not_retrieved"){
                $this->set_flash("databaseError", "Sorry, cannot show order type at the moment. Please try again later.");
                $this->view('kitchenmanager/orders/orders');
                //echo"dberror";
            }else if($result === "Order_type_not_found"){
                $this->set_flash("noorderTypeError", "Sorry, cannot show order type at the moment. Please try again later.");
                $this->view('kitchenmanager/orders/orders');
                //echo"nofood";
            }else if($result['status'] === "success"){
                $order_type = $result['data'][0]->Order_type;
                //echo $order_type;
            }
            if($order_type == "delivery"){
                $data = ['Order_status' => 'delivery_new'];
                $refresh_state = "Ready";
            }else{
                $data = ['Order_status' => 'dispatched'];
                $refresh_state = "Ready";
            }
            
        }

        if (isset($_POST['dispatched'])){
            $order_id = (int)$_POST['dispatched'];
            $data = ['Order_status' => 'Done', 'Kitchen_Dispatch_DateTime' => date("Y-m-d H:i:s")];
            $refresh_state = "Dispatched";
        }

        if($this->model->updateOrderStatus($data , $order_id)){
            
            if($isPickup){
                //send an email notif saying order is ready to pickup

                //  -> get customer's name and email address
                $user_info = $this->model->getCustomerData($order_id);
                if($user_info['status'] === "User_data_not_retrieved" or $user_info['status'] === "User_not_found" ){
                    $this->set_flash("EmailError", "User information was not retrieved. Email notification was not sent.");
                    redirect("km_controller/orders/".$refresh_state);
                }else if($user_info['status'] === "success"){
                //  -> send the email notification
                    if($this->pickup_email($order_id,$user_info['data']->username,$user_info['data']->email)){
                        $this-> set_flash("orderUpdateSuccessEmailSent","Order item updated successfully. Pick up email notification sent to customer.");
                        //logs
                        $this->informational("order#$order_id pickup order email notif is sent successfully");

                    }else{
                        $this-> set_flash("orderUpdateSuccessEmailNotSent","Order item was updated successfully. Pick up email notification failed to send.");
                        //logs
                        $this->warning("order#$order_id pickup order email notif failed to send");

                    }
                }
            }else{
                //delivery and dine-in order need not to send an email notif
                $this-> set_flash("orderUpdateSuccess","Order item updated successfully");
            }

        }
        else{
            $this-> set_flash("orderUpdateUnsuccess","Order item wasn't updated successfully");
        }
        redirect("km_controller/orders/".$refresh_state);
    }

    public function updateDeliveryOrderStatus(){
        if (isset($_POST['delivery_persons_id'])){
            $post_data = $_POST['delivery_persons_id'];
            $post_data = explode(",", $post_data);
            $order_id = $post_data[0];
            $del_person_id = $post_data[1];
            // echo $order_id;
            // echo $del_person_id;

            $data = ['Order_status' => 'delivery_new', "Delivery_Person" => $del_person_id];
            $refresh_state = "Ready";

            if($this->model->updateDeliveryOrderStatus($data , $order_id)){
                $this-> set_flash("orderUpdateSuccess","Order item updated successfully");
            }else{
                $this-> set_flash("orderUpdateUnsuccess","Order item wasn't updated successfully");
            }
            redirect("km_controller/orders/".$refresh_state);
        }   

    }

    public function pickup_email($order_id, $recipient_name, $recipient_email){
 
        $mailer = new JB_Mailer(true);
        date_default_timezone_set('Asia/Colombo');
        $date = date("F j, Y");
        $subject = "Your Order#$order_id is ready for pickup";
        $html_body = "<html><body style=\"font-family: sans-serif;\">
        <h2>Hey $recipient_name,</h2> 
        <p>Your order is ready for pickup. Please bring your email invoice when you come to collect your order</p> 
        <h3> Order #$order_id </h3>
        $date<br>
        <h3>Pick up Location</h3>
        <p>Cafe99,<br>Ledger Avenue,<br>Maharagama.</p><br>
        <p><i>If you did not make this order or need assistance, please email <a href=\"mailto:cafe99.teamdashcode@gmail.com\">us</a></i></p><p>Cheers,<br>Team Cafe99.</p>
        </body></html>";

        $send = $mailer->sendEmail($recipient_email, $recipient_name, $subject, $html_body, "");//
        if($send) return TRUE;
        else return FALSE;
        
    }

}
?>