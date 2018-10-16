<?php

namespace model;

// We'll pretend this is the database.

class RegisterModel {
    private $username;
    private $password;

    public function validateName($userCredentials) {
        if ($userCredentials->getUsername() == "Admin") {
            return true;
        } else {
            return false;
        }
    }
    public function userExists() : String {
        return "User exists, pick another username.";
    }

    public function readFromDatabase() : Void {
        $json = json_decode(file_get_contents("database.json"));
        var_dump($json);
    }
}