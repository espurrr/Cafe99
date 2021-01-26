<?php

class Account_model extends Database{

    public function signup($data){

        if($this->Insert("user", $data)){
            return true;
        }else{
            return false;
        }

    }

    public function login($email, $password){

        if($this->Select_Where("user", ['Email_address' => $email])){

            if($this->Count() > 0){

                $options = array('cost' => 12); //cost factor of the hashing algorithm

                $row = $this->Row();
                $dbPw = $row->User_Password;

                // Verify stored hash against plain-text password
                if(password_verify($password,$dbPw)){
                    // Check if a newer hashing algorithm is available
                    // or the cost has changed
                    if (password_needs_rehash($dbPw, PASSWORD_DEFAULT)) {
                        //If so, create a new hash
                        $newHash = password_hash($password, PASSWORD_DEFAULT, $options);

                        //Update the new hash in the database
                        $this->Update("user", ['User_Password'=>$newHash],['Email_address' => $email]);
                    }
                    // Logs user in
                    return ['status'=>'success', 'data'=>$row];
                }else{
                    return "Password_not_matched";
                }
            }else{
                return "Email_not_found";
            }
        }


    }

    public function login_time($user_id){
        date_default_timezone_set('Asia/Colombo');
        $login_time = date('Y-m-d H:i:s');
        if($this->Update("user", ['DateTime_LastLoginAttempt'=>$login_time],['User_ID' => $user_id])){
            return true;
        }else{
            return false;
        }

    }

    public function isToken($token){
        if($this->Select_Where("user", ['Token' => $token])){
            if($this->Count() > 0){
                $row = $this->Row();
                $user_id = $row->User_ID;
                if($this->Update("user", ['User_status'=> 'active', 'Token'=>""], ['Token' => $token])){
                    return ['status'=>'success', 'data'=>$row];
                }else{
                    return "Activation_error";
                }
            }else{
                return "Token_not_found";
            }
        }
    }

    public function resetPwToken($data){
        if($this->Select_Where("user", ['Email_address' => $data['Email_address']])){
            if($this->Count() > 0){
                if($this->Update("user", ['Token'=> $data['Token']], ['Email_address' => $data['Email_address']])){
                    return "Success";
                }else{
                    return "Token_update_error";
                }
            }
        }
    }

    
    public function updatePw($user_id, $password){
        if($this->Select_Where("user", ['User_ID' => $user_id])){
            if($this->Count() > 0){
                if($this->Update("user", ['User_Password'=> $password], ['User_ID' => $user_id])){
                    return "Success";
                }else{
                    return "Password_update_error";
                }
            }
        }
    }

    public function deleteUser($token){
        $this->Delete("user", ['Token' => $token]);      
    }

    /**
     *  Customer cart database requests
     */

    public function createCart($user_id){

        date_default_timezone_set('Asia/Colombo');
        $creation_date_time = date('Y-m-d H:i:s');

        $data = [
            'User_ID' => $user_id,
            'CreationDateTime' => $creation_date_time
        ];

        if($this->Insert("cart", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function getAssignedCart($user_id){

        if($this->Select_Where("cart", ['User_ID' => $user_id])){
            if($this->Count() > 0){
                $row = $this->Row();
                return $row;
            }
            return false;
        }
        return false;
    }

    public function updateIsAssignedCart($user_id){
        if($this->Select_Where("user", ['User_ID' => $user_id])){
            if($this->Count() > 0){
                if($this->Update("user", ['isAssignedCart'=> 1], ['User_ID' => $user_id])){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }




}