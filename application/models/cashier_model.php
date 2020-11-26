<?php
    class cashier_model extends Database{

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

        public function getOrders(){
            $query = 
            "SELECT orders.Order_ID, orders.Order_type, orders.Order_status, orders.Special_notes, cartitem.Quantity, fooditem.Food_name 
            FROM orders INNER JOIN cartitem ON orders.Cart_ID = cartitem.Cart_id
            INNER JOIN fooditem ON cartitem.Food_ID = fooditem.Food_ID";

            $result =$this->Query($query, $options = []);

            if($this->Count() > 0){
                $food = $this->AllRecords();
                //print_r($food);
                if($food){
                    return ['status'=>'success', 'data'=>$food];
                }else{
                    return "Order_not_retrieved";
                }
            }else{
                return "Order_not_found";
            }
        }
    }

?>