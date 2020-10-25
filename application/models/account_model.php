<?php

class Account_model extends Database{

    public function signup($data){

        if($this->Insert("user", $data)){
            return true;
        }else{
            return false;
        }

    }
}