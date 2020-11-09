<?php
class Order_Controller extends JB_Controller{

    public function index(){
        
    }
    public function cust_cart(){
        $this->view('cust-cart');
    }
    public function cust_order_info(){
        $this->view('cust-order-info');
    }
    public function cust_payment(){
        $this->view('cust-payment');
    }

    public function signupSubmit(){
        
        $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        $this->validation('Email_address','Email Address', 'required|unique|user');
        $this->validation('Phone_no','Phone number', 'unique|user|required|len|10');
        $this->validation('User_Password','Password', 'required|min_len|5');
        $this->validation('confirm_password','Confirm Password', 'required|confirm|User_Password');
        
    }

}
?>