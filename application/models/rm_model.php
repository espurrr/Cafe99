<?php

class Rm_model extends Database{

   
        public function getcards_data(){

        $count_query="SELECT COUNT(Order_ID) as OrderCount FROM orders";
         //current date
        //$count_query="SELECT COUNT(Order_ID) as OrderCount FROM orders where Order_Date_Time=CURRENT_DATE";

        $delivery_count_query="SELECT COUNT(Order_ID) as DeliveryOrderCount FROM orders where Order_type='delivery'";
        //current date
        //$delivery_count_query="SELECT COUNT(Order_ID) as DeliveryOrderCount FROM orders where Order_type='delivery' AND Order_Date_Time=CURRENT_DATE";

        $sum_query="SELECT SUM(Total_price) as TotalPrice FROM orders";
        //current date
        //$sum_query="SELECT SUM(Total_price) as TotalPrice FROM orders where Order_Date_Time=CURRENT_DATE";

        $new_customer_query="SELECT COUNT(User_ID) as NewCustomerCount FROM user where User_role='customer' AND Registered_date='2020-02-23'";
         //Registered_date should be current date
        //$new_customer_query="SELECT COUNT(User_ID) as NewCustomerCount FROM user where User_role='customer' AND Registered_date=CURRENT_DATE";


        $result =$this->Query($count_query, $options = []);
        $count=$this->Row()->OrderCount;
       // print_r($count);
        $delivery_count_result=$this->Query($delivery_count_query, $options = []);
        $delivery_count=$this->Row()->DeliveryOrderCount;
       // print_r($delivery_count);
        $sum_result=$this->Query($sum_query, $options = []);
        $sum=$this->Row()->TotalPrice;
       // print_r($sum);
        $new_customer_result=$this->Query($new_customer_query, $options = []);
        $new_customer=$this->Row()->NewCustomerCount;
       // print_r($new_customer);

        $data=[
            'count'=>$count,
            'delivery_count'=>$delivery_count,
            'sum'=>$sum,
            'new_customer'=>$new_customer,
        ];
        if($data){
        return ['status'=>'success', 'data'=>$data];
    }else{
        return "Data_not_retrieved";
    }
                }

    public function addNews($data){

        if($this->Insert("announcement", $data)){
            return true;
        }else{
            return false;
        }
       
    }

    public function getAnnouncement(){
        $query = 
        "(SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, 
        announcement.Announcement_time, announcement.Content, announcement.To_whom, user.User_name 
        FROM announcement INNER JOIN user ON announcement.RM_User_ID = user.User_ID)

        UNION

        (SELECT announcement.Announcement_id, announcement.Announcement_title, announcement.Announcement_date, announcement.Announcement_time, 
        announcement.Content, announcement.To_whom, announcement.RM_User_ID
        FROM announcement
        WHERE announcement.RM_User_ID IS NULL
        ORDER BY announcement.Announcement_date DESC)";

        $result =$this->Query($query, $options = []);
        if($this->Count() > 0){
            $announcement = $this->AllRecords();
            //print_r($announcement);
            if($announcement){
                return ['status'=>'success', 'data'=>array_reverse($announcement, true)];
            }else{
                return "Announcement_not_retrieved";
            }
        }else{
            return "Announcement_not_found";
        }

    }

    public function newsfeed_data($newsfeed_id){
        
             if($this->Select_Where("announcement", ['Announcement_id' =>  $newsfeed_id])){
                 if($this->Count() > 0){
                     $row = $this->Row();
                     if($row){
                         return ['status'=>'success', 'data'=>$row];
                     }else{
                         return "Announcement_not_retrieved";
                     }
                 }else{
                     return "Announcement_not_found";
                 }
      
             }
         }

         public function newsfeed_data_update($data,  $newsfeed_id){
            //  print_r($data);
         
              if($this->Update("announcement", $data,['Announcement_id' =>  $newsfeed_id])){
                  return true;
              }else{
                  return false;
              }
        
          }


         public function deletenewsfeed($newsfeed_id){
            $data=[
                'Announcement_id'=>$newsfeed_id
                      ];
                      if($this->Delete("announcement", $data)){
                          return true;
                      }else{
                          return false;
                      }
                  }  

    public function userscreate($data){
        //     print_r($data);
             if($this->Insert("user", $data)){
                 return true;
             }else{
                 return false;
             }
         }

    public function display_users(){
        $query = "SELECT User_ID,User_name,Email_address,Phone_no,User_role,User_status FROM user";
        $result = $this->Query($query, $options = []);
     //   echo "$User_name";
    //    if($this->Select_Where("user", ['User_id' => $user_id])){
            if($this->Count() > 0){
                $userdata = $this->AllRecords();
                if($userdata){
                    return ['status'=>'success', 'data'=> $userdata];
                }else{
                    return "user_not_retrieved";
                }
            }else{
                return "user_not_found";
            }
           
     //   }
    }
    public function searchUser($user_id){
        if(empty($user_id)){
            $query = "SELECT User_ID, User_name, Email_address, Phone_no, User_role FROM user";
        }else{
            $query = "SELECT User_ID, User_name, Email_address, Phone_no, User_role FROM user WHERE User_ID = '$user_id'";
        }

        $result =$this->Query($query, $options = []);

        if($this->Count() > 0){
            $user = $this->AllRecords();
            // print_r($food);
            if($user){
                return ['status'=>'success', 'data'=>$user];
            }else{
                return "User_not_retrieved";
            }
        }else{
            return "User_not_found";
        }
    }

  
    public function user_data($id){
  /*      $query ="SELECT User_ID,User_name,Email_address,Phone_no,User_role FROM user";
       $result =$this->Query($query, $options = []);*/
       if($this->Select_Where("user", ['User_ID' =>  $id])){
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


   public function user_data_update($data,  $id){
    //  print_r($data);
 
      if($this->Update("user", $data,['User_ID' =>  $id])){
          return true;
      }else{
          return false;
      }

  }

  public function deleteuser( $id){
  
   /*   $query ="DELETE FROM user WHERE User_ID=$id";
      $result =$this->Query($query, $options = []);*/
      $data=[
'User_ID'=>$id
      ];
      if($this->Delete("user", $data)){
          return true;
      }else{
          return false;
      }
  }

  public function user_status_block($data,$id){
    if($this->Update("user", $data,['User_ID' =>  $id])){
        return true;
    }else{
        return false;
    }
  }

  public function user_status_unblock($data,$id){
    if($this->Update("user", $data,['User_ID' =>  $id])){
        return true;
    }else{
        return false;
    }
  }
    public function addFoodItem($data){

        if($this->Insert("fooditem", $data)){
            return true;
        }else{
            return false;
        }
       
    }

    public function display_fooditem($data){
        $query ="SELECT * FROM fooditem";
        $result =$this->Query($query, $options = []);
     
    //    if($this->Select_Where("fooditem", ['Food_ID' => $food_id])){
            if($this->Count() > 0){
                $fooditem_data = $this->AllRecords();
                if($fooditem_data){
                    return ['status'=>'success', 'data'=> $fooditem_data];
                }else{
                    return "Data_not_retrieved";
                }
            }else{
                return "Fooditem_not_found";
            }
           
     //   }
    }
    public function searchFooditem($foodname){
        $query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability,
            subcategory.Subcategory_ID, subcategory.Subcategory_name, category.Category_ID, category.Category_name 
            FROM fooditem 
            INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON subcategory.Category_ID = category.Category_ID 
            WHERE fooditem.Food_name LIKE '%".$foodname."%' OR subcategory.Subcategory_name LIKE '%".$foodname."%'";
        

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
    public function fooditem_data($food_id){
        $query = 
            "SELECT fooditem.Food_ID, fooditem.Food_name, fooditem.Availability, fooditem.Description, fooditem.Unit_Price,
            subcategory.Subcategory_ID, subcategory.Subcategory_name, category.Category_ID, category.Category_name 
            FROM fooditem 
            INNER JOIN subcategory ON fooditem.Subcategory_ID = subcategory.Subcategory_ID
            INNER JOIN category ON subcategory.Category_ID = category.Category_ID 
            WHERE fooditem.Food_ID = $food_id";
        
        $result =$this->Query($query, $options = []);

        if($this->Count() > 0){
            $food = $this->AllRecords();
            // print_r($food);
            if($food){
                return ['status'=>'success', 'data'=>$food];
            }else{
                return "RM_fooditem_NotFound";
            }
        }else{
            return "Food_not_retrieved";
        }
    }

    public function fooditem_data_update($data,  $food_id){
        //  print_r($data);
     
          if($this->Update("fooditem", $data,['Food_ID' =>  $food_id])){
              return true;
          }else{
              return false;
          }
    
      }

    public function deletefooditem($food_id){
        $data=[
            'Food_ID'=>$food_id
                  ];
                  if($this->Delete("fooditem", $data)){
                      return true;
                  }else{
                      return false;
                  }
              }  
    
  
    public function addSubcategory($data){
     //   print_r($data);
            if($this->Insert("subcategory", $data)){
                return true;
            }else{
                return false;
            }
           
        }

        public function display_subcategory($data){
            $query ="SELECT Subcategory_ID,Subcategory_name FROM subcategory";
            $result =$this->Query($query, $options = []);
         
        //    if($this->Select_Where("subcategory", ['Subcategory_ID' => $subcat_id])){
                if($this->Count() > 0){
                    $subcategory_data = $this->AllRecords();
                    if($subcategory_data){
                        return ['status'=>'success', 'data'=> $subcategory_data];
                    }else{
                        return "Data_not_retrieved";
                    }
                }else{
                    return "Subcategory_not_found";
                }
               
         //   }
        }

        public function searchSubcategory($subcategory_name){
            $query = 
            "SELECT Subcategory_ID,Subcategory_name FROM subcategory
             WHERE Subcategory_name LIKE '%".$subcategory_name."%'";

            $result = $this->Query($query, $options = []);

            if($this->Count() > 0){
                $subcats = $this->AllRecords();
                // print_r($food);
                if($subcats){
                    return ['status'=>'success', 'data'=>$subcats];
                }else{
                    return "subcategory_not_retrieved";
                }
            }else{
                return "subcategory_not_found";
            }
        }

        public function subcategory_data($subcat_id){
        
            if($this->Select_Where("subcategory", ['Subcategory_ID' =>  $subcat_id])){
                if($this->Count() > 0){
                    $row = $this->Row();
                    if($row){
                        return ['status'=>'success', 'data'=>$row];
                    }else{
                        return "Subcategory_not_retrieved";
                    }
                }else{
                    return "Subcategory_not_found";
                }
     
            }
        }

        public function subcategory_data_update($data,  $subcat_id){
            //  print_r($data);
         
              if($this->Update("subcategory", $data,['Subcategory_ID' =>  $subcat_id])){
                  return true;
              }else{
                  return false;
              }
        
          }

        public function deletesubcategory($subcat_id){
            $data=[
                'Subcategory_ID'=>$subcat_id
                      ];
                      if($this->Delete("subcategory", $data)){
                          return true;
                      }else{
                          return false;
                      }
                  }
    
        public function addCategory($data){
            //   print_r($data);
                   if($this->Insert("category", $data)){
                       return true;
                   }else{
                       return false;
                   }
                  
               }

               public function display_category($data){
                $query ="SELECT Category_ID,Category_name FROM category";
                $result =$this->Query($query, $options = []);
             
            //    if($this->Select_Where("category", ['Category_ID' => $cat_id])){
                    if($this->Count() > 0){
                        $category_data = $this->AllRecords();
                        if($category_data){
                            return ['status'=>'success', 'data'=> $category_data];
                        }else{
                            return "Data_not_retrieved";
                        }
                    }else{
                        return "Category_not_found";
                    }
                   
             //   }
            }
            public function searchCategory($category_name){
                $query = 
                "SELECT Category_ID, Category_name FROM category
                 WHERE Category_name LIKE '%".$category_name."%'";
    
                $result = $this->Query($query, $options = []);
    
                if($this->Count() > 0){
                    $subcats = $this->AllRecords();
                    // print_r($food);
                    if($subcats){
                        return ['status'=>'success', 'data'=>$subcats];
                    }else{
                        return "category_not_retrieved";
                    }
                }else{
                    return "category_not_found";
                }
            }

            public function category_data($cat_id){
        
                if($this->Select_Where("category", ['Category_ID' =>  $cat_id])){
                    if($this->Count() > 0){
                        $row = $this->Row();
                        if($row){
                            return ['status'=>'success', 'data'=>$row];
                        }else{
                            return "Category_not_retrieved";
                        }
                    }else{
                        return "Category_not_found";
                    }
         
                }
            }

            public function category_data_update($data,  $cat_id){
                //  print_r($data);
             
                  if($this->Update("subcategory", $data,['Category_ID' =>  $cat_id])){
                      return true;
                  }else{
                      return false;
                  }
            
              }

            public function deletecategory($cat_id){
                $data=[
                    'Category_ID'=>$cat_id
                          ];
                          if($this->Delete("category", $data)){
                              return true;
                          }else{
                              return false;
                          }
                      }

    public function getorders(){
        $query =  "SELECT * FROM orders";

        $result =$this->Query($query, $options = []);

        if($this->Count() > 0){
            $orders = $this->AllRecords();
            //print_r($food);
            if($orders){
                return ['status'=>'success', 'data'=>$orders];
            }else{
                return "Order_not_retrieved";
            }
        }else{
            return "Order_not_found";
        }
    }

    public function searchOrder($order_id){
        if(empty($order_id)){
            $query =  "SELECT * FROM orders";

        }else{
            $query =  "SELECT * FROM orders WHERE Order_ID = $order_id";

        }

        $result =$this->Query($query, $options = []);

        if($this->Count() > 0){
            $orders = $this->AllRecords();
            //print_r($food);
            if($orders){
                return ['status'=>'success', 'data'=>$orders];
            }else{
                return "Order_not_retrieved";
            }
        }else{
            return "Order_not_found";
        }
    }

    public function addOrders($data){
       //   print_r($data);
       if($this->Insert("orders", $data)){
        return true;
    }else{
        return false;
    }  
    }

    
    public function order_data($order_id){
        
        if($this->Select_Where("orders", ['Order_ID' =>  $order_id])){
            if($this->Count() > 0){
                $row = $this->Row();
                if($row){
                    return ['status'=>'success', 'data'=>$row];
                }else{
                    return "Order_not_retrieved";
                }
            }else{
                return "Order_not_found";
            }
 
        }
    }

    public function order_data_update($data,  $order_id){
        //  print_r($data);
     
          if($this->Update("orders", $data,['Order_ID' =>  $order_id])){
              return true;
          }else{
              return false;
          }
    
      }

    public function deleteorder($order_id){
        $data=[
            'Order_ID'=>$order_id
                  ];
                  if($this->Delete("orders", $data)){
                      return true;
                  }else{
                      return false;
                  }
              }

}

?>