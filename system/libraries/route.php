<?php

class Route{
    /*
    * @framework Name  : Cafe99-framework
    * @Author Name     : Jellybee
    * Version          : 1.0.0
    * @Description     : Route class will get, split & sanitize the URL
    */
    private $Controller = Default_controller;
    private $Method     = Default_method;
    private $Param      = Default_param;

    public function __construct(){
        $url = $this->Url();
        //print_r($url);
        //Array ( [0] => controller [1] => method [2] => param1 )
        //index.php file is where the route begins. so the files are called from index.php location
        if(!empty($url)){
            if(file_exists("../application/controllers/".$url[0].".php")){
                $this->Controller = ucwords($url[0]);
                unset($url[0]); //removes the url[0] from the array
                //echo "Controller is found";
            }else{
                include "../application/views/error.php";
                die();
                // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry controller <strong>".$url[0]."</strong> is not found</div>");

                //echo "Sorry controller is not found";
            }
        }
        /*
            @Include controller file
        */
        require_once "../application/controllers/" . $this->Controller . ".php";
        //require_once "../application/controllers/".$this->Controller.".php";
        /*
            @Instantiate controller class
        */
        $this->Controller = new $this->Controller;
         /*
            Check method availability
        */
        if(isset($url[1]) && !empty($url[1])){
            if(method_exists($this->Controller, $url[1])){
                //echo "Method is found";
                //Replace default method on url method
                $this->Method = $url[1];
                unset($url[1]);
            }else{
                include "../application/views/error.php";
                die();
                // die("<div style='background-color:#f1f4f4;color:#afaaaa;border:1px dotted #afaaaa;padding:10px; border-radius:4px'>Sorry controller <strong>".$url[1]."</strong> is not found</div>");

                //echo "Sorry method is not found";
            }
        }
        /*
            Check parameter availability
        */
        if(isset($url)){
            $this->Param = $url;
        }else{
            $this->Param = [];
        }
        //print_r($url);
        call_user_func_array([$this->Controller, $this->Method], $this->Param);
  
        
    }

    public function Url(){
        if(isset($_GET['url'])){

            $url = $_GET['url'];
            $url = rtrim($url); //rtrim() method removes extra spaces from the right
            $url = filter_var($url, FILTER_SANITIZE_URL); //FILTER_SANITIZE_URL removes all illegal characters from the url
            $url = explode("/", $url);  //explode method split the string on specific point
            //print_r($url);
            return $url;
        }
    }
}


?>
