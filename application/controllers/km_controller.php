<?php
class KM_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="kitchen_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
    }

    public function index(){
        $this->view('kitchenmanager/orders/orders');
    }
    
    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }

    public function orders(){
        $this->view('kitchenmanager/orders/orders');
    }
    public function foodmenu(){
        $this->view('kitchenmanager/foodmenu/foodmenu');
    }
    public function newsfeed(){
        $this->view('kitchenmanager/newsfeed/newsfeed');
    }
}
?>