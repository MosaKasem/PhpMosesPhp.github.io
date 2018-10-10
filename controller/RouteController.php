<?php

// TODO: write to self != writing to reader

namespace controller;

class RouteController {

    private $isLoggedIn      ; // Variable

    private $register        ; // Model
    private $database        ; // Model
    private $sessionModel    ; // Model
    private $loginModel      ; // Model


    private $loginView       ; // View
    private $layoutView      ; // View
    private $registerView    ; // View
    private $dateTimeView    ; // View

    private $loginController ; // Controller


    public function __construct($rm, $sm, $lm, $lv, $lov, $rv, $dtv) {
        // Model's folder initiation
        $this->registerModel    = $rm;
        $this->sessionModel     = $sm;
        $this->loginModel       = $lm;
        // $this->database         = new        Database(); // LOCAL DATABASE REQUIRED IN ORDER FOR THIS TO WORK

        // View's Folder initiation
        $this->loginView        = $lv;
        $this->layoutView       = $lov;
        $this->registerView     = $rv;
        $this->dateTimeView     = $dtv;

        // Controller's folder initiation
        $this->loginController  = new    \controller\LoginController($lv, $lm, $lm);
        var_dump($this->loginController);
    }
    public function start() {
        $isLoggedIn = false;
        if ($this->sessionModel->getUserSession()) {
            $isLoggedIn = true;
        }
            // Event listener for login
            if ($this->loginView->userWantsToLogin()) {
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
/*             if ($this->loginView->userWantsToLogin()) {
                $this->loginController->loginControl();
            } */

            if ($this->loginView->userWantsToLogOut()) {
                $this->loginView->setMessage("Bye bye!");
                $isLoggedIn = false;
                if (!$this->sessionModel->getUserSession()) {
                    $isLoggedIn = false;
                    $this->loginView->setMessage("");
                }
                $this->sessionModel->destroySession();
            }
            // Event listener for register
            if ($this->registerView->userWantsToRegister()) {
                $username = $this->registerView->getRequestUserName();
                $password = $this->registerView->getRequestPassword();

                $isLoggedIn = false;
                $unsuccessful = $this->registerModel->validateName($username);
                if ($unsuccessful) {
                    $userNameTaken = $this->registerModel->userExists();
                    $this->registerView->setMessage($userNameTaken);
                }
            }
            $registerView = $this->layoutView->getRegisterView();
            if ($registerView) {
                $this->layoutView->render($isLoggedIn, $this->registerView, $this->dateTimeView);
            } else {
                $this->layoutView->render($isLoggedIn, $this->loginView, $this->dateTimeView);
            }
        }
    }