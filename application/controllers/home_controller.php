<?php

class Home_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("home_model");
    }

    public function index(){
        $this->view('home');
    }

    public function four_0_four(){
        $this->view('error');
    }

}

?>