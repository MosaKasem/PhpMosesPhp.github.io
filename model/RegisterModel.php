<?php
// We'll pretend this is the database.
class RegisterModel {
    private $username;
    private $password;
/* 
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    } */
    public function validateRegister($username, $password) {
        if ($username == "Admin" && $password == "Password") {
            return true;
        } else {
            return false;
        }
    }
    public function userExists() : String {
        return "User exists, pick another username.";
    }
}