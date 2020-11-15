<?php

class Rmuser_model extends Database{

    public function userscreate($data){
        if($this->Insert("user", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function display_users(){
        if($this->Select_Where("user", ['id' => $User_ID])){
            return true;
        }else{
            return false;
        }
    }

}