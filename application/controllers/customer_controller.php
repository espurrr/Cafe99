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
        $this->view('login');
    }

}