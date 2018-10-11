<?php

namespace model;

// We'll pretend this is the database.

class LoginModel {
    private $username;
    private $password;

    public function validateLogin($username, $password) {
        if ($username == "Admin" && $password == "Password") {
            return true;
        } else {
            return false;
        }
    }
}