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
        if($this->Delete("user", ['User_ID' => $user_id])){
            return "success";
        }else{
            return "DB_error";
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

    public function createNewOrder($data){
     
        if($this->Insert("orders", $data)){
            return true;
        }else{
            return false;
        }
    }











}


?>