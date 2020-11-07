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

}
?>