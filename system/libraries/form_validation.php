<?php

trait form_validation {

    public $errors = [];

    public function validation($field_name, $label, $rules){
        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
            $data = trim($_POST[$field_name]);
        } else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] =="get"){
            $data = trim($_GET[$field_name]);
        }

        $pattern = "/^[a-zA-Z ]+$/"; //from a-z and A-Z any character can occur more than once and whitespaces are allowed
        $int_pattern = "/^[0-9]+$/";//from 0-9 any digit can occur more than once and whitespaces are NOT allowed

        $rules = explode("|", $rules); //split the string by pipe sign |
        /*
        RULE => required : value is required
        */ 
        if(in_array("required", $rules)){ //in_array(needle, haystack)
            if(empty($data)){//if value is empty 
                 return $this->errors[$field_name] = $label. " is required";
            }
        }
        /*
        RULE => not_int : value must include only alphabetic characters
        */ 
        if(in_array("not_int", $rules)){
            if(!preg_match($pattern, $data)){ //preg_match performs a regex match
               return $this->errors[$field_name] = $label . " must include only alphabetic characters";
            }
        }

        /*
        RULE => int : value must be an integer
        */ 
        if(in_array("int", $rules)){
            if(!preg_match($int_pattern, $data)){
                return $this->errors[$field_name] = $label . " must be an integer";
            }

        }
    }

    
    public function run(){
        if(empty($this->errors)){
            return true;
        } else {
            return false;
        }
    }

}


?>