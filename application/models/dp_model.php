<?php

class dp_model extends Database{

    public function display_neworders($data){
    //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
        $query ="SELECT orders.Order_ID, orders.Delivery_Address, orders.Delivery_Dispatch_DateTime, orders.Order_status,
        user.User_name,
        order_item.Quantity, fooditem.Food_name
        FROM orders INNER JOIN user ON orders.User_ID=user.User_ID
        INNER JOIN order_item ON orders.Order_ID = order_item.Order_id
        INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
        WHERE orders.Order_type='delivery' AND orders.Order_status='delivery_new' AND orders.Delivery_Person=".$data['id'];

        $result = $this->Query($query, $options = []);
     
    //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
            if($this->Count() > 0){
                $order_data = $this->AllRecords();
                if($order_data){
                    return ['status'=>'success', 'data'=> $order_data];
                }else{
                    return "Order_not_retrieved";
                }
            }else{
                return "Order_not_found";
            }
           
     //   }
    }

    public function display_ondelivery($data){
        //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
            $query ="SELECT orders.Order_ID, orders.Delivery_Address, orders.Delivery_Dispatch_DateTime, orders.Order_status,
            user.User_name, 
            order_item.Quantity, fooditem.Food_name
            FROM orders INNER JOIN user ON orders.User_ID=user.User_ID 
            INNER JOIN order_item ON orders.Order_ID = order_item.Order_id
            INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
            WHERE orders.Order_type='delivery' AND orders.Order_status='delivery_ondelivery' AND orders.Delivery_Person=".$data['id'];

            $result =$this->Query($query, $options = []);
         
        //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                if($this->Count() > 0){
                    $order_data = $this->AllRecords();
                    if($order_data){
                        return ['status'=>'success', 'data'=> $order_data];
                    }else{
                        return "Order_not_retrieved";
                    }
                }else{
                    return "Order_not_found";
                }
               
         //   }
        }

        public function display_dispatched($data){
            //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                $query ="SELECT orders.Order_ID,orders.Delivery_Address,orders.Delivery_Dispatch_DateTime,orders.Order_status,
                user.User_name,
                order_item.Quantity, fooditem.Food_name
                FROM orders INNER JOIN user ON orders.User_ID=user.User_ID
                INNER JOIN order_item ON orders.Order_ID = order_item.Order_id
                INNER JOIN fooditem ON order_item.Food_ID = fooditem.Food_ID
                WHERE orders.Order_type='delivery' AND orders.Order_status='delivery_dispatched' AND orders.Delivery_Person=".$data['id'];
                $result =$this->Query($query, $options = []);
             
            //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                    if($this->Count() > 0){
                        $order_data = $this->AllRecords();
                        if($order_data){
                            return ['status'=>'success', 'data'=> $order_data];
                        }else{
                            return "Order_not_retrieved";
                        }
                    }else{
                        return "Order_not_found";
                    }
                   
             //   }
            }

    public function getAnnouncement(){
        $query = 
        "(SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, 
        announcement.Announcement_time, announcement.Content, announcement.To_whom, user.User_name 
        FROM announcement INNER JOIN user ON announcement.RM_User_ID = user.User_ID
        WHERE announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Delivery Person' 
        ORDER BY announcement.Announcement_date DESC)
        
        UNION

        (SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
        announcement.Content, announcement.To_whom, announcement.RM_User_ID
        FROM announcement
        WHERE announcement.RM_User_ID IS NULL AND (announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Delivery Person')
        ORDER BY announcement.Announcement_date DESC)";

        $result =$this->Query($query, $options = []);
        if($this->Count() > 0){
            $announcement = $this->AllRecords();
            //print_r($announcement);
            if($announcement){
                return ['status'=>'success','data'=>array_reverse($announcement, true)];
            }else{
                return "Announcement_not_retrieved";
            }
        }else{
            return "Announcement_not_found";
        }

    }

    public function updateOrderStatusNew($data, $order_id){
        if($this->Update("orders", $data, ['Order_ID' => $order_id])){
            return true;
        }else{
            return false;
        }
    }

    public function updateOrderStatusOndelivery($data, $order_id){
        if($this->Update("orders", $data, ['Order_ID' => $order_id])){
            return true;
        }else{
            return false;
        }
    }

    public function updateOrderStatusDispatched($data, $order_id){
        if($this->Update("orders", $data, ['Order_ID' => $order_id])){
            return true;
        }else{
            return false;
        }
    }
    
    public function getCustomerData($order_id){
        $query = 
        "SELECT user.User_name AS username ,user.Email_address AS email
        FROM user
        INNER JOIN orders ON orders.User_ID = user.User_ID
        WHERE orders.Order_ID='".$order_id."' ";
        
        $result =$this->Query($query, $options = []);

        if($this->Count() > 0){
            $data = $this->Row();
            if($data){
                return ['status'=>'success', 'data'=>$data];
            }else{
                return ['status'=>'User_data_not_retrieved'];
            }
        }else{
            return ['status'=>'User_not_found'];
        }
    }


}

?>