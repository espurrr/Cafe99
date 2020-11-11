<?php

class Account_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("account_model");
    }

    public function index(){
        $this->view('sidebar_cashier');
    }

    public function signup(){
        $this->view('signup');
    }
    public function signupSubmit(){
        
        $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        $this->validation('Email_address','Email Address', 'unique|user|required');
        $this->validation('Phone_no','Phone number', 'unique|user|required|len|10');
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
               if($this->activationEmail("boody.abay@gmail.com","Lupuchu","","",$Token)){
                    $this-> set_flash("signupSuccess","Your account is successfully created. We've sent an email to $Email_address to verify your address. Please click on the link in the email to continue.");
                    $this->view('login');
               }else{
                   //Email was not sent. need to delete the current record of the user.
                    $this->model->deleteUser($Token);
                    $this->set_flash("activationEmailError", "Something went wrong :( Please try again.");
                    $this->view('signup');
                }              
                
            }else{
                 $this->set_flash("signupError", "Something went wrong :( Please try again later.");
                 $this->view('signup');
            }
            

        }else{
            $this->view('signup');
        }
    }

    public function activationEmail($recipient_email, $recipient_name, $subject, $html_body, $token){//$
        if(file_exists('../system/plugins/PHPMailer/mailer.php')) echo 'yes IN TEST';
        $mailer = new JB_Mailer(true);
        // echo "in activationEmail ";

        $subject = "Confirm Your Email";
        $html_body = "<html><body style=\"font-family: sans-serif;\">
        <p>You're just one step away..</p> 
        <a href=\"http://localhost/cafe99/account_controller/login/$token\" target=\"_blank\">
        <button style=\"border: none;
        padding: 1rem 2rem;
        text-decoration: none;
        background: #0069ed;
        color: #ffffff;
        font-size: 1rem;
        line-height: 1;
        text-align: center;\">

        Click to activate your Cafe99 account
        </a>
        <p><i>If you received this email by mistake, simply delete it. You won't be subscribed if you don't click the confirmation link above.</i></p><p>Cheers,<br>Team Cafe99.</p>
        </body></html>";


        $send = $mailer->sendEmail($recipient_email, $recipient_name, $subject, $html_body, "");//
        if($send) return TRUE;
        else return FALSE;
        // if($send) {
        //     $this->set_flash("activationEmailSent", "We now need to verify your email address. We've sent an email to $recipient_email to verify your address. Please click on the link provided to continue.");
        //     $this->view('signup');
        // }
        // else {
        //     $this->set_flash("activationEmailError", "Something went wrong :( Please try again later.");
        //     $this->view('home');
        // }
    }


    public function login($token=""){
        if(!empty($token)){
            $result = $this->model->isToken($token);
            if($result === "Token_not_found"){
                $this->set_flash("tokenError", "Sorry :( You came through an Invalid Token");
                $this->view('login');
            }else if($result === "Activation_error"){
                $this->set_flash("activationError", "Something went wrong :( Please try again later.");
                $this->view('login');
            }else if($result === "Success"){
                $this-> set_flash("activationSuccess","Congratulations! Your account has been successfully activated.");
                $this->view('login');
            }
        }else{
            $this->view('login');
        }
        
    }

    public function loginSubmit(){
        $this->validation('Email_address','Email', 'required');
        $this->validation('User_Password','Password', 'required');
        if($this->run()){
            $email = $this->post('Email_address');
            $password = $this->post('User_Password');
            $result = $this->model->login($email, $password);

            if($result === "Email_not_found"){
                $this->set_flash("emailError", "Email is incorrect");
                $this->login();
            }else if($result === "Password_not_matched"){
                $this->set_flash("passwordError", "Password is incorrect");
                $this->login();
            }else if($result['status'] === "success"){
                // echo "Login successssss! yay!";
                $session_data = [
                    'user_id' => $result['data']->User_ID,
                    'user_name' => $result['data']->User_name,
                    'role' => $result['data']->User_role,
                    'logged' => 1,
                    'loader' => true
                ];
                $this->set_session($session_data);
                //to be tested
                if($session_data['role']=="customer"){
                    $this->index();
                }else if($session_data['role']=="kitchen_manager"){
                    redirect("km_controller/index");
                }else if($session_data['role']=="cashier"){
                    redirect("cashier_controller/index");
                }else if($session_data['role']=="delivery_person"){
                    redirect("delivery_controller/index");
                }else if($session_data['role']=="restaurant_manager"){
                    redirect("rm_controller/index");
                }

                
            }
            
        }else{
            $this->view('login');

        }
    }

    public function forgot(){
        $this->view('forgot');
    }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }


}



?>