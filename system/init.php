<?php
//main file of the system folder
//we will create classes in the libraries folder 
//these classes are packaged here
//and this init.php is included in the public/index.php
include "config/config.php";

spl_autoload_register(function($class_name){
    include "libraries/$class_name.php";
});

?>