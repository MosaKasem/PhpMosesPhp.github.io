<?php
require_once("Model/init.php");

//INCLUDE THE FILES NEEDED...

// View
require_once('View/LoginView.php');
require_once('View/DateTimeView.php');
require_once('View/LayoutView.php');
require_once('View/RegisterView.php');


// Controllers
require_once('Controller/RouteController.php');
// require_once('Controller/LoginController.php');


// Models
require_once('Model/Database.php');
require_once('Model/LoginModel.php');
require_once('Model/RegisterModel.php');

// TODO: FUCK THIS SHIT... testing;

session_start();

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Hard coded " user "
/* if (!$_SESSION) {
    $_SESSION['username'] = 'Admin';
    $_SESSION['password'] = 'Admin';
    $_SESSION['message']  = '';
} */

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


/* 			echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"<br>';
			echo 'Request Method = "' . $_SERVER['REQUEST_METHOD'] . '"<br>';
			echo 'Form Submit Username = "' . var_dump($_POST[self::$name]) . '"<br>';
			echo 'Form Submit Password = "' . var_dump($_POST[self::$password]) . '"<br>';
			echo 'Get Url "' . var_dump($_GET) . '"<br>';
			echo '$_POST: "' . var_dump($_POST[self::$login]) . '"<br>'; */
