<?php
/*
 * Session library
*/
trait Session {

    //Starts the session
    public function start(){
        session_start();
    }

    //Sets session data
    public function set_session($name, $value = ''){
        
        if(!empty($name)){
            if(is_array($name) && empty($value)){
                foreach($name as $key => $session_name):
                  $_SESSION[$key] = $session_name;
                endforeach;
            }else if(!is_array($name) && !empty($value)){
                $_SESSION[$name] = $value;
            }
        }
    }

    //Fetches session data
    /*
     * echo $_SESSION['id']; becomes echo $this->get_session('id);
     */
    public function get_session($name){
        if(!empty($name)){
            return $_SESSION[$name];
        }
    }


    //Set flash message
    public function set_flash($name, $message){
        if(!empty($name) && !empty($message)){
            $_SESSION[$name] = $message;
        }
    }

    public function flash($name, $class = "",$icon=""){
        if(!empty($name) && isset($_SESSION[$name])){
            echo "<div class='". $class ."'>" ."<i class='". $icon ."'></i>&nbsp&nbsp".  $_SESSION[$name] . "</div>";
            unset($_SESSION[$name]);//so that flash message will only display once. gone after refreshed.
        }
    }  

     //Unset session data
    public function unset_session($name){
        if(!empty($name)){

            if(is_array($name)){
                foreach($name as $key):
                   unset($_SESSION[$key]);
                endforeach;
            } else {
               unset($_SESSION[$name]);
            }
        }
    }

    //Destory whole session
    public function destroy_session(){
        session_destroy();
    }

}

?>