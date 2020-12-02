<?php
class Order_Controller extends JB_Controller{

    public function index(){
        
    }
    public function cust_cart(){
        $this->view('customer/cust-cart');
    }
    public function cust_order_info(){
        $this->view('customer/cust-order-info');
    }
    public function cust_payment(){
        $this->view('customer/cust-payment');
    }


}
?>