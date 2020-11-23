<?php
class Footercontent_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
      /*  if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }*/
    }

    public function aboutus(){
        $this->view('footercontent/aboutus/aboutus');
    }

    public function contact(){
        $this->view('footercontent/contact/contact');
    }

    public function feedback(){
        $this->view('footercontent/feedback/feedback');
    }

    public function privacypolicy(){
        $this->view('footercontent/privacypolicy/privacy-policy');
    }

}