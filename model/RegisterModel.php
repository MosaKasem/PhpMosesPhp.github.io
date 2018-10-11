<?php

namespace model;

// We'll pretend this is the database.

class RegisterModel {
    private $username;
    private $password;

    public function validateName($username) {
        if ($username == "Admin") {
            return true;
        } else {
            return false;
        }
    }
    public function userExists() : String {
        return "User exists, pick another username.";
    }
}