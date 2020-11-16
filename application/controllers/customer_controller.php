<?php

class Customer_controller extends JB_Controller{

    public $model;
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
        $this->model = $this->model("customer_model");
    }
    

    public function index(){
        $this->view('home');
    }

    public function logout(){
        $this->destroy_session();
        redirect('account_controller/index');
    }

    public function myprofile($page=""){
        if(empty($page)){
            $this->view('customer/cus_profile');
        }else{
            switch($page){
                case 'update':
                    // $values = ;
                    $this->profile_update_values();
                    break;
                case 'resetpw':
                    $this->view('customer/cus_profile_pw');
                    break;
                case 'deactivate':
                    $this->view('customer/cus_profile_delete');
                    break;
                default:
                    $this->view('customer/cus_profile');
            }

        }
        
    }

    public function profile_update_values(){

        $user_id = $this->get_session('user_id');

        $result = $this->model->cus_data($user_id);

        if($result === "User_not_found"){
            echo "user no";
            $this->set_flash("userError", "Hmm.. You are an imposter, aren't you??");
            $this->view('customer/cus_profile_update');
        }else if($result === "Data_not_retrieved"){
            echo "datano";
            $this->set_flash("dbError", "It seems like your data is not ready yet.");
            $this->view('customer/cus_profile_update');
        }else if($result['status'] === "success"){
            $this->view('customer/cus_profile_update',$result['data']);
        }

    }

    public function profile_update_save(){

        $user_id = $this->get_session('user_id');
        
        $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        $this->validation('Phone_no','Phone number', 'required|int|len|10');
        $this->validation('AddressLine1','Address Line 1', '');
        $this->validation('AddressLine2','Address Line 2', '');
        $this->validation('City','City', '');
  
        if($this->run()){
            // echo "Form is submitted";
         
            $User_name = $this->post('User_name');
            $Phone_no = $this->post('Phone_no');
            $AddressLine1 = $this->post('AddressLine1');
            $AddressLine2 = $this->post('AddressLine2');
            $City = $this->post('City');

            $data = [
                'User_name' => $User_name,
                'Phone_no' => $Phone_no,
                'AddressLine1' => $AddressLine1,
                'AddressLine2' => $AddressLine2,
                'City' => $City
            ];
            // print_r($data);

            if($this->model->cus_data_update($data, $user_id)){
                $this-> set_flash("updateSuccess","Hey $User_name! Your profile is successfully updated.");
                $this->view('customer/cus_profile');
               
            }else{
                $this->set_flash("updateError", "Something went wrong :( Please try again.");
                $this->view('customer/cus_profile');
            }
            
        }else{
            redirect('customer_controller/myprofile/update');
        }
    }

    public function resetpw_save(){

        $user_id = $this->get_session('user_id');
        
        $this->validation('User_Password', 'Current Password' , 'required');
        $this->validation('New_Password','New Password', 'required|min_len|5');
        $this->validation('Confirm_Password','Confirm Password', 'required|confirm|New_Password');

  
        if($this->run()){
           $current_pw = $this->post('User_Password');
           $new_pw = $this->hash($this->post('New_Password'));
           $result = $this->model->password_update($current_pw,$new_pw,$user_id);
        
            if($result==="Current_pw_wrong"){
                $this->set_flash("currPwWarning", "Opps! That's not your current password.");
                $this->view('customer/cus_profile_pw');
                
            }else if($result==="success"){
                $this->set_flash("pwSucess", "Your password has been changed successfully.");
                $this->view('customer/cus_profile_pw');
            }

        }else{
            $this->view('customer/cus_profile_pw');
        }
    }

    public function deactivate(){

        $user_id = $this->get_session('user_id');
        $user_name = $this->get_session('user_name');
         
        $text = $this->post('bye');
        $new_pw = $this->hash($this->post('New_Password'));
        $result = $this->model->password_update($current_pw,$new_pw,$user_id);
    
        if($text==="GOODBYE"){
            $result = $this->model->deactivate_user($user_id);
            if($result==="DB_error"){
                $this->set_flash("dbError", "Something went wrong :( Please try again.");
                $this->view('customer/cus_profile_delete');
                
            }else if($result==="success"){
                $this->set_flash("deactivateSuccess", "Good bye friend! You will be missed :)");
                redirect("account_controller/signup");
            }
        }else{
            $this->set_flash("wrongGoodBye", "Nice teasing, $user_name :) Stay with us please");
            $this->view('customer/cus_profile_delete');
        }

    }
    

    public function myfavourites(){
        $this->view('customer/cust-favorites');
    }

    public function fav_submit(){
        if(isset($_POST['action'])){
            echo json_encode(array('action'=>$_POST['action'],'food_id'=>$_POST['food_id']));
            //echo json_encode(array('msg'=>'does this work oyeaaass'));
            $food_id = $_POST['food_id'];
            $action = $_POST['action'];
            $user_id = $this->get_session('user_id');
            //echo $user_id;

            switch($action){

                case 'add':
                    $this->model->addtoFavs($user_id, $food_id);
                    //echo "added to favs successfullyyyy";
                    break;
                case 'remove':
                    $this->model->removeFromFavs($user_id, $food_id);
                    // echo "removed from favs successfullyyyy";
                    break;

                default:
                    break;
                    
            }
            

        }
        
        //$this->view('customer/cust-favorites');
    }


    public function myorders(){
        // $this->view('customer/cust-orders');
        // NEED UI
    }

    public function mycart(){
        $this->view('customer/cust-cart');
    }

    public function order(){  
        $this->view('customer/cust-order-info');
    }

    public function payment(){ 
        $this->view('customer/cust-payment');
    }

    public function completeOrder(){  //last button in the payment
        $this->view('customer/cust-order-info');
    }


}