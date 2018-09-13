<?php
include("functions.php");

/* print_r($_GET);
if($_GET["id"] === "") echo "a is an empty string\n";
if($_GET["id"] === false) echo "a is false\n";
if($_GET["id"] === null) echo "a is null\n";
if(isset($_GET["id"])) echo "a is set\n";
if(!empty($_GET["id"])) echo "a is not empty";
 */





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