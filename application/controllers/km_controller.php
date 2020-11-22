<?php
class KM_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
        $this->model = $this->model("km_model");

        if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="kitchen_manager"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
    }

    public function index(){
        // $this->view('kitchenmanager/orders/orders');
        $this->view('customer/cust-cart');
    }
    
    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }

    public function orders(){
        $result =  $this->model->getOrders();

        if($result === "Order_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show orders at the moment. Please try again later.");
            //echo"dberror";
        }else if($result === "Order_not_found"){
            $this->set_flash("noordersError", "Sorry, cannot show orders at the moment. Please try again later.");
            //echo"nofood";
        }else if($result['status'] === "success"){
            $this->view('kitchenmanager/orders/orders',$result['data']);
            //print_r($result['data']);
        }
    }
    public function foodmenu(){
        $result =  $this->model->getFooditems();

        if($result === "Food_not_retrieved"){
            $this->set_flash("databaseError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"dberror";
        }else if($result === "Food_not_found"){
            $this->set_flash("nofoodError", "Sorry, cannot show fooditems at the moment. Please try again later.");
            //echo"nofood";
        }else if($result['status'] === "success"){
            $this->view('kitchenmanager/foodmenu/foodmenu',$result['data']);
        }

    }

    public function newsfeed(){
        $this->view('kitchenmanager/newsfeed/newsfeed');
    }

    public function updateAvailability(){
        if (isset($_POST['av'])){
            $food_id = (int)$_POST['av'];
            $data = ['Availability'=>'Available'];

            if($this->model->updateAvailability($data , $food_id)){
                $this-> set_flash("updateSuccess","Food item updated successfully");
            }
            else{
                $this-> set_flash("updateUnsuccess","Food item wasn't updated successfully");
            }
            redirect('km_controller/foodmenu');
        }
        if (isset($_POST['unav'])){
            $food_id = (int)$_POST['unav'];
            $data = ['Availability'=>'Unavailable'];

            if($this->model->updateAvailability($data , $food_id)){
                $this-> set_flash("updateSuccess","Food item updated successfully");
            }
            else{
                $this-> set_flash("updateUnsuccess","Food item wasn't updated successfully");

            }
            redirect('km_controller/foodmenu');
        }
        

    }
}
?>