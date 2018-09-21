<?php 
class SessionModel {
    // private static $session = 'SessionModel::Session';
    private static $user = 'SessionModel::User';
/*     public function initilizeSession($isLoggedIn) {
        $_SESSION[$session] = $isLoggedIn;
    } */
    public function storeUserToSession($username) {
        $_SESSION[self::$user] = $username;
    }
    public function getUserSession() {
        if (isset($_SESSION[self::$user])) {
            return $_SESSION[self::$user];
        }
    }
    public function loggedIn() {
        if (isset($_SESSION[self::$user])) {
            return 'true';
        }
        return 'false';
    }
}