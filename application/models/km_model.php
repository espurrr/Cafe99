<?php
    class Km_model extends Database{

        public function getFooditems(){
            $query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability,
            subcategory.Subcategory_ID, subcategory.Subcategory_name, category.Category_ID, category.Category_name 
            FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON subcategory.Category_ID = category.Category_ID";

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

        public function updateAvailability($data, $food_id){
            if($this->Update("fooditem", $data, ['Food_ID' => $food_id])){
                return true;
            }else{
                return false;
            }
        }
    }

?>