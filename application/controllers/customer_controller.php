<?php

class Customer_controller extends JB_Controller{

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
    }

    public function index(){
        $this->view('home');
    }

    public function logout(){
        $this->destroy_session();
        $this->view('home');
    }

    public function myprofile($page=""){
        if(empty($page)){
            $this->view('customer/cus_profile');
        }else{
            switch($page){
                case 'update':
                    $this->view('customer/cus_profile_update');
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
    

    public function myfavourites(){
        $this->view('customer/cust-favorites');
    }

    public function myorders(){
        // $this->view('customer/cust-orders');
        // NEED UI
    }

    public function mycart(){
        $this->view('customer/cust-cart');
    }

    public function order(){  
        $this->view('customer/cust-order-info');
    }

    public function payment(){ 
        $this->view('customer/cust-payment');
    }

    public function completeOrder(){  //last button in the payment
        $this->view('customer/cust-order-info');
    }


}