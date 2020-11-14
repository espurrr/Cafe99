<?php
class Food_Controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("food_model");
    }

    public function index(){
        $this->view('food-menu');
    }

    public function cake(){
        $this->view('food-item');
    }

    // public function menu(){
    //     $this->view('food-menu');
    // }


    public function menu($cat="",$subcat="",$id=""){

        if(empty($cat) AND empty($subcat) AND empty($id) ){
            $this->view('food-menu');

        }else{
            $cat_b = empty($cat);
            $subcat_b = empty($subcat);
            $id_b = empty($id);

            switch(array($cat_b, $subcat_b, $id_b)){

                case array(false,false,true):
                    $food_data['cat'] = $cat;
                    $food_data['subcat'] = $subcat;
                    $result = $this->model->sub_cat_menu($food_data);
                    // echo"rk";
                    if($result === "Food_not_retrieved"){
                        $this->set_flash("databaseError", "Sorry, cannot show our food at the moment. Please try again later.");
                        echo"dberror";
                    }else if($result === "Food_not_found"){
                        $this->set_flash("nofoodError", "Sorry, there are no $subcat available for now.");
                        echo"noffood";
                    }else if($result['status'] === "success"){
                        $this->view('fd',$result['data']);
                    }
                    break;

                case array(false,false,false):
                    $food_data['cat'] = $cat;
                    $food_data['subcat'] = $subcat;
                    $food_data['id'] = $id;
                    $result = $this->model->food_item_window($food_data);
                    // echo"inside";
                    if($result === "Item_not_retrieved"){
                        $this->set_flash("databaseError", "Sorry, cannot show our food at the moment. Please try again later.");
                        echo"dberror";
                    }else if($result === "Food_not_found"){
                        $this->set_flash("nofoodItemError", "Sorry, there are no such dish available.");
                        echo"noffood";
                    }else if($result['status'] === "success"){
                        $this->view('food-item',$result['data']);
                    }
                    break;

                default:
                    $this->view('home');
                    break;
                    
            }

        }
        
    }
    

}
?>