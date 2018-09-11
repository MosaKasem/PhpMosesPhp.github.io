<?php
require_once("mysql/init.php");
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

require_once('core/Router.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();


$lv->render(false, $v, $dtv);

// The current URL
// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';
$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

$url = $_SERVER['QUERY_STRING'];
if ($router->match($url))
{
    echo "<pre>";
    var_dump($router->getParams());
    echo "</pre>";
} else {
    echo "no route found for '$url'";
}


if ($database->getConnection()) {
    echo "yaaohh!";
}

/* echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>'; */

/* echo get_class($router); */
