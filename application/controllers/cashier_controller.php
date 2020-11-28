<?php
class Cashier_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        $this->model = $this->model("cashier_model");

        // if(!$this->get_session('user_id')){
        //     redirect("account_controller/login");
        // }
        // if($this->get_session('role')!="cashier"){
        //     $this->destroy_session();
        //     redirect("account_controller/login");
        // }
    }

    public function index(){
        $this->foodmenu();
     }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
    public function orders(){
        $this->view('cashier/orders/orders');
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
        $this->view('cashier/newsfeed/newsfeed');
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