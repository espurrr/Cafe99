<?php

class rmnewsfeed_model extends Database{

    public function addNews($data){

        if($this->Insert("announcement", $data)){
            return true;
        }else{
            return false;
        }
       
    }

}

?>