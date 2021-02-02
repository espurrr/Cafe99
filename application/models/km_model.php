<?php
    class Km_model extends Database{

        public function getFooditems(){
            $food_query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability, fooditem.Current_count,
            subcategory.Subcategory_ID, subcategory.Subcategory_name, category.Category_ID, category.Category_name 
            FROM fooditem INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON subcategory.Category_ID = category.Category_ID";

            $subcat_query = "SELECT subcategory.Subcategory_name, category.Category_name from subcategory INNER JOIN category
            ON subcategory.Category_ID = category.Category_ID";

            $category_query = "SELECT category.Category_name from category";
            $category_result = $this->Query($category_query, $options = []);
            if($this->Count() > 0){
                $category = $this->AllRecords();
                if($category){
                    $subcat_result =$this->Query($subcat_query, $options = []);
                    if($this->Count() > 0){
                        $subcat = $this->AllRecords();
                        // print_r($food);
                        if($subcat){
                            $food_result =$this->Query($food_query, $options = []);
                            if($this->Count() > 0){
                                $food = $this->AllRecords();
                                if($food){
                                    return ['status'=>'success', 'data'=>['category'=>$category, 'subcat'=>$subcat, 'food'=>$food]];
                                }else{
                                    return "Food_not_retrieved";
                                }
                            }else{
                                return "Food_not_found";
                            }
                        }else{
                            return "Subcat_not_retrieved";
                        }
                    }else{
                        return "Subcat_not_found";
                    }
                }else{
                    return "Category_not_retrieved";
                }

            }else{
                return "Category_not_found";

            }
            
        }
        
        public function getSearchFooditems($foodname){
            $food_query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability, fooditem.Current_count,
            subcategory.Subcategory_ID, subcategory.Subcategory_name, category.Category_ID, category.Category_name 
            FROM fooditem 
            INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON subcategory.Category_ID = category.Category_ID 
            WHERE fooditem.Food_name LIKE '%".$foodname."%' OR subcategory.Subcategory_name LIKE '%".$foodname."%'";

            $category_query = "SELECT category.Category_name from category";


            $result = $this->Query($category_query, $options = []);
            if($this->Count() > 0){
                $category = $this->AllRecords();
                if($category){
                    $result = $this->Query($food_query, $options = []);
                    if($this->Count() > 0){
                        $food = $this->AllRecords();
                        // print_r($food);
                        if($food){
                            return ['status'=>'success', 'data'=>['category'=>$category, 'food'=>$food]];
                        }else{
                            return "Food_not_retrieved";
                        }
                    }else{
                        return "Food_not_found";
                    }
                }else{
                    return "Category_not_retrieved";
                }
            }else{
                return "Category_not_found";

            }
            
        }

        public function updateAvailability($data, $food_id){
            if($this->Update("fooditem", $data, ['Food_ID' => $food_id])){
                return true;
            }else{
                return false;
            }
        }
        public function updateCurrentCount($data, $food_id){
            if($this->Update("fooditem", $data, ['Food_ID' => $food_id])){
                return true;
            }else{
                return false;
            }
        }

        public function getOrders(){
            // $query = 
            // "SELECT orders.Order_ID, orders.Order_type, orders.Order_status, orders.Special_notes, cartitem.Quantity, fooditem.Food_name 
            // FROM orders INNER JOIN cartitem ON orders.Cart_ID = cartitem.Cart_id
            // INNER JOIN fooditem ON cartitem.Food_ID = fooditem.Food_ID";
            $query = 
            "SELECT orders.Order_ID, orders.Order_type, orders.Order_status, orders.Special_notes, fooditem.Food_name 
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
        public function getAnnouncement(){
            $query = "SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
            announcement.Content, announcement.To_whom, user.User_name FROM announcement INNER JOIN user ON announcement.User_ID = user.User_ID
            WHERE announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Kitchen managers' ORDER BY announcement.Announcement_date DESC";

            $result = $this->Query($query, $options = []);
            if($this->Count() > 0){
                $announcement = $this->AllRecords();
                //print_r($announcement);
                if($announcement){
                    return ['status'=>'success', 'data'=>$announcement];
                }else{
                    return "Announcement_not_retrieved";
                }
            }else{
                return "Announcement_not_found";
            }

        }

        public function updateOrderStatus($data, $order_id){
            if($this->Update("orders", $data, ['Order_ID' => $order_id])){
                return true;
            }else{
                return false;
            }
        }
    }

?>