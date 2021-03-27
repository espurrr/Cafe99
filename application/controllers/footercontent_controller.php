<?php
class Footercontent_Controller extends JB_Controller{
    public $model;
    public function __construct(){
        parent::__construct();
       /* if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }*/
        $this->model = $this->model("footercontent_model");
    }

    public function aboutus(){
        $this->view('footercontent/aboutus/aboutus');
    }

    public function contact(){
        $this->view('footercontent/contact/contact');
    }

   /* public function feedback(){
        $this->view('footercontent/feedback/feedback'); 
    }*/

    public function feedback(){
        if($this->run()){

           /* $First_Name=$this->post('First_Name');
            $Last_Name=$this->post('Last_Name');
            $Experience=$this->post('Experience');
            $Fb_Description=$this->post('Fb_Description');*/

            $First_Name=$_POST['First_Name'];
            $Last_Name=$_POST['Last_Name'];
            $Experience=$_POST['Experience'];
            $Fb_Description=$_POST['Fb_Description'];

            $data=[
            'First_Name'=>$First_Name,
            'Last_Name'=>$Last_Name,
            'Experience'=>$Experience,
            'Fb_description'=>$Fb_Description
            ];

            if($this->model->addfeedback($data))
            {
                $this->set_flash("FeedbackSuccess","Feedback send successfully");
                $this->view('footercontent/feedback/feedback');
            }
            else
            {
                $this->set_flash("FeedbackError","Something went wrong :( Please try again later");
                $this->view('footercontent/feedback/feedback');
            }
        }
        else{
        $this->view('footercontent/feedback/feedback');
        }
    }

    public function privacypolicy(){
        $this->view('footercontent/privacypolicy/privacy-policy');
    }

}