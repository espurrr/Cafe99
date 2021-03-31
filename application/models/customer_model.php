<?php

class Customer_model extends Database{


    public function cus_data($user_id){

        if($this->Select_Where("user", ['User_id' => $user_id])){
            if($this->Count() > 0){
                $row = $this->Row();
                if($row){
                    return ['status'=>'success', 'data'=>$row];
                }else{
                    return "Data_not_retrieved";
                }
            }else{
                return "User_not_found";
            }

        }

    }

    public function getEmail($user_id){

        if($this->Select_Where("user", ['User_id' => $user_id])){
            if($this->Count() > 0){
                $row = $this->Row();
                return $row->Email_address;
            }else{
                return false;
            }

        }

    }

    public function cus_data_update($data, $user_id){
  
        if($this->Update("user", $data,['User_ID' => $user_id])){
            return true;
        }else{
            return false;
        }

    }

    public function password_update($current_pw, $new_pw, $user_id){
        
        if($this->Select_Where("user", ['User_id' => $user_id])){
            if($this->Count() > 0){
                $row = $this->Row();
                $dbPw = $row->User_Password;
                if(password_verify($current_pw,$dbPw)){
                    if($this->Update("user", ['User_Password' => $new_pw], ['User_ID' => $user_id])){
                        return "success";
                    }                    
                }else{
                    return "Current_pw_wrong";
                }
            }
        }
    }

    public function deactivate_user($user_id){
        $data = [
            'User_Password' => "",
            'User_name' => "",
            'Phone_no' => NULL,
            'Token' => "",
            'User_status' =>"deactivated",
            'Email_address' => ""
        ];
        if($this->Update("user", $data,['User_ID' => $user_id])){
            return true;
        }else{
            return false;
        }
    }

    public function addtoFavs($user_id, $food_id){
        $data = [
            'Food_ID' => $food_id,
            'User_ID' => $user_id
        ];
        if($this->Insert("favourites", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function removeFromFavs($user_id, $food_id){
        $data = [
            'Food_ID' => $food_id,
            'User_ID' => $user_id
        ];
        if($this->Delete("favourites", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function getFavs($user_id){
      
        $query = 
        "SELECT favourites.Favourite_ID, favourites.Food_ID, fooditem.Food_name, fooditem.Unit_Price, category.Category_name, subcategory.Subcategory_name 
        FROM favourites
        INNER JOIN fooditem ON favourites.Food_ID = fooditem.Food_ID
        INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
        INNER JOIN category ON category.Category_ID = subcategory.Category_ID 
        WHERE favourites.User_ID = $user_id";
        
        $result =$this->Query($query, $options = []);
              
            if($this->Count() > 0){
                $food = $this->AllRecords();
                //print_r($food);
                if($food){
                    return ['status'=>'success', 'data'=>$food];
                }else{
                    return "Favs_not_retrieved";
                }
            }else{
                return "Favs_not_found";
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
        "SELECT cartitem.CartItem_ID, cartitem.Quantity, cartitem.Price, cartitem.CartItem_total, cartitem.Food_ID, fooditem.Food_name, category.Category_name, subcategory.Subcategory_name
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

    public function createOtherRecipient($user_id, $cart_id, $rec_name, $rec_phone){
        $data =[
            'User_ID' => $user_id,
            'Cart_ID' => $cart_id,
            'Name' => $rec_name,
            'Phone_Number' => $rec_phone
        ];
    
        if($this->Insert("other_recipient", $data)){
            return true;
        }else{
            return false;
        }
    
        
    }

    public function updateOtherRecipient($user_id, $cart_id, $rec_name, $rec_phone){
        $data =[
            'User_ID' => $user_id,
            'Cart_ID' => $cart_id,
            'Name' => $rec_name,
            'Phone_Number' => $rec_phone
        ];
        if($this->Update("other_recipient", $data,['Cart_ID' => $cart_id])){
            return true;
        }else{
            return false;
        }
        
    }

    public function updateOrderDetailsInCart($data, $cart_id){
        // print_r($data);
        if($this->Update("cart", $data,['Cart_ID' => $cart_id])){
            return true;
        }else{
            return false;
        }
        
    }

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
 
   
    public function  payhere_get_cart_data($order_id){
      
        if($this->Select_Where("cart", ['Token_Payhere_Order_ID' => $order_id])){

            if($this->Count() > 0){
                $row = $this->Row();
                return ['status'=>'success', 'data'=>$row];
            }else{
                return "cart_not_found";
            }

        }

    }


    public function Payhere_update($data){
           
        if($this->Insert("payhere_order_status", $data)){
            return true;
        }else{
            return false;
        }
    
        
    }
    
    public function  getMyOrders($user_id){
      
        if($this->Select_Where_OrderBy("orders", ['User_ID' => $user_id], "Order_ID", "DESC")){

            if($this->Count() > 0){
                $orders = $this->AllRecords();
                return ['status'=>'success', 'data'=>$orders];
            }else{
                return "orders_not_found";
            }

        }

    }

    public function  getOrderItems($order_id){
      
        $query = 
        "SELECT fooditem.Food_name, order_item.Quantity, order_item.Price
        FROM order_item
        INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        WHERE order_item.Order_ID='".$order_id."' ";
        
        $result =$this->Query($query, $options = []);
              

            if($this->Count() > 0){
                $order_items = $this->AllRecords();
                //print_r($order_items);
                return ['status'=>'success', 'data'=>$order_items];
            }else{
                return "order_items_not_found";
            }


    }

    public function  getOrderItemsforMyOrders($order_id){
      
        $query = 
        "SELECT fooditem.Food_name, order_item.Quantity
        FROM order_item
        INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        WHERE order_item.Order_ID='".$order_id."' ";
        
        $result =$this->Query($query, $options = []);
              

            if($this->Count() > 0){
                $order_items = $this->AllRecords();
                //print_r($order_items);
                return ['status'=>'success', 'data'=>$order_items];
            }else{
                return "order_items_not_found";
            }


    }

    public function  getQtywithItemCount_reorder($order_id){
      
        $query = 
        "SELECT order_item.Quantity AS Quantity , fooditem.Current_count AS Current_count
        FROM order_item
        INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        WHERE order_item.Order_ID='".$order_id."' ";
        
        $result =$this->Query($query, $options = []);

            if($this->Count() > 0){
                $order_items = $this->AllRecords();
                //print_r($order_items);
                return ['status'=>'success', 'data'=>$order_items];
            }else{
                return "order_items_not_found";
            }


    }

    public function getOrderDetails($order_id){

        if($this->Select_Where("orders", ['Order_ID' => $order_id])){

            if($this->Count() > 0){
                $row = $this->Row();
                return $row;
            }else{
                return "order_not_found";
            }

        }
    }

    public function getOtherRecipient($order_id){
        
        if($this->Select_Where("other_recipient", ['Order_ID' => $order_id])){
            if($this->Count() > 0){
                $row = $this->Row();                   
                return $row->Name;
                
            }
        }
    }

    public function createReorder($data, $old_order_id){
       
        $new_order_ID = $this->InsertAndReturnID("orders", $data);
        if(!$new_order_ID){ //order creation failed
            return false;
        }
        //now the inital reorder is created
        //order items should be created with current pricing protocol
        $query = 
        "SELECT order_item.Food_ID as Food_ID, order_item.Quantity AS Quantity, fooditem.Unit_price AS Price
        FROM order_item
        INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        WHERE order_item.Order_ID='".$old_order_id."' ";
        
        $result =$this->Query($query, $options = []);

            if($this->Count() > 0){
                $order_items = $this->AllRecords();
                //print_r($order_items);
                $total_price = 0; //variable to sum subtotals

                foreach($order_items as $row){
                    $total_price += $row->Quantity * $row->Price; //sum subtotals
                    $orderitem_data = [
                        'Order_ID' => $new_order_ID,
                        'Food_ID' => $row->Food_ID,
                        'Quantity' => $row->Quantity,
                        'Price' => $row->Price,
                        'Food_Discount' => 0    //no food discount when reordering
                    ];
                    //insert each order item
                    $this->Insert("order_item", $orderitem_data);
                }

                $service_charge = $total_price * 0.05;

                //update order table with total price, service charge
                if($this->Update("orders", ['Total_price'=>$total_price+$service_charge, 'Service_charge'=>$service_charge],['Order_ID' => $new_order_ID])){
                    $result_data = [
                        'Order_ID' => $new_order_ID,
                        'Total_price'=>$total_price+$service_charge,
                        'Service_charge'=>$service_charge
                    ];
                    return $result_data;
                }else{
                    return "tot_sercharge_not_updated";
                }
               
            }else{
                return "order_items_not_found";
            }

    }

    public function  getQtywithItemCount_cart($cart_id){
      
        $query = 
        "SELECT fooditem.Food_name AS FoodName,cartitem.Quantity AS Quantity , fooditem.Current_count AS Current_count
        FROM cartitem
        INNER JOIN fooditem ON cartitem.Food_ID = fooditem.Food_ID
        WHERE cartitem.Cart_id='".$cart_id."' ";
        
        $result =$this->Query($query, $options = []);

            if($this->Count() > 0){
                $cart_items = $this->AllRecords();
                //print_r($order_items);
                return ['status'=>'success', 'data'=>$cart_items];
            }else{
                return "order_items_not_found";
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





}


?>