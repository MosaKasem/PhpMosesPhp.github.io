<?php

namespace model;

// "Database"

class LoginModel {
    private $username;
    private $password;

    public function validateLogin($userCredentials) : bool {
        if ($userCredentials->getUsername() == "Admin" && $userCredentials->getPassword() == "Password") {
            return true;
        } else {
            return false;
        }
    }
}