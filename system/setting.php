<?php

include "../application/config/config.php";

define ("Default_controller", $default['controller']);
define("Default_method", $default['method']);
define("Default_param", $default['param']);


//Database params
define('HOST',$database['host']);
define('USERNAME',$database['username']);
define('DATABASE',$database['database']);
define('PASSWORD',$database['password']);


//Base url
define('BASE_URL', $setting['base_url']);


//Email params
define('E_HOST', $email['host']);
define('E_USERNAME',$email['username']);
define('E_PASSWORD',$email['password']);
define('E_PORT',$email['port']);

?>