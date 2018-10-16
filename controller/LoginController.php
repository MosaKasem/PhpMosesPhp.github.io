<?php

namespace controller;

class LoginController {

    private $fileController   ; // controller

    private $loginView        ; // view

    private $loginModel       ; // model
    private $sessionModel     ; // model
    private $userCredentials  ; // model

    public function __construct(\view\LoginView $lv, \model\LoginModel $lm, \model\SessionModel $sm, \controller\FileReaderController $frc) {
        $this->loginView        = $lv;
        $this->loginModel       = $lm;
        $this->sessionModel     = $sm;
        $this->fileController   = $frc;
    }

    public function loginControl() {

        //Get username // Get password
        // $username     = $this->loginView->getRequestUserName();
        // $password     = $this->loginView->getRequestPassword();

        $userCredentials = $this->loginView->returnUserCredentials();

        var_dump($userCredentials->getUsername());
        var_dump($userCredentials->getPassword());

        

        //Returns true or false
        $successLogin = $this->loginModel->validateLogin($userCredentials);
        $cookie       = $this->loginView->keepMeLoggedIn();
        
        if ($successLogin) {
            $this->fileController->initiateFileReader();

            $this->loginView->keepMeLoggedValidation($userCredentials->getUsername(), $userCredentials->getPassword());
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

        if (!$this->sessionModel->getUserSession()) {

            $this->loginView->setMessage("");
        }
        $this->sessionModel->destroySession();
    }

}