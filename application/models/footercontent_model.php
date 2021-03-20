<?php

class footercontent_model extends Database{

    public function addfeedback($data)
    {
        if($this->Insert("feedback",$data)){
            return true;
        }else
        {
            return false;
        }
    }

}

?>