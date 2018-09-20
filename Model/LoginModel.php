<?php

class LoginModel {
    private $username;
    private $password;

    public function __construct() {
        $this->username = "Admin";
        $this->password = "Admin";
    }
    public function validateLogin($username, $password) {
        // if ($username && $password)
    }
}