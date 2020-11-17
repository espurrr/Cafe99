<?php

class rmfooditem_controller extends JB_Controller{

    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->model("rmfooditem_model");
    }

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

}
?>