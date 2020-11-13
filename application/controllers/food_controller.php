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

                    $this->view('food-menu',$food_data);
                    break;
                case array(false,false,false):
                    $food_data['cat'] = $cat;
                    $food_data['subcat'] = $subcat;
                    $food_data['id'] = $id;
                    $this->view('food-menu',$food_data);
                    break;
                default:
                    $this->view('home');
                    break;
            }

        }
        
    }
    

}
?>