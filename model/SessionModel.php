<?php 

namespace model;

class SessionModel {
    
    private static $user = 'SessionModel::User';

    private $isLoggedIn;

    public function storeUserToSession($username) {
        $_SESSION[self::$user] = $username;
    }
    public function getUserSession() {
        if (isset($_SESSION[self::$user])) {
            return $_SESSION[self::$user];
        }
        return "";
    }
    public function userIsLoggedIn() : bool {
        if (isset($_SESSION[self::$user])) {
            return true;
        }
        return false;
    }
    public function destroySession() {
        session_destroy();
        $_SESSION = [];
    }
    public function handleIsLoggedIn() {
        if ($this->getUserSession()) {
            return $isLoggedIn = true;
        } else {
            return $isLoggedIn = false;
        }
    }
}