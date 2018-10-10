<?php
// require_once("model/init.php"); // LOCAL DATABASE

// View
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');


// Controllers
require_once('controller/RouteController.php');


// Models
require_once('model/Database.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');
require_once('model/SessionModel.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

$r = new \controller\RouteController();
$r->start();

