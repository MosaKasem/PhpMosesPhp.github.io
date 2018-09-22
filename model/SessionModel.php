<?php 
class SessionModel {
    // private static $session = 'SessionModel::Session';
    private static $user = 'SessionModel::User';

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
            return true;
        }
        return false;
    }
    public function destroySession() {
        session_destroy();
        $_SESSION = [];
    }
}