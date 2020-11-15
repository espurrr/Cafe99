<?php
class RMuser_Controller extends JB_Controller{
   
    public $model;
    public function __construct(){
        parent::__construct();
     /*    if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }*/
        $this->model = $this->model("Rmuser_model");
    }

    public function userscreate(){
        $this->view('restaurantmanager/users/create');
    }

    public function savedata(){
     /*   $this->view('restaurantmanager/users/create');*/
     
        $this->validation('User_name', 'name' , 'required|not_int|max_len|50');
       /* $this->validation('Email_address','email', 'unique|user|required');
        $this->validation('Phone_no','Pno', 'unique|user|required|len|10');
        $this->validation('User_Password','password', 'required|min_len|5');*/

        if($this->run()){
            $User_name = $this->post('User_name');
            $Email_address = $this->post('Email_address');
            $Phone_no = $this->post('Phone_no');
            // $User_Password = $this->post('password');
            $User_Password = $this->hash($this->post('User_Password'));
            $User_role=$this->post('User_role');
            $Registered_date=$this->post('Registered_date');
            $Token = bin2hex(openssl_random_pseudo_bytes(16));
         

            $data = [
                'User_name' => $User_name,
                'Email_address' => $Email_address,
                'Phone_no' => $Phone_no,
                'User_Password' => $User_Password,
                'User_role'=>$User_role,
                'Registered_date' => date("Y-m-d"),
           /*  'Registered_date' => $Registered_date,*/
              /*  'Role_ID' => 1,*/
                'Token' => $Token
            ];
           
             if($this->model->userscreate($data)){
                echo "New user create successfully";
                redirect("rm_controller/users");
             }
        }
        else{
            $this->view('restaurantmanager/users/create');
        }

    }



public function displaydata(){
    $this->load->view('restaurantmanager/users/RM');
    $result['data']=$this->Rmuser_model->display_users();
    $this->load->view('restaurantmanager/users/RM',$result);
}

}
?>