<?php include_once 'db.php';
// CREATE

   $query = "SELECT * FROM users";

   $result = mysqli_query($connection, $query);
   if(!$result) {
       die('Query failed!' . mysqli_error());
   } 

   while($row = mysqli_fetch_assoc($result)) {

     echo "<li>";
     print_r($row);
     echo "</li>";
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
 
</div>
</body>
</html>