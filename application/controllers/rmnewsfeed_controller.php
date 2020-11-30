<?php

class rmnewsfeed_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("rmnewsfeed_model");
    }

    public function create(){
        
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
                'To_whom'=> $Ann_towhom,                
                // 'User_ID'=> $Ann_user,
            ];
            
            if($this->model->addNews($data)){
                $this->set_flash("fooditemSuccess", "News feed added successfully");
                $this->view('restaurantmanager/RMnewsfeed');
                

            }else{
                $this->set_flash("fooditemError", "Something went wrong :( Please try again later.)");
                $this->view('restaurantmanager/create');

            }
        }else{
            $this->view('restaurantmanager/create');

        }

    }

}
?>