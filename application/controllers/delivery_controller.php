<?php
class Delivery_Controller extends JB_Controller{

    public function __construct(){
        parent::__construct();
       if(!$this->get_session('user_id')){
            redirect("account_controller/login");
        }
        if($this->get_session('role')!="delivery_person"){
            $this->destroy_session();
            redirect("account_controller/login");
        }
        $this->model = $this->model("dp_model");
    }

  /*  public function index(){
        $this->view('deliveryperson/neworders');
    }*/

    //read new orders
    public function index($id="Order_ID"){
        if(empty($id)){
            $this->view('deliveryperson/neworders');
    
        }else{
            $order_data['id'] = $id;
            $result=$this->model->display_neworders($order_data);
            $this->view('deliveryperson/neworders',$result['data']);
    }
    }

 /*   public function neworders(){
        $this->view('deliveryperson/neworders');
    }*/

    public function ondelivery($id="Order_ID"){
      //  $this->view('deliveryperson/ondelivery');
        if(empty($id)){
            $this->view('deliveryperson/ondelivery');  
        }else{
            $order_data['id'] = $id;
            $result=$this->model->display_ondelivery($order_data);
            $this->view('deliveryperson/ondelivery',$result['data']);
        }
    }

    public function dispatched($id="Order_ID"){
      //  $this->view('deliveryperson/dispatched');
      if(empty($id)){
          $this->view('deliveryperson/dispatched');
      }else{
        $order_data['id'] = $id;
        $result=$this->model->display_dispatched($order_data);
        $this->view('deliveryperson/dispatched',$result['data']);
      }

    }

    public function newsfeed(){
        
            $result = $this->model->getAnnouncement();
            //$this->view('kitchenmanager/newsfeed/newsfeed');
            if($result === "Announcement_not_retrieved"){
                $this->set_flash("databaseError", "Sorry, cannot show Announcement at the moment. Please try again later.");
                //echo"dberror";
            }else if($result === "Announcement_not_found"){
                $this->set_flash("noAnnouncementError", "Sorry, cannot show Announcement at the moment. Please try again later.");
                //echo"noAnnouncement";
            }else if($result['status'] === "success"){
                $this->view('deliveryperson/dp',$result['data']);
            }
        
    }

    //update delivery_new as delivery_ondelivery
    public function updateOrderStatusNew(){
       $order_id=$_POST['Order_ID'];
      // $order_id=$this->post('Order_ID');

        $data=['Order_status'=>'delivery_ondelivery'];
        if($this->model->updateOrderStatusNew($data , $order_id)){
            $this-> set_flash("orderUpdateSuccess","Order item updated successfully");
        }
        else{
            $this-> set_flash("orderUpdateUnsuccess","Order item wasn't updated successfully");
        }
        redirect("delivery_controller/index");
    }

    //update delivery_ondelivery as delivery_dispatched
    public function updateOrderStatusOndelivery(){
        $order_id=$_POST['Order_ID'];
       // $order_id=$this->post('Order_ID');

        $data=['Order_status'=>'delivery_disapatched'];
        if($this->model->updateOrderStatusOndelivery($data , $order_id)){
            $this-> set_flash("orderUpdateSuccess","Order item updated successfully");
        }
        else{
            $this-> set_flash("orderUpdateUnsuccess","Order item wasn't updated successfully");
        }
        redirect("delivery_controller/ondelivery");
    }
 
    //delete order from delivery_dispatched list
    public function deleteOrder($order_id){
    $result=$this->model->deleteOrder($order_id);
    redirect('deliverycontroller/dispatched');
    }

    public function logout(){
        $this->destroy_session();
        $this->view('login');
    }
   
}
?>