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
        $int_pattern = "/^[0-9]+$/";

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

         /*
        RULE => email : checks whether the email is valid in terms of having a . after @ sign 
        */ 
        if(in_array("email", $rules)){
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                return $this->errors[$field_name] = $label . " is not valid";
            }
        }

        
        /*
        RULE => min_len : check minimum length
        */ 
        if(in_array("min_len", $rules)){
            // Get the index of min_len rule
            $min_len_index = array_search("min_len", $rules);
            // Get the index of min_len rule value
            $min_len_value = $min_len_index + 1;
            // Get the value of min_len rule
            $min_len_value = $rules[$min_len_value];
            if(strlen($data) < $min_len_value){
                return $this->errors[$field_name] = $label . " is less than " . $min_len_value . " characters";
            }

        }
        
        /*
        RULE => max_len : check maximum length
        */ 
        if(in_array("max_len", $rules)){
            //Get the index of max_len rule
            $max_len_index = array_search("max_len", $rules);
            //Get the index of max_len rule value
            $max_len_value = $max_len_index + 1;
            //Get the value of max_len rule 
            $max_len_value = $rules[$max_len_value];
            if(strlen($data) > $max_len_value){
                return $this->errors[$field_name] = $label . " is grater than " . $max_len_value . " characters";
            }

        }

          /*
        RULE => len : check length
        */ 
        if(in_array("len", $rules)){
            // Get the index of len rule
            $len_index = array_search("len", $rules);
            // Get the index of len rule value
            $len_value = $len_index + 1;
            // Get the value of len rule
            $len_value = $rules[$len_value];
            if(strlen($data) != $len_value){
                return $this->errors[$field_name] = $label . " does not have " . $len_value . " digits";
            }

        }
        
        /*
        RULE => confirm : confirm password
        */ 

        if(in_array("confirm", $rules)){
            //Get the index of confirm rule
            $confirm_rule_index = array_search("confirm", $rules);
            //Get the index of password 
            $confirm_rule_index = $confirm_rule_index + 1;
            //Get the password name
            $confirm_rule_password = $rules[$confirm_rule_index];

            if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
            //Get the password value
            $password = trim($_POST[$confirm_rule_password]);
        } else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] =="get"){
            //Get the password value
            $password = trim($_GET[$confirm_rule_password]);
        }
           if($data !== $password){
      
            // echo $password;
            return $this->errors[$field_name] = $label . " is not matched";
           }
        }

        /*
        RULE => unique : Check the email availability
        */ 
        if(in_array("unique", $rules)){
            //Get the index of unique role
            $unique_index = array_search("unique", $rules);
           //Get the index of table name
            $table_index = $unique_index + 1;
            //Get table name
            $table_name = $rules[$table_index];
            //Include the database file 
            require_once "../system/libraries/database.php";
            $db = new Database;
            if($db->Select_Where($table_name, [$field_name => $data])){
                if($db->Count() > 0){
                    return $this->errors[$field_name] = $label . " already exists";
                }
            }
        }

          /*
        RULE => exists : Check whether the email address exists in the database
        */ 
        if(in_array("exists", $rules)){
            //Get the index of unique role
            $unique_index = array_search("exists", $rules);
           //Get the index of table name
            $table_index = $unique_index + 1;
            //Get table name
            $table_name = $rules[$table_index];
            //Include the database file 
            require_once "../system/libraries/database.php";
            $db = new Database;
            if($db->Select_Where($table_name, [$field_name => $data])){
                if($db->Count() == 0){
                    return $this->errors[$field_name] = $label . " is not registered yet";
                }
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

    /*
    Set form values : persistence when the button is clicked
    */ 

   public function set_value($field_name){
        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
            if(isset($_POST[$field_name])){
                return $_POST[$field_name];
            } else {
                return false;
            }
        
        }else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get") {
            if(isset($_GET[$field_name])){
                return $_GET[$field_name];
            } else {
                return false;
            }
        }
    }  

    /*
    Password hash : a secure php built-in encryption method
    md5 hash is insecure, crackable (eg: from crackstation.net)
    */ 
    public function hash($password){
        if(!empty($password)){
            return password_hash($password, PASSWORD_DEFAULT);
        }
    }


}
?>