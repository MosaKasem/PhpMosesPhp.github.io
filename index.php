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


$registerModel    = new   \model\RegisterModel();
$sessionModel     = new   \model\SessionModel();
$loginModel       = new   \model\LoginModel();
// $this->database         = new        Database(); // LOCAL DATABASE REQUIRED IN ORDER FOR THIS TO WORK

// View's Folder initiation
$loginView        = new    \view\LoginView();
$layoutView       = new    \view\LayoutView();
$registerView     = new    \view\RegisterView();
$dateTimeView     = new    \view\DateTimeView();


$LoginRouter = new \controller\LoginController();
$routerStarter = new \controller\RouteController($registerModel, $sessionModel, $loginModel, $loginView, $layoutView, $registerView, $dateTimeView, $LoginRouter);
$routerStarter->start();

