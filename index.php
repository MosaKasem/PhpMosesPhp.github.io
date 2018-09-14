<?php
require_once("mysql/init.php");
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$r = new RegisterView();
// $v = new LoginView();
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
// var_dump($_GET);

$lv->render(false, $v, $dtv, $r);

// The current URL
// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';


// GETTING A USER FROM DATABASE

/* $sql = "SELECT * FROM users WHERE id=1";
$result = $database->query($sql);
$user = mysqli_fetch_array($result);
echo $user['username']; */

