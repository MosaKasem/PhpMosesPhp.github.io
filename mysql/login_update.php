<?php
require_once("functions.php");
/* print_r($_GET);
if($_GET["id"] === "") echo "a is an empty string\n";
if($_GET["id"] === false) echo "a is false\n";
if($_GET["id"] === null) echo "a is null\n";
if(isset($_GET["id"])) echo "a is set\n";
if(!empty($_GET["id"])) echo "a is not empty";
*/

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];
	// $query = "UPDATE users SET values(username = '$username', password = '$password, WHERE id = '$id')";
	$query = "UPDATE users SET ";
	$quert .= "username = '$username' ";
	$quert .= "password = '$password' ";
	$quert .= "WHERE id = '$id' ";

	$result = $database->query($connection, $query);
	if (!$result) {
		throw new Exception("BLABLA query" . mysqli_error($connection));
	}
	// var_dump($result);
}


?>

 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
<form action="login_create.php" method="post">
    <input name="username" type="text">
    <input name="password" type="password">
    <input type="submit" name="submit" value="update">
    </form>
<select name="id" id="">
<?php
getUsersID();
?>
</select>
</div>
</body>
</html>