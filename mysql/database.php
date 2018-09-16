<?php
// Am following a tutorial on Udemy.
// The course can be found here https://www.udemy.com/oop-php-object-oriented-programing-with-project-1-course/
// I am trying out some of the concepts to get familiar with PHP and communication to MYSQL Database.
/* class Database {
    private $connection;
    
    function __construct() {
        $this->open_db_connection();
    }
    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_error) {
            throw new Exception("connection made" . $this->connection->connect_error);
        }
    }
    public function getConnection() {
        return $this->connection;
    }
    // get query
    public function query($sql) {
        $result = mysqli_query($this->getConnection(), $sql);
        return $result;
    }
    // validate query
    private function confirmQuery($result) {

        if(!$result) {
            throw new Exception('Query failed' . $this->connection->error);
        }
    }
    public function escape($string) {
        
        $escape = $this->connection->query($sql);
        return $escape;
    }
} */

// $database = new Database();
