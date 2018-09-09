<?php
// CREATE
if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $connection = mysqli_connect('localhost', 'root', '', 'usersdb');
   
   if ($connection) {
       echo "hello";
   } else {
       die("DB connection failed");
   }
   $query = "INSERT INTO users(username,password) ";
   $query .= "VALUES ('$username', '$password')" ;
   $result = mysqli_query($connection, $query);
   if(!$result) {
       die('Query failed!' . mysqli_error());
   } 
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
    <form action="login_create.php" method="post">
    <input name="username" type="text">
    <input name="password" type="password">
    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>