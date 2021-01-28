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
        $this->model = $this->model("rm_model");
    }

    public function index(){
        $this->view('restaurantmanager/analytics/analyticsnew');
    }

  
//create newsfeed
    public function create(){
        
        if($this->run()){
            // $Ann_id = $this->post('Ann_id');
            //$Ann_title = $this->post('Ann_title');
            $Ann_title=$_POST['Ann_title'];
            //$Ann_date = $this->post('Ann_date');
            $Ann_date=$_POST['Ann_date'];
            //$Ann_time = $this->post('Ann_time');
            $Ann_time=$_POST['Ann_time'];
            //$content = $this->post('content');
            $content=$_POST['content'];
            //$Ann_towhom = $this->post('Ann_towhom');
            $Ann_towhom=$_POST['Ann_towhom'];
            // $Ann_user = $this->post('Ann_user');
             // will replace with the ID later
            
             
            $data = [
                // 'Announcement_id'=> $Ann_id,
                'Announcement_title'=> $Ann_title,
                'Announcement_date'=> $Ann_date,
                'Announcement_time'=> $Ann_time,
                'Content'=> $content,
                'To_whom'=> $Ann_towhom               
                // 'User_ID'=> $Ann_user,
            ];
            
            if($this->model->addNews($data)){
                $this->set_flash("newsfeedSuccess", "News feed added successfully");
                $this->view('restaurantmanager/RMnewsfeed');
                

            }else{
                $this->set_flash("newsfeedError", "Something went wrong :( Please try again later.)");
                $this->view('restaurantmanager/create');

            }
        }else{
            $this->view('restaurantmanager/create');

        }

    }
    
//read newsfeed
    public function newsfeed(){
        $result = $this->model->getAnnouncement();
       
        if($result === "Announcement_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show Announcement at the moment. Please try again later.");
            //echo"dberror";
        }else if($result === "Announcement_not_found"){
            $this->set_flash("noAnnouncementError", "Sorry, cannot show Announcement at the moment. Please try again later.");
            //echo"noAnnouncement";
        }else if($result['status'] === "success"){
            $this->view('restaurantmanager/Rmnewsfeed',$result['data']);
        }
    }

//update newsfeed
    public function newsfeed_update_values(){
   
        $newsfeed_id=$this->get('Announcement_id');
      // echo $newsfeed_id;
           $result = $this->model->newsfeed_data($newsfeed_id);
      // print_r($result);
           $this->view('restaurantmanager/edit',$result['data']);
    }

   public function newsfeed_update_save(){

    $newsfeed_id=$this->get('Announcement_id');

    if($this->run()){
        // $Ann_id = $this->post('Ann_id');
        $Ann_title = $this->post('Ann_title');
        $Ann_date = $this->post('Ann_date');
        $Ann_time = $this->post('Ann_time');
        $content = $this->post('content');
        $Ann_towhom = $this->post('Ann_towhom');
        // $Ann_user = $this->post('Ann_user');
         // will replace with the ID later
        
        $data = [
            // 'Announcement_id'=> $Ann_id,
            'Announcement_title'=> $Ann_title,
            'Announcement_date'=> $Ann_date,
            'Announcement_time'=> $Ann_time,
            'Content'=> $content,
            'To_whom'=> $Ann_towhom               
            // 'User_ID'=> $Ann_user,
        ];

        
        if($this->model->newsfeed_data_update($data,  $newsfeed_id)){
            $this-> set_flash("updateSuccess","Announcement is successfully updated.");
            $this->view('restaurantmanager/edit');
           
        }else{
            $this->set_flash("updateError", "Something went wrong :( Please try again.");
            $this->view('restaurantmanager/edit');
        }
        
    }else{
 //   redirect('rm_controller/newsfeed');
    }

   }

 //delete newsfeed  
    public function delete_newsfeed(){
    $newsfeed_id=$this->get('Announcement_id');
  // echo $newsfeed_id;
    $result=$this->model->deletenewsfeed($newsfeed_id);
    redirect('rm_controller/newsfeed');
    }

 
//create users   
    public function savedata(){
        /*   $this->view('restaurantmanager/users/create');*/
        
           $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
           $this->validation('Email_address','Email address', 'unique|user|required');
           $this->validation('Phone_no','Phone no', 'unique|user|required|len|10');
           $this->validation('User_Password','User password', 'required|min_len|8');
   
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
                   'User_role'=>$User_role,
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
   
   
   //read users
   public function users($id="User_ID"){
       if(empty($id)){
           $this->view('restaurantmanager/users/RM');
   
       }else{
           $user_data['id'] = $id;
           $result=$this->model->display_users($user_data);
           $this->view('restaurantmanager/users/RM',$result['data']);
   }
   }
   
   //update users
   public function user_update_values(){
   
    //   $id = $this->get_session('User_ID');
    $id=$this->get('User_ID');
   
       $result = $this->model->user_data( $id);
  // print_r($result);
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
   //   $id = $this->get_session('user_id');
    $id=$this->get('User_ID'); 
//$id=$_GET['User_ID'];
    //echo $id;
           $this->validation('User_name', 'Name' , 'required|not_int|max_len|50');
        //   $this->validation('Email_address','Email address', 'unique|user|required');
           $this->validation('Phone_no','Phone no', 'user|required|len|10');
           $this->validation('User_Password','User password', 'required|min_len|5');
   
       if(!($this->run())){
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
               'User_role'=>$User_role
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
   
   //delete users
   public function delete_user_data(){
   
     //  $id = $this->get_session('user_id');
     $id=$this->get('User_ID');
      // echo $id;
       $result = $this->model->deleteuser( $id );
   redirect('rm_controller/users');
    //   $this->view('restaurantmanager/users/RM');
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

  
//create fooditem
    public function createFoodItem(){
        // echo $_POST['Food_name'];
        // echo $_POST['Description'];
        // echo $_POST['Unit_Price'];
        // echo $_POST['Category_name'];
        // echo $_POST['Subcategory_ID'];
        // echo $_POST['Availability'];
        $this->validation('Food_name', 'Food name' , 'required|not_int|unique|fooditem|max_len|30');
        $this->validation('Description', 'Description' , 'required');
        $this->validation('Unit_Price', 'Unit price' , 'required|int');
        $this->validation('Category_name', 'Category' , 'required');
        $this->validation('Subcategory_ID', 'Subcategory' , 'required');
        $this->validation('Availability', 'Availability' , 'required');

        if($this->run()){
            $Food_name = $this->post('Food_name');
            $Description = $this->post('Description');
            $Unit_Price = $this->post('Unit_Price');
            $Availability = $this->post('Availability');
            $Subcategory_ID = $this->post('Subcategory_ID'); // will replace with the ID later
            
            $data = [
                'Food_name'=> $Food_name,
                'Description'=> $Description,
                'Unit_Price'=> $Unit_Price,
                'Availability'=> $Availability,
                'Subcategory_ID'=> $Subcategory_ID
            ];
            
            if($this->model->addFoodItem($data)){
                $this->set_flash("fooditemSuccess", "Fooditem added successfully");
                $this->view('restaurantmanager/fooditem/create');

            }else{
                $this->set_flash("fooditemError", "Something went wrong :( Please try again later.");
                $this->view('restaurantmanager/fooditem/create');

            }
        }else{
            $this->view('restaurantmanager/fooditem/create');

        }

    }

    //read fooditem
    public function fooditem($id="Food_ID"){
        if(empty($id)){
            $this->view('restaurantmanager/fooditem/RM');
    
        }else{
            $fooditem_data['id'] = $id;
            $result=$this->model->display_fooditem($fooditem_data);
            $this->view('restaurantmanager/fooditem/RM',$result['data']);
    }
    }

    //update fooditem
    public function fooditem_update_values(){
   
        $food_id=$this->get('Food_ID');
      // echo $food_id;
           $result = $this->model->fooditem_data($food_id);
      // print_r($result);
           $this->view('restaurantmanager/fooditem/edit',$result['data']);
    }

    public function fooditem_update_save(){

        $food_id=$this->get('Food_ID');

        $this->validation('Food_name', 'Food name' , 'required|not_int|unique|fooditem|max_len|30');
        $this->validation('Description', 'Description' , 'required');
        $this->validation('Unit_Price', 'Unit price' , 'required|int');
        $this->validation('Category_name', 'Category' , 'required');
        $this->validation('Subcategory_ID', 'Subcategory' , 'required');
        $this->validation('Availability', 'Availability' , 'required');

        if($this->run()){
            $Food_name = $this->post('Food_name');
            $Description = $this->post('Description');
            $Unit_Price = $this->post('Unit_Price');
            $Availability = $this->post('Availability');
            $Subcategory_ID = $this->post('Subcategory_ID'); // will replace with the ID later
            
            $data = [
                'Food_name'=> $Food_name,
                'Description'=> $Description,
                'Unit_Price'=> $Unit_Price,
                'Availability'=> $Availability,
                'Subcategory_ID'=> $Subcategory_ID
            ];
            
       
            if($this->model->fooditem_data_update($data,  $food_id)){
                $this-> set_flash("updateSuccess","Fooditem is successfully updated.");
                $this->view('restaurantmanager/fooditem/edit');
               
            }else{
                $this->set_flash("updateError", "Something went wrong :( Please try again.");
                $this->view('restaurantmanager/fooditem/edit');
            }
            
        }else{
     //   redirect('rm_controller/fooditem');
        }
    }

   // delete fooditem
    public function delete_fooditem(){
    $food_id=$this->get('Food_ID');
   echo $food_id;
    $result=$this->model->deletefooditem($food_id);
    redirect('rm_controller/fooditem');
    }

  
    //create subcategory
    public function createSubcategory(){
        $this->validation('Subcategory_name', 'Subcategory name' , 'required');
      //  $this->validation('Category_ID','Category','required');
    
        if($this->run()){
            $Subcategory_name = $this->post('Subcategory_name');
        //    $Category_ID=$this->post('Category_ID');//will replace the ID later because it is FK
    
            $data=['Subcategory_name'=>$Subcategory_name,
          //  'Category_ID'=>$Category_ID
        ];
    
        if($this->model->addSubcategory($data)){
            $this->set_flash("subcategorySuccess", "Subcategory added successfully");
            $this->view('restaurantmanager/subcategory/create');
    
        }else{
            $this->set_flash("subcategoryError", "Something went wrong :( Please try again later.");
            $this->view('restaurantmanager/subcategory/create');
    
        }
    
        }else{
            $this->view('restaurantmanager/subcategory/create');
    
        }
    }

    //read subcategory
    public function subcategory($id="Subcategory_ID"){
        if(empty($id)){
            $this->view('restaurantmanager/category/RM');
    
        }else{
            $subcategory_data['id'] = $id;
            $result=$this->model->display_subcategory($subcategory_data);
            $this->view('restaurantmanager/subcategory/RM',$result['data']);
    }
    }

    //update subcategory
    public function subcategory_update_values(){
   
        $subcat_id=$this->get('Subcategory_ID');
     //  echo $subcat_id;
           $result = $this->model->subcategory_data($subcat_id);
      // print_r($result);
           $this->view('restaurantmanager/subcategory/edit',$result['data']);
    }

    public function subcategory_update_save(){
        $subcat_id=$this->get('Subcategory_ID');

        $this->validation('Subcategory_name', 'Subcategory name' , 'required');
        //  $this->validation('Category_ID','Category','required');
      
          if($this->run()){
              $Subcategory_name = $this->post('Subcategory_name');
          //    $Category_ID=$this->post('Category_ID');//will replace the ID later because it is FK
      
              $data=['Subcategory_name'=>$Subcategory_name,
            //  'Category_ID'=>$Category_ID
          ];

          if($this->model->subcategory_data_update($data,  $subcat_id)){
            $this-> set_flash("updateSuccess","Subcategory is successfully updated.");
            $this->view('restaurantmanager/subcategory/edit');
           
        }else{
            $this->set_flash("updateError", "Something went wrong :( Please try again.");
            $this->view('restaurantmanager/subcategory/edit');
        }
        
    }else{
 //   redirect('rm_controller/subcategory');
    }
    }

    //delete subcategory
    public function delete_subcategory(){
        $subcat_id=$this->get('Subcategory_ID');
        //  echo $subcat_id;
          $result=$this->model->deletesubcategory($subcat_id);
          redirect('rm_controller/subcategory');
    }

  
//create category
    public function createCategory(){
        $this->validation('Category_name', 'Category name' , 'required');
      
    
        if($this->run()){
            $Subcategory_name = $this->post('Category_name');
        
            $data=['Category_name'=>$Category_name,
         
        ];
    
        if($this->model->addCategory($data)){
            $this->set_flash("categorySuccess", "Category added successfully");
            $this->view('restaurantmanager/category/create');
    
        }else{
            $this->set_flash("categoryError", "Something went wrong :( Please try again later.");
            $this->view('restaurantmanager/category/create');
    
        }
    
        }else{
            $this->view('restaurantmanager/category/create');
    
        }
    }

    //read category
    public function category($id="Category_ID"){
        if(empty($id)){
            $this->view('restaurantmanager/category/RM');
    
        }else{
            $category_data['id'] = $id;
            $result=$this->model->display_category($category_data);
            $this->view('restaurantmanager/category/RM',$result['data']);
    }
    }

    //update category
    public function category_update_values(){
   
        $cat_id=$this->get('Category_ID');
       // echo $cat_id;
           $result = $this->model->category_data($cat_id);
      // print_r($result);
           $this->view('restaurantmanager/category/edit',$result['data']);
    }

    public function category_update_save(){
        $cat_id=$this->get('Category_ID');

        $this->validation('Category_name', 'Category name' , 'required');
      
    
        if($this->run()){
            $Subcategory_name = $this->post('Category_name');
        
            $data=['Category_name'=>$Category_name,
         
        ];

        if($this->model->category_data_update($data,  $cat_id)){
            $this-> set_flash("updateSuccess","Category is successfully updated.");
            $this->view('restaurantmanager/category/edit');
           
        }else{
            $this->set_flash("updateError", "Something went wrong :( Please try again.");
            $this->view('restaurantmanager/category/edit');
        }
        
    }else{
 //   redirect('rm_controller/category');
    }
    }

//delete category
    public function delete_category(){
        $cat_id=$this->get('Category_ID');
        //  echo $cat_id;
          $result=$this->model->deletecategory($cat_id);
          redirect('rm_controller/category');  
    }

 

   public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
   
}
?>