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
        "SELECT category.Category_name, subcategory.Subcategory_name, fooditem.Food_ID, fooditem.Food_name, fooditem.Unit_Price, fooditem.Description, fooditem.Availability, fooditem.Current_count 
        FROM fooditem
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

    public function is_favorite($food_id){
        $query = 
        "SELECT * FROM favourites WHERE food_id = ".$food_id." AND user_id = ".$_SESSION['user_id'];
        // echo 'food_called';
        $result =$this->Query($query, $options = []);
        if($this->Count() > 0) return True;
        else {
            // echo $food_id;
            return False;
        }
    }

    public function get_food_names(){
        $query = "SELECT Food_name FROM fooditem";
        $result = $this->Query($query, $options = []);

        if($this->Count() > 0){
            $food_names = $this->AllRecords();
            // print_r($food_names);
            if($food_names){
                return ['status'=>'success', 'data'=>$food_names];
            }else{
                return "Food_name_not_retrieved";
            }
        }else{
            return "Food_name_not_found";
        }

    }

    public function get_food_item($food_name){
        $query = 
        "SELECT fooditem.Food_ID, subcategory.Subcategory_name, category.Category_name
        FROM fooditem 
        INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
        INNER JOIN category ON subcategory.Category_ID =  category.Category_ID
        WHERE fooditem.Food_name = '".$food_name."'";

        $result = $this->Query($query, $options = []);

        if($this->Count() > 0){
            $food_item = $this->AllRecords();
            // print_r($food_item);
            if($food_item){
                return ['status'=>'success', 'data'=>$food_item];
            }else{
                return "Food_not_retrieved";
            }
        }else{
            return "Food_not_found";
        }
    }

    public function get_subcategory($food_name){
        $query = 
        "SELECT subcategory.Subcategory_name, category.Category_name
        FROM subcategory
        INNER JOIN category ON subcategory.Category_ID =  category.Category_ID
        WHERE subcategory.Subcategory_name LIKE '%".$food_name."%'";

        $result = $this->Query($query, $options = []);

        if($this->Count() > 0){
            $subcat = $this->AllRecords();
            // print_r($food_item);
            if($subcat){
                return ['status'=>'success', 'data'=>$subcat];
            }else{
                return "Subcat_not_retrieved";
            }
        }else{
            return "Subcat_not_found";
        }
    }

}