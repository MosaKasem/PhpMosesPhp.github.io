<?php
$connection = mysqli_connect('localhost', 'root', '', 'usersdb');
   
   if ($connection) {
       echo "hello";
   } else {
       die("DB connection failed");
   }
