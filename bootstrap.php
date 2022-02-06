<?php
require_once getcwd().'/config/roles.php';
require_once getcwd().'/config/logger.php';
Logger::$logFile  = $_SERVER["DOCUMENT_ROOT"].'/logs/error.log';
session_start();

//if (!array_key_exists('gost-crypto', $_SESSION))
//{
    //$token = hash('gost-crypto', random_int(0,999999));
 //   $_SESSION["CSRF"] = $token;
//}
if (!array_key_exists('userId', $_SESSION))
    $_SESSION['userId'] =null;
require_once 'core/model.php'; 
require_once 'core/view.php'; 
require_once 'core/controller.php'; 
require_once 'route.php'; 
require_once getcwd().'/config/utils.php';

Route::start(); 

?>