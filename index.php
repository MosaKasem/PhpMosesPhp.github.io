<?php

// View
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/UsersTextSnippetsView.php');

// Controllers
require_once('controller/RouteController.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('controller/UsersTextSnippetController.php');

// Models
require_once('model/Database.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');
require_once('model/SessionModel.php');
require_once('model/UserCredentials.php');
require_once('model/UsersTextSnippetModel.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

$rm     = new    \model\RegisterModel();
$sm     = new    \model\SessionModel();
$lm     = new    \model\LoginModel();
$fm     = new    \model\UsersTextSnippetModel();

$lv     = new    \view\LoginView();
$lov    = new    \view\LayoutView();
$rv     = new    \view\RegisterView();
$dtv    = new    \view\DateTimeView();
$fr     = new    \view\UsersTextSnippetsView($fm->getFileName());
var_dump($fm->getFileName());

$mainController = new \controller\RouteController($rm, $sm, $lm, $lv, $lov, $rv, $dtv, $fr);
$mainController->start();
