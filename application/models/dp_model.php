<?php

class dp_model extends Database{

    public function display_neworders($data){
    //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
        $query ="SELECT delivery_order_details.Order_ID,delivery_order_details.Delivery_address,delivery_order_details.Delivery_time,
        delivery_order_details.Delivery_order_status,user.User_name FROM 
        ((orders INNER JOIN delivery_order_details ON orders.Order_ID=delivery_order_details.Order_ID) 
        INNER JOIN user ON orders.User_ID=user.User_ID)";
        $result =$this->Query($query, $options = []);
     
    //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
            if($this->Count() > 0){
                $order_data = $this->AllRecords();
                if($order_data){
                    return ['status'=>'success', 'data'=> $order_data];
                }else{
                    return "Data_not_retrieved";
                }
            }else{
                return "Fooditem_not_found";
            }
           
     //   }
    }

    public function display_ondelivery($data){
        //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
            $query ="SELECT delivery_order_details.Order_ID,delivery_order_details.Delivery_address,delivery_order_details.Delivery_time,
            delivery_order_details.Delivery_order_status,user.User_name FROM 
            ((orders INNER JOIN delivery_order_details ON orders.Order_ID=delivery_order_details.Order_ID) 
            INNER JOIN user ON orders.User_ID=user.User_ID)";
            $result =$this->Query($query, $options = []);
         
        //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                if($this->Count() > 0){
                    $order_data = $this->AllRecords();
                    if($order_data){
                        return ['status'=>'success', 'data'=> $order_data];
                    }else{
                        return "Data_not_retrieved";
                    }
                }else{
                    return "Fooditem_not_found";
                }
               
         //   }
        }

        public function display_dispatched($data){
            //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                $query ="SELECT delivery_order_details.Order_ID,delivery_order_details.Delivery_address,delivery_order_details.Delivery_time,
                delivery_order_details.Delivery_order_status,user.User_name FROM 
                ((orders INNER JOIN delivery_order_details ON orders.Order_ID=delivery_order_details.Order_ID) 
                INNER JOIN user ON orders.User_ID=user.User_ID)";
                $result =$this->Query($query, $options = []);
             
            //    if($this->Select_Where("delivery_order_details", ['Order_ID' => $id])){
                    if($this->Count() > 0){
                        $order_data = $this->AllRecords();
                        if($order_data){
                            return ['status'=>'success', 'data'=> $order_data];
                        }else{
                            return "Data_not_retrieved";
                        }
                    }else{
                        return "Fooditem_not_found";
                    }
                   
             //   }
            }

    public function getAnnouncement(){
        $query = "SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
        announcement.Content, announcement.To_whom, user.User_name FROM announcement INNER JOIN user ON announcement.User_ID = user.User_ID
        WHERE announcement.To_whom = 'All Employees' OR announcement.To_whom = 'Delivery Person' ORDER BY announcement.Announcement_date DESC";

        $result =$this->Query($query, $options = []);
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


}

?>