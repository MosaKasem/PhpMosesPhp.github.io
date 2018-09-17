<?php
require_once("Model/init.php");

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');

require_once('Controller/RouteController.php');
require_once('Controller/FormSecurity.php');

require_once('Model/Database.php');
require_once('Model/FormPost.php');


session_start();

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$routerStarter = new RouteController();
$routerStarter->start();
// var_dump($routerStarter);

//CREATE OBJECTS OF THE VIEWS

// Default Begins
/* $v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$lv->render(false, $v, $dtv); */
// Default Ends


// var_dump($_GET);


// The current URL
// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';


// GETTING A USER FROM DATABASE

/* $sql = "SELECT * FROM users WHERE id=1";
$result = $database->query($sql);
$user = mysqli_fetch_array($result);
echo $user['username']; */

