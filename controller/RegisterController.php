<?php

namespace controller;

class RegisterController {
    private $registerView    ; // view

    private $registerModel   ; // model

    public function __construct(\view\RegisterView $rv, \model\RegisterModel $rm) {
        $this->registerView     = $rv;
        $this->registerModel    = $rm;
    }
    public function registerControl() {

        $username = $this->registerView->getRequestUserName();
        $password = $this->registerView->getRequestPassword();

        $unsuccessful = $this->registerModel->validateName($username);
        if ($unsuccessful) {
            $userNameTaken = $this->registerModel->userExists();
            $this->registerView->setMessage($userNameTaken);
        }
    }
}