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

    public function foodmenu(){
        $result =  $this->model->getFooditems();

        if($result === "Food_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"dberror";
        }else if($result === "Food_not_found"){
            $this->set_flash("nofoodError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"nofood";
        }else if($result['status'] === "success"){
            $this->view('cashier/foodmenu/foodmenu',$result['data']);
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