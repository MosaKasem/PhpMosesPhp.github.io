<?php

class Session {
    function databaseC () {
        $connection = mysqli_connect('localhost', 'root', '', 'usersdb');
        if ($connection == true) {
            echo "connected";
        } else {
            throw new Exception("FAILED!!!!!!!!!!!!!" . mysqli_error());
        }
    }
}