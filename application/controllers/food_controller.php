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
            $food_names = $this->model->get_food_names();
            $this->view('food-menu', ['food_names'=>$food_names['data']]);

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
                    $food_names = $this->model->get_food_names();

                    if($result === "Food_not_retrieved"){
                        $this->set_flash("databaseError", "Sorry, cannot show our food at the moment. Please try again later.");
                        $this->view('food-menu');
                    }else if($result === "Food_not_found"){
                        $this->set_flash("nofoodError", "Sorry, there are no $subcat available for now.");
                        $this->view('food-menu');
                    }else if($result['status'] === "success"){
                        $this->view('food-menu',['food_names'=>$food_names['data'], 'data'=>$result['data']]);
                    }
                    break;

                case array(false,false,false):
                    $food_data['cat'] = $cat;
                    $food_data['subcat'] = $subcat;
                    $food_data['id'] = $id;
                    $result = $this->model->food_item_window($food_data);
                    // echo"inside";
                    $food_names = $this->model->get_food_names();

                    if($result === "Item_not_retrieved"){
                        $this->set_flash("databaseError", "Sorry, cannot show our food at the moment. Please try again later.");
                        $this->view('food-item');
                    }else if($result === "Food_not_found"){
                        $this->set_flash("nofoodItemError", "Sorry, there are no such dish available.");
                        $this->view('food-item');
                    }else if($result['status'] === "success"){
                        $this->view('food-item', ['food_names'=>$food_names['data'], 'data'=>$result['data']]);
                    }
                    break;

                default:
                    $this->view('home');
                    break;
                    
            }

        }
        
    }

    public function search_food(){
        $food_name = $_POST['search_food'];

        $food = $this->model->get_food_item($food_name);
        // print_r($food['data']);

        // When given food item is searched
        if($food['status'] === "success"){
            $this->menu($food['data'][0]->Category_name, $food['data'][0]->Subcategory_name, $food['data'][0]->Food_ID);
        }else{
            $subcat = $this->model->get_subcategory($food_name);

            // No fooditem , Subcategory exists
            if($subcat['status'] === "success"){
                $this->menu($subcat['data'][0]->Category_name, $subcat['data'][0]->Subcategory_name);
            }else{
                $this->set_flash("nofoodItemError", "Sorry, there are no such dish available.");
                $this->menu();
            }
        }
    }
    

}
?>