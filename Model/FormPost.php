<?php

class FormPost {
    public function postMethod() {
        return $_POST;
/*             $connection = mysqli_connect('localhost', 'root', '', 'usersdb');
            $query = "SELECT * FROM users";
    
            if ($result = mysqli_query($connection, $query)) {
                $rowcount=mysqli_num_rows($result);
                printf("Result set has %d rows.\n",$rowcount . "<br>");
                // Free result set - W3SCHOOLS, testing myslqi_num_rows, you maniak.
    
            } else {
                throw new Exception("FAILED!!!!!!!!!!!!!" . mysqli_error());
            } */
        
    }
}