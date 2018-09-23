<?php
//include error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//front controller
session_start();

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/autoload.php'); //autoload files

$router = new Router(); //start router
$router -> Run();