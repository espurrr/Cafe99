<?php
class RMuser_Controller extends JB_Controller{

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

    public function savedata(){
        $this->view('restaurantmanager/users/create');
    

        $this->validation('User_name', 'name' , 'required|not_int|max_len|50');
        $this->validation('Email_address','email', 'unique|user|required');
        $this->validation('Phone_no','Pno', 'unique|user|required|len|10');
        $this->validation('User_Password','password', 'required|min_len|5');

        if($this->load->post('save')){
            $User_name = $this->post('name');
            $Email_address = $this->post('email');
            $Phone_no = $this->post('Pno');
            // $User_Password = $this->post('password');
            $User_Password = $this->hash($this->post('password'));
            $User_role=$this->post('role');
            $Token = bin2hex(openssl_random_pseudo_bytes(16));

            $data = [
                'name' => $User_name,
                'email' => $Email_address,
                'Pno' => $Phone_no,
                'password' => $User_Password,
                'role'=>$User_role,
                'regDate' => date("Y-m-d"),
              /*  'Role_ID' => 1,*/
                'Token' => $Token
            ];

            if($this->Rmuser_model->saverecords($data)){
                echo "New user create successfully";
                redirect("rm_controller/users");
        }

    }

}
}
?>