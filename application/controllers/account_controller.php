<?php

class Account_controller extends JB_Controller{


    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("account_model");
    }

    public function index(){
        $this->view('home');
    }

    public function signup(){
        $this->view('signup');
    }
    public function signupSubmit(){
        
        $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        $this->validation('Email_address','Email Address', 'required|unique|users');
        $this->validation('Phone_no','Phone no', 'unique|users|required');
        $this->validation('User_Password','Password', 'required|min_len|5');
        $this->validation('confirm_password','Confirm Password', 'required|confirm|User_Password');

        if($this->run()){
            // echo "Form is submitted";
            $User_name = $this->post('User_name');
            $Email_address = $this->post('Email_address');
            $Phone_no = $this->post('Phone_no');
            // $User_Password = $this->post('User_Password');
            $User_Password = $this->hash($this->post('User_Password'));

            $Token = bin2hex(openssl_random_pseudo_bytes(16));


            $data = [
                'User_name' => $User_name,
                'Email_address' => $Email_address,
                'Phone_no' => $Phone_no,
                'User_Password' => $User_Password,
                'Registered_date' => date("Y-m-d"),
                'Role_ID' => 1,
                'Token' => $Token
            ];

            if($this->model->signup($data)){
                // echo "data is inserted";
                $this-> set_flash("signupSuccess","Your account is successfully created.");
                $this->view('login');
            }else{
                echo "sorry";
            }

        }else{
            $this->view('signup');
        }
    }
    public function login(){
        $this->view('login');
    }

    public function forgot(){
        $this->view('forgot');
    }



}



?>