<?php

class Rmuser_model extends Database{

    public function saverecords($data){
        if($this->Insert("user", $data)){
            return true;
        }else{
            return false;
        }
    }

    public function display_users(){
        if($this->Select_Where("user", "")){
            return true;
        }else{
            return false;
        }
    }

}