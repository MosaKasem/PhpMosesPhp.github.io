<?php 
class SessionModel {
    private static $session = 'SessionModel::Session';
    public function initilizeSession($isLoggedIn) {
        if (!isset($_SESSION[$session])) {
            $_SESSION[$session] = $isLoggedIn;
            return true;
        }
    }
    public function storeUserToSession($user) {
        $_SESSION[$session] = $user;
    }
}