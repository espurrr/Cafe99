<?php

function form_input($fields){
    if(array_key_exists("name", $fields)){
        $name = $fields['name'];
    }else{
        $name = null;
    }
    if(array_key_exists("id", $fields)){
        $id = $fields['id'];
    }else{
        $id = null;
    }
    if(array_key_exists("class", $fields)){
        $class = $fields['class'];
    }else{
        $class = null;
    }
    if(array_key_exists("placeholder", $fields)){
        $placeholder = $fields['placeholder'];
    }else{
        $placeholder = null;
    }
    if(array_key_exists("value", $fields)){
        $value = $fields['value'];
    }else{
        $value = null;
    }
    if(array_key_exists("readonly", $fields)){
        $readonly = $fields['readonly'];
    }else{
        $readonly = '';
    }
    if(array_key_exists("min", $fields)){
        $min = $fields['min'];
    }else{
        $min = null;
    }
    if(array_key_exists("max", $fields)){
        $max = $fields['max'];
    }else{
        $max = null;
    }

    if(array_key_exists("type", $fields)){
        if($fields['type'] == "text"){
           $type = "text";
        } else if($fields['type'] == "email"){
           $type = "email";
        } else if($fields['type'] == "password"){
           $type = "password";
        } else if($fields['type'] == "file"){
           $type = "file";
        } else if($fields['type'] == "tel"){
            $type = "tel";
        }else if($fields['type'] == "date"){
            $type = "date";
        } else if($fields['type'] == "time"){
            $type = "time";
        } else if($fields['type'] == "radio"){
            $type= "radio";
        }

   } else {
       $value = null;
   }

    if($type == "file"){
        return '<input type="'. $type .'" name="'. $name .'" id="'. $id .'" class="'. $class .'">';
    } else if($type == "date" || $type =="time"){
        return '<input type="'. $type .'" name="'. $name .'" id="'. $id .'" class="'. $class . '" min="'. $min .'" max="'. $max . '" value="'. $value . '">' ;
    }
    else {
        return '<input type="'. $type .'" name="'. $name .'" id="'. $id .'" class="'. $class .'" placeholder="'.$placeholder.'" value="'. $value .'" '. $readonly .' >';
    }

}

/*
    * Submit button
*/ 

function form_submit($fields){

    if(array_key_exists("name", $fields)){
        $name = $fields['name'];
    } else {
        $name = null;
    }

    if(array_key_exists("class", $fields)){
        $class = $fields['class'];
    } else {
        $class = null;
    }

    if(array_key_exists("id", $fields)){
        $id = $fields['id'];
    } else {
        $id = null;
    }

    if(array_key_exists("value", $fields)){
        $value = $fields['value'];
    } else {
        $value = null;
    }

    return '<input type="submit" class="'.$class.'" id="'.$id.'" value="'.$value.'">';
}

/*
    Button Helper
*/ 

function form_button($fields){
    if(array_key_exists("name", $fields)){
        $name = $fields['name'];
    } else {
        $name = null;
    }

    if(array_key_exists("class", $fields)){
        $class = $fields['class'];
    } else {
        $class = null;
    }

    if(array_key_exists("id", $fields)){
        $id = $fields['id'];
    } else {
        $id = null;
    }

    if(array_key_exists("value", $fields)){
        $value = $fields['value'];
    } else {
        $value = null;
    }

    return '<input type="button" class="'.$class.'" id="'.$id.'" name="'.$name.'" value="'.$value.'">';
}


/*
    Form opening helper
*/ 

function form_open($action = "", $method = "", $options = []){
//method: POST, GET
    if(array_key_exists("class", $options)){
        $class = $options['class'];
    } else {
        $class = null;
    }

    if(array_key_exists("id", $options)){
        $id = $options['id'];
    } else {
        $id = null;
    }
    $url = BASE_URL . "/" . $action;
    return '<form action="'. $url .'" method="'. $method .'" class="'. $class .'" id="'. $id .'">';

}

function form_multipart($action, $method, $options = []){

    if(array_key_exists("class", $options)){
        $class = $options['class'];
    } else {
        $class = null;
    }

    if(array_key_exists("id", $options)){
        $id = $options['id'];
    } else {
        $id = null;
    }
    $url = BASE_URL . "/" . $action;
    return '<form action="'. $url .'" method="'. $method .'" class="'. $class .'" id="'. $id .'" enctype="multipart/form-data">';


}

/*
    Form closing helper
*/
function form_close(){
    return '</form>';
}


?>