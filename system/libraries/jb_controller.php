<?php

class JB_Controller {

    use form_validation,session,logging; //spl autoload will load all trait files used by JB_controller
    
    public function __construct(){
        $this->start();
        if(file_exists("../application/config/autoload.php")){
            require_once "../application/config/autoload.php";
            $helpers = $autoload['helpers'];
            $this->helper($helpers);
            $plugins = $autoload['plugins'];
            $this->plugin($plugins);

        }
    }
    /*
    Load view in the controller
    */
    public function view($view_name, $data =[]){
        if(file_exists("../application/views/".$view_name.".php")){
            require_once "../application/views/" .$view_name. ".php";
        }else{
            include "../application/views/error.php";
            die();
            // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry View <strong>".$view_name."</strong> is not found</div>");
        }
    }

    /*
    Load model in the controller
    */
    public function model($model_name){

        if(file_exists("../application/models/".$model_name.".php")){
            require_once "../application/models/" .$model_name. ".php";
            $update_model_name = ucwords($model_name);
            return new $update_model_name;
        }else{
            include "../application/views/error.php";
            die();
            // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry Model <strong>".$model_name."</strong> is not found</div>");
        }

    }

    /*
    Helper method will check the helper availability
    */
    public function helper($helper_names){

        if(!empty($helper_names)){
            foreach($helper_names as $helper_name):
                if(file_exists("../system/helpers/" . $helper_name . ".php")){
                    require_once "../system/helpers/" . $helper_name . ".php";
           
                }else{
                    die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry Helper <strong>".$helper_name."</strong> is not found</div>");
                }
            endforeach;
        }
    }

      /*
   Plugin method will check the helper availability
    */
    public function plugin($plugin_names){

        if(!empty($plugin_names)){
            foreach($plugin_names as $plugin_name):
                if(file_exists("../system/plugins/" . $plugin_name . ".php")){
                    require_once "../system/plugins/" . $plugin_name . ".php";
           
                }else{
                    die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry Plugin <strong>".$plugin_name."</strong> is not found</div>");
                }
            endforeach;
        }
    }

    
    /*
    POST function
    */ 

    public function post($field_name){

        if($_SERVER['REQUEST_METHOD'] == "post" || $_SERVER['REQUEST_METHOD'] == "POST"){
              
          return strip_tags(trim($_POST[$field_name]));
          //trim removes extra whitespaces from right and left
          //strip_tags prevents cross-side-scripting attacks

        } else {
          die("<div style='background-color:#f1f4f4;color:#afaaaa;border: 1px dotted #afaaaa;padding: 10px; border-radius: 4px'>Sorry Method is not POST</div>");
        }

    }

    /*
    GET function
    */ 
    public function get($field_name){

        if($_SERVER['REQUEST_METHOD'] == "get" || $_SERVER['REQUEST_METHOD'] == "GET"){
              
          return strip_tags(trim($_GET[$field_name]));

        } else {
          die("<div style='background-color:#f1f4f4;color:#afaaaa;border: 1px dotted #afaaaa;padding: 10px; border-radius: 4px'>Sorry Method is not GET</div>");
        }

    }

    /*
    URI Function
    */ 

    public function uri($segment){

        if(isset($_GET['url'])){

            $url = $_GET['url'];
            $url = rtrim($url); //rtrim() method removes extra spaces from the right
            $url = filter_var($url, FILTER_SANITIZE_URL); //FILTER_SANITIZE_URL removes all illegal characters from the url
            $url = explode("/", $url);  //explode method split the string on specific point
            //print_r($url);
            return $url[$segment];
        }
    }
}

?>