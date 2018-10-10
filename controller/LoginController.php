<?php

namespace controller;

class LoginController {

    private $loginView        ; // view

    private $loginModel       ; // model
    private $sessionModel     ; // model

    public function __construct(\view\LoginView $lv, \model\LoginModel $lm, \model\SessionModel $sm) {
        $this->loginView        = $lv;
        $this->loginModel       = $lm;
        $this->sessionModel     = $sm;
    }

    public function loginControl() {
        //Get username // Get password
        $username     = $this->loginView->getRequestUserName();
        $password     = $this->loginView->getRequestPassword();

        //Returns true or false
        $successLogin = $this->loginModel->validateLogin($username, $password);
        $cookie       = $this->loginView->keepMeLoggedIn();
        
        if ($successLogin) {
            $isLoggedIn = true;
            $this->loginView->keepMeLoggedValidation($username, $password);
            if ($this->sessionModel->getUserSession()) {
                $this->loginView->setMessage('');
            }
            $this->sessionModel->storeUserToSession($username);
        } else {
            $this->loginView->setMessage('Wrong name or password');
        }
    }
    public function logoutControl() {
        $this->loginView->setMessage("Bye bye!");
        $isLoggedIn = false;
        if (!$this->sessionModel->getUserSession()) {
            $isLoggedIn = false;
            $this->loginView->setMessage("");
        }
        $this->sessionModel->destroySession();
    }

}