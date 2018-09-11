<?php

class Database {
    private $connection;
    
    function __construct() {
        $this->open_db_connection();
    }
    public function open_db_connection() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_error()) {
            die("connection made" . mysqli_error());
        }
    }
    public function getConnection() {
        return $this->connection;
    }
    public function query($sql) {
        $result = mysqli_query()
    }
}

$database = new Database();
