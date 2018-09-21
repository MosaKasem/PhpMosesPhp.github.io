<?php 
class SessionModel {
    // private static $session = 'SessionModel::Session';
    private static $user = 'SessionModel::User';
/*     public function initilizeSession($isLoggedIn) {
        $_SESSION[$session] = $isLoggedIn;
    } */
    public function storeUserToSession($user) {
        $_SESSION[$user] = $user;
    }
}