<?php

function getUsersID() {
    require_once("init.php");

    // CREATE
	$query = "SELECT * FROM users";
    // $result2 = mysqli_query($database->connection, $query);
	$result = $database->query($query);
    //$user = mysqli_fetch_array($result);
    
    if(!$result) {
        die('Query failed!' . mysqli_error());
    } else {
        echo "This is rid";
   }
   while($row = mysqli_fetch_assoc($result)) {
       // printf($row['id']);
       $id = $row['id'];
       echo "<option value='$id'>$id</option>";
    }

};