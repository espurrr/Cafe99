<?php
class Cashier_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        // if(!$this->get_session('user_id')){
        //     redirect("account_controller/login");
        // }
        // if($this->get_session('role')!="cashier"){
        //     $this->destroy_session();
        //     redirect("account_controller/login");
        // }
    }

    public function index(){
        $this->view('cashier/orderfood/orderfood');
     }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
    public function orders(){
        $this->view('cashier/orders/orders');
    }
    public function foodmenu(){
        $this->view('cashier/foodmenu/foodmenu');
    }
    public function newsfeed(){
        $this->view('cashier/newsfeed/newsfeed');
    }
    public function orderfood(){
        $this->view('cashier/orderfood/orderfood');
    }
   
}
?>