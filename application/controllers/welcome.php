<?php

class Welcome extends Lightweight {
     
    public function __construct(){
		    echo 'Welcome Controller';
    }
    
    public function index(){
        echo "index method from Welcome controller";
    }
}

?>