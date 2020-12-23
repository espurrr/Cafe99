<?php

class Rmuser_model extends Database{

    public function userscreate($data){
   //     print_r($data);
        if($this->Insert("user", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function display_users($data){
        $query ="SELECT User_name,Email_address,Phone_no,User_role FROM user";
        $result =$this->Query($query, $options = []);
     //   echo "$User_name";
    //    if($this->Select_Where("user", ['User_id' => $user_id])){
            if($this->Count() > 0){
                $userdata = $this->AllRecords();
                if($userdata){
                    return ['status'=>'success', 'data'=> $userdata];
                }else{
                    return "Data_not_retrieved";
                }
            }else{
                return "User_not_found";
            }
           
     //   }
    }

    public function user_data(){
         $query ="SELECT User_name,Email_address,Phone_no,User_role FROM user";
        $result =$this->Query($query, $options = []);
      //  if($this->Select_Where("user", ['User_ID' =>  $id])){
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

      //  }
    }


    public function user_data_update($data,  $id){
      //  print_r($data);
    //  echo "Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
        if($this->Update("user", $data,['User_ID' =>  $id])){
            return true;
        }else{
            return false;
        }

    }

    public function deleteuser( $id){
    //   echo "Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
     /*   $query ="DELETE FROM user WHERE User_ID=$id";
        $result =$this->Query($query, $options = []);*/
        if($this->Delete("user", ['User_ID' =>  $id])){
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
    
        public function addCategory($data){
            //   print_r($data);
                   if($this->Insert("category", $data)){
                       return true;
                   }else{
                       return false;
                   }
                  
               }

}

?>