<?php

namespace Model;

session_start();

class UserStorage {
    private static $SESSION_KEY = __NAMESPACE__ . __CLASS__ . "user";

    public function loadSession() {
        if (isset($_SESSION[self::$SESSION_KEY])) {
            return $_SESSION[self::$SESSION_KEY];
        } else {
            return new User();
        }
    }
    public function saveUser(User $saveUser) {
        $_SESSION[self::$SESSION_KEY] = $saveUser;
    }
}