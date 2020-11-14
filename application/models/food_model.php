<?php

class Food_model extends Database{

    public function sub_cat_menu($data){
       
        //Issa INNERJOIN
        $subcat_name = $data['subcat'];
        $cat_name = $data['cat'];
        $query = 
        "SELECT category.Category_name, subcategory.Subcategory_name, fooditem.Food_ID, fooditem.Food_name, fooditem.Unit_Price FROM fooditem
        INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
        INNER JOIN category ON category.Category_ID = subcategory.Category_ID 
        WHERE subcategory.Subcategory_name='".$subcat_name."' AND category.Category_name='".$cat_name."' ";
        
        $result =$this->Query($query, $options = []);
              
            if($this->Count() > 0){
                $food = $this->AllRecords();
                // print_r($food);
                if($food){
                    return ['status'=>'success', 'data'=>$food];
                }else{
                    return "Food_not_retrieved";
                }
            }else{
                return "Food_not_found";
            }
        
    }

    public function food_item_window($data){
       
        //Issa INNERJOIN
        $subcat_name = $data['subcat'];
        $cat_name = $data['cat'];
        $food_id = $data['id'];
        $query = 
        "SELECT category.Category_name, subcategory.Subcategory_name, fooditem.Food_ID, fooditem.Food_name, fooditem.Unit_Price, fooditem.Description, fooditem.Availability FROM fooditem
        INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
        INNER JOIN category ON category.Category_ID = subcategory.Category_ID 
        WHERE subcategory.Subcategory_name='".$subcat_name."' AND category.Category_name='".$cat_name."' AND fooditem.Food_ID='".$food_id."' LIMIT 1 ";
        
        $result =$this->Query($query, $options = []);
              
            if($this->Count() > 0){
                $item = $this->AllRecords();
                // print_r($food);
                if($item){
                    return ['status'=>'success', 'data'=>$item];
                }else{
                    return "Item_not_retrieved";
                }
            }else{
                return "Item_not_found";
            }
        
    }



}