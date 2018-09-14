<?php

function getUsersID() {

    // CREATE
    require_once("init.php");
	$query = "SELECT * FROM users";
    // $result2 = mysqli_query($database->connection, $query);
	$result = $database->query($query);
    //$user = mysqli_fetch_array($result);
    
    if(!$result) {
        die('Query failed!' . mysqli_error());
    } else {
        echo "fuck this";
   }
   while($row = mysqli_fetch_assoc($result)) {
       // printf($row['id']);
       $id = $row['id'];
       echo "<option value='$id'>$id</option>";
    }

};