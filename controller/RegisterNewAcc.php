<?php

namespace Controller;

class RegisterNewAcc {
    // private $view;
    private $user;
    private $view;
    public function __construct($user) {
        $this->user = $user;
        $this->view = new \view\RegisterView($this->user);
    }

    public function register() {
        // if($this->view->userWants) {
            echo "you'v made it here";
        // }
    }
}