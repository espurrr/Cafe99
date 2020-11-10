<?php
class RM_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
    }

    public function index(){
        $this->view('restaurantmanager/RMnewsfeed');

    }
    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
   
}
?>