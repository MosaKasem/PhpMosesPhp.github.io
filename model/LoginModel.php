<?php

namespace model;

// We'll pretend this is the database.

class LoginModel {
    private $username;
    private $password;

    public function validateLogin($userCredentials) {
        if ($userCredentials->getUsername() == "Admin" && $userCredentials->getPassword() == "Password") {
            return true;
        } else {
            return false;
        }
    }
}