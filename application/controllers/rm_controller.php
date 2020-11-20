<?php
class RM_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
       if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="restaurant_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
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

    public function users(){
        $this->view('restaurantmanager/users/RM');
    }
    
    public function userscreate(){
        $this->view('restaurantmanager/users/create');
    }

    public function usersedit(){
        $this->view('restaurantmanager/users/edit');
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