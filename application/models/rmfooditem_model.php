<?php

class rmfooditem_model extends Database{

    public function addFoodItem($data){

        if($this->Insert("fooditem2", $data)){
            return true;
        }else{
            return false;
        }
       
    }

}

?>