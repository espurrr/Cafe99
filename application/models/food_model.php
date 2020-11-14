<?php

class Food_model extends Database{

    public function sub_cat_menu($data){
       
        //Issa INNERJOIN
        $subcat_name = $data['subcat'];
        $query = 
        "SELECT category.Category_name, subcategory.Subcategory_name, fooditem.Food_ID, fooditem.Food_name, fooditem.Unit_Price FROM fooditem
        INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
        INNER JOIN category ON category.Category_ID = subcategory.Category_ID 
        WHERE subcategory.Subcategory_name='".$subcat_name."'";
        
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


}