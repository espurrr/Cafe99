<?php
class RM_Controller extends JB_Controller{
    public $model;
    public function __construct(){
        parent::__construct();
       if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
        $this->model = $this->model("rmuser_model");
    }

    public function index(){
        $this->view('restaurantmanager/RMnewsfeed');
    }

    public function create(){
        $this->view('restaurantmanager/create');
    }

    public function edit(){
        $this->view('restaurantmanager/edit');
    }

  /*  public function users(){
        $this->view('restaurantmanager/users/RM');
    }*/
    
    public function userscreate(){
        $this->view('restaurantmanager/users/create');
    }

    public function usersedit(){
        $this->view('restaurantmanager/users/edit');
    }

    public function savedata(){
        /*   $this->view('restaurantmanager/users/create');*/
        
           $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
           $this->validation('Email_address','Email address', 'unique|user|required');
           $this->validation('Phone_no','Phone no', 'unique|user|required|len|10');
           $this->validation('User_Password','User password', 'required|min_len|5');
   
           if($this->run()){
          //   echo "data insert";
   
               $this->view('restaurantmanager/users/create');
               $User_name = $this->post('User_name');
               $Email_address = $this->post('Email_address');
               $Phone_no = $this->post('Phone_no');
            // $User_Password = $this->post('password');
               $User_Password = $this->hash($this->post('User_Password'));
               $User_role=$this->post('User_role');
          //   $Token = bin2hex(openssl_random_pseudo_bytes(16));
               $Token="abc";
            
   
               $data = [
                   'User_name' => $User_name,
                   'Email_address' => $Email_address,
                   'Phone_no' => $Phone_no,
                   'User_Password' => $User_Password,
                // 'User_role'=>$User_role,
                   'User_status'=> "active",
                   'Registered_date' => date("Y-m-d"),
              /*  'Registered_date' => $Registered_date,*/
                   'Token' => $Token
               ];
              
              
                if($this->model->userscreate($data)){
                 //  echo "New user create successfully";
                   $this->set_flash("userSuccess", "New user create successfully");
                  // redirect('rmuser_controller/users');
                  $this->view('restaurantmanager/users/create');
               }
                
                else{
                   $this->set_flash("Error", "Something went wrong :( Please try again later.");
                   $this->view('restaurantmanager/users/create');
              }
              
           }
           else{
               $this->view('restaurantmanager/users/create');
           }
   
       }
   
   
   
   public function users($id="User_ID"){
       if(empty($id)){
           $this->view('restaurantmanager/users/RM');
   
       }else{
           $user_data['id'] = $id;
           $result=$this->model->display_users($user_data);
           $this->view('restaurantmanager/users/RM',$result['data']);
   }
   }
   
   
   public function user_update_values(){
   
       $id = $this->get_session('User_ID');
   
       $result = $this->model->user_data( $id);
   
       $this->view('restaurantmanager/users/edit',$result['data']);
   
     /*  if($result === "User_not_found"){
           echo "user no";
           $this->set_flash("userError", "Hmm.. You are an imposter, aren't you??");
           $this->view('customer/cus_profile_update');
       }else if($result === "Data_not_retrieved"){
           echo "datano";
           $this->set_flash("dbError", "It seems like your data is not ready yet.");
           $this->view('customer/cus_profile_update');
       }else if($result['status'] === "success"){
           $this->view('customer/cus_profile_update',$result['data']);
       }*/
   
   }
   
   public function user_update_save(){
   
      $id = $this->get_session('User_ID');
       
           $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
           $this->validation('Email_address','Email address', 'unique|user|required');
           $this->validation('Phone_no','Phone no', 'unique|user|required|len|10');
           $this->validation('User_Password','User password', 'required|min_len|5');
   
       if($this->run()){
           // echo "Form is submitted";
        
         //  $this->view('restaurantmanager/users/edit');
               $User_name = $this->post('User_name');
            //   $Email_address = $this->post('Email_address');
               $Phone_no = $this->post('Phone_no');
               $User_role=$this->post('User_role');
   
           $data = [
               'User_name' => $User_name,
               'Phone_no' => $Phone_no,
           //    'Email_address' => $Email_address,
               'User_role'=>$User_role,
           ];
           // print_r($data);
   
           if($this->model->user_data_update($data,  $id)){
               $this-> set_flash("updateSuccess","Hey $User_name! Your profile is successfully updated.");
               $this->view('restaurantmanager/users/edit');
              
           }else{
               $this->set_flash("updateError", "Something went wrong :( Please try again.");
               $this->view('restaurantmanager/users/edit');
           }
           
       }else{
       redirect('rm_controller/users');
       }
   }
   
   
   public function delete_user_data(){
   
       $id = $this->get_session('User_ID');
       $result = $this->model->deleteuser( $id );
       $this->view('restaurantmanager/users/RM');
   } 
   

    public function orders(){
        $this->view('restaurantmanager/orders/RM');
    }

    public function orderscreate(){
        $this->view('restaurantmanager/orders/create');
    }

    public function ordersedit(){
        $this->view('restaurantmanager/orders/edit');
    }

    public function fooditem(){
        $this->view('restaurantmanager/fooditem/RM');
    }

    public function fooditemcreate(){
        $this->view('restaurantmanager/fooditem/create');
    }

    public function fooditemedit(){
        $this->view('restaurantmanager/fooditem/edit');
    }

    public function subcategory(){
        $this->view('restaurantmanager/subcategory/RM');
    }

    public function subcategorycreate(){
        $this->view('restaurantmanager/subcategory/create');
    }

    public function subcategoryedit(){
        $this->view('restaurantmanager/subcategory/edit');
    }

    public function category(){
        $this->view('restaurantmanager/category/RM');
    }

    public function categorycreate(){
        $this->view('restaurantmanager/category/create');
    }

    public function categoryedit(){
        $this->view('restaurantmanager/category/edit');
    }

    public function analytics(){
        $this->view('restaurantmanager/analytics/analytics');
    }

    public function analyticschart(){
        $this->view('restaurantmanager/analytics/chart');
    }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
   
}
?>