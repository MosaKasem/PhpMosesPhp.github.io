<?php

namespace model;

// We'll pretend this is the database.

class LoginModel {
    private $username;
    private $password;

/*     public function __construct() {
        $this->username = $username;
        $this->password = $password;
    } */
    public function validateLogin($username, $password) {
        if ($username == "Admin" && $password == "Password") {
            return true;
        } else {
            return false;
        }
    }
    public function setUser() {
        $this->username = $username;
    }
    public function setPass() {
        $this->password = $password;
    }
}