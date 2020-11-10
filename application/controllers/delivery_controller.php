<?php
class Delivery_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="delivery_person"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
    }

    public function index(){
        $this->view('deliveryperson/dp');
    }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
   
}
?>