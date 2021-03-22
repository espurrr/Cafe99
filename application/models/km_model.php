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
            $query = 
            "SELECT orders.Order_ID, orders.Order_type, orders.Order_status, orders.Special_notes, order_item.Quantity, fooditem.Food_name 
            FROM orders INNER JOIN order_item ON orders.Order_ID = order_item.Order_id
            INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID";
            
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
            $query = 
            "(SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
            announcement.Content, announcement.To_whom, user.User_name 
            FROM announcement INNER JOIN user ON announcement.RM_User_ID = user.User_ID
            WHERE announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Kitchen managers'
            ORDER BY announcement.Announcement_date DESC)
            
            UNION

            (SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
            announcement.Content, announcement.To_whom, announcement.RM_User_ID
            FROM announcement
            WHERE announcement.RM_User_ID IS NULL AND (announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Kitchen managers')
            ORDER BY announcement.Announcement_date DESC)";

            $result = $this->Query($query, $options = []);
            if($this->Count() > 0){
                $announcement = $this->AllRecords();
                // print_r($announcement);
                if($announcement){
                    $announcement = array_reverse($announcement, true);
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

        public function getOrderType($order_id){
            $query = "SELECT orders.Order_type FROM orders WHERE orders.Order_ID =".$order_id;

            $result = $this->Query($query, $options = []);
            if($this->Count() > 0){
                $order_type = $this->AllRecords();
                if($order_type){
                    if($this->Count() > 0){
                        // print_r($order_type);
                        return ['status'=>'success', 'data'=>$order_type];
                    }    
                }else{
                    return "Order_type_not_retrieved";
                }
            }else{
                return "Order_type_not_found";

            }
        }
    }

?>