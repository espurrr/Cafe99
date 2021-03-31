<?php
    class cashier_model extends Database{

        public function getFooditems(){
            $food_query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability, fooditem.Current_count, fooditem.Unit_Price,
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
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability, fooditem.Current_count, fooditem.Unit_Price,
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

        public function getOrders(){
            $query = 
            "SELECT orders.Order_ID, orders.Order_type, orders.Order_status, orders.Special_notes, order_item.Quantity, 
            fooditem.Food_name 
            FROM orders INNER JOIN order_item ON orders.Order_ID = order_item.Order_id
            INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
            WHERE orders.Order_type = 'dine-in' OR orders.Order_type = 'pick-up'";

            $result =$this->Query($query, $options = []);

            if($this->Count() > 0){
                $orders = $this->AllRecords();
                // print_r($orders);
                if($orders){
                    return ['status'=>'success', 'data'=>$orders];
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
            WHERE announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Cashier'
            ORDER BY announcement.Announcement_date DESC)
            
            UNION

            (SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
            announcement.Content, announcement.To_whom, announcement.RM_User_ID
            FROM announcement
            WHERE announcement.RM_User_ID IS NULL AND (announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Cashier')
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

        public function addtoCart($data_cartitem, $data_cart){

            if($this->Insert("cartitem", $data_cartitem)){
                if($this->Update("cart", $data_cart, ['Cart_id' => $data_cartitem['Cart_id']])){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function removefromCart($data){
            $cartitem_data = [
                'Food_ID' => $data['food_id'],
                'Cart_id' => $data['cart_id'],
                'Quantity' => $data['food_qty']
            ];
    
            $cart_data = [
                'Item_count' => $data['cart_item_count'],
                'Sub_total' =>$data['cart_subtotal']
            ];
           
      
            if($this->Delete("cartitem", $cartitem_data)){
                if($this->Update("cart", $cart_data, ['Cart_id' => $data['cart_id']])){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function get_cart_items($cart_id){
            $query = 
            "SELECT cartitem.CartItem_ID, cartitem.Quantity, cartitem.Price, cartitem.CartItem_total, cartitem.Food_ID,
            fooditem.Food_name, category.Category_name, subcategory.Subcategory_name
            FROM cartitem
            INNER JOIN fooditem ON cartitem.Food_ID = fooditem.Food_ID
            INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON category.Category_ID = subcategory.Category_ID 
            WHERE cartitem.Cart_ID='".$cart_id."' ORDER BY cartitem.CreationDateTime ASC ";
            
            $result =$this->Query($query, $options = []);
                  
                if($this->Count() > 0){
                    $item = $this->AllRecords();
                    // print_r($food);
                    if($item){
                        return ['status'=>'success', 'data'=>$item];
                    }else{
                        return "Cart_items_not_retrieved";
                    }
                }else{
                    return "Empty_cart";
                }
        }

        // public function  getQtywithItemCount_reorder($order_id){
      
        //     $query = 
        //     "SELECT order_item.Quantity AS Quantity , fooditem.Current_count AS Current_count
        //     FROM order_item
        //     INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        //     WHERE order_item.Order_ID='".$order_id."' ";
            
        //     $result =$this->Query($query, $options = []);
    
        //     if($this->Count() > 0){
        //         $order_items = $this->AllRecords();
        //         //print_r($order_items);
        //         return ['status'=>'success', 'data'=>$order_items];
        //     }else{
        //         return "order_items_not_found";
        //     }
        // }

        public function get_cart_data($cart_id){
      
            if($this->Select_Where("cart", ['Cart_id' => $cart_id])){
    
                if($this->Count() > 0){
                    $row = $this->Row();
                    return ['status'=>'success', 'data'=>$row];
                }else{
                    return "cart_not_found";
                }
    
            }
    
        }

        public function  updateFoodItemCount($order_id){
      
            $query = 
            "SELECT fooditem.Food_ID AS Food_ID, order_item.Quantity AS Quantity , fooditem.Current_count AS Current_count
            FROM order_item
            INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
            WHERE order_item.Order_ID='".$order_id."' ";
            
            $result =$this->Query($query, $options = []);
    
            if($this->Count() > 0){
                $order_items = $this->AllRecords();
                //print_r($order_items);
                foreach($order_items as $row){
                    //update each food item count
                    $new_count = $row->Current_count - $row->Quantity;
                    
                    if($new_count==0){
                        $data = ['Current_count'=> $new_count, 'Availability'=>"Unavailable"];
                        if($this->Update("fooditem", $data,['Food_ID' => $row->Food_ID])){
                            $output = "item_count_updated";
                        }else{
                            $output = "item_count_not_updated";
                        }
                    }else{
                        $data = ['Current_count'=> $new_count];
                        if($this->Update("fooditem", $data,['Food_ID' => $row->Food_ID])){
                            $output = "item_count_updated";
                        }else{
                            $output = "item_count_not_updated";
                        }
                    }
                }
            }else{
                $output = "order_items_not_found";
            }
            return $output;
        }

        public function createNewOrder($data, $cart_id){

            $user_id = $data['User_ID'];
    
            $Order_ID = $this->InsertAndReturnID("orders", $data);
            if(!$Order_ID){ //order creation failed
                return false;
            }
            //now order is created
            //cart items should me migrated to order items table
            //get cart items
            // echo "order made";
            if($this->Select_Where("cartitem", ['Cart_id' => $cart_id] )){
                if($this->Count() > 0){
                    $cartitems = $this->AllRecords();
                    //print_r($cartitems);
                    foreach($cartitems as $row){
                        $orderitem_data = [
                            'Order_ID' => $Order_ID,
                            'Food_ID' => $row->Food_ID,
                            'Quantity' => $row->Quantity,
                            'Price' => $row->Price,
                            'Food_Discount' => $row->Discount
                        ];
                        //insert each order item
                        $this->Insert("order_item", $orderitem_data);
                    }
                    // echo "cart items migrated successfully";
                }else{
                    return false;
                }
            }
            //delete cart-items
            $this->Delete("cartitem", ['Cart_id' => $cart_id]);
            // echo "old cart items deleted";
            //if the order is for someone else -> 0
            //the other recipient table should be modified with the order_id
            if($data['Order_is_for_me']==0){
                $this->Update("other_recipient", ['Order_ID' => $Order_ID ],['Cart_ID' => $cart_id]);
            }
            //delete cart
            $this->Delete("cart", ['Cart_id' => $cart_id]);
            // echo "old cart deleted";
    
            //create new cart
            date_default_timezone_set('Asia/Colombo');
            $creation_date_time = date('Y-m-d H:i:s');
            
            $new_cart_data = [
                'User_ID' => $user_id,
                'CreationDateTime' => $creation_date_time
            ];
    
            $new_cart_ID = $this->InsertAndReturnID("cart", $new_cart_data);
            if(!$new_cart_ID){  //new cart is not created
                return false;
            }
            $return_data = [
                'newCartID' => $new_cart_ID,
                'orderID' => $Order_ID
            ];
            return $return_data;
    
        }

        
    }

?>