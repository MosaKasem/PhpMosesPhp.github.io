<?php
// CREATE

   $query = "SELECT * FROM users";

   $result = mysqli_connect('localhost', 'root', '', 'usersdb');
   if(!$result) {
       die('Query failed!' . mysqli_error());
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
<select name="" id="">
<option value="">1</option>
</select>
</div>
</body>
</html>