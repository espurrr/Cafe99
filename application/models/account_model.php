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
                $row = $this->Row();
                $dbPw = $row->User_Password;
                if(password_verify($password,$dbPw)){
                    return "Success";
                }else{
                    return "Password_not_matched";
                }
            }else{
                return "Email_not_found";
            }
        }


    }

    public function isToken($token){
        if($this->Select_Where("user", ['Token' => $token])){
            if($this->Count() > 0){
                if($this->Update("user", ['User_status'=> 'active', 'Token'=>""], ['Token' => $token])){
                    return "Success";
                }else{
                    return "Activation_error";
                }
            }else{
                return "Token_not_found";
            }
        }
    }

    public function deleteUser($token){
        $this->Delete("user", ['Token' => $token]);      
    }

}