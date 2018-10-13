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
    private $fileReaderView  ; // View

    private $loginController    ; // Controller
    private $registerController ; // Controller
    private $fileReadController ; // Controller


    public function __construct(\model\RegisterModel $rm, \model\SessionModel $sm, \model\LoginModel $lm, \view\LoginView $lv, \view\LayoutView $lov, \view\RegisterView $rv, \view\DateTimeView $dtv, \view\FileReaderView $fr) {
        // Model's folder initiation
        $this->registerModel    = $rm;
        $this->sessionModel     = $sm;
        $this->loginModel       = $lm;

        // View's Folder initiation
        $this->loginView        = $lv;
        $this->layoutView       = $lov;
        $this->registerView     = $rv;
        $this->dateTimeView     = $dtv;
        $this->fileReaderView   = $fr;

        // Controller's folder initiation
        $this->fileReadController   = new \controller\FileReaderController($this->sessionModel, $this->fileReaderView);
        $this->loginController      = new \controller\LoginController($this->loginView, $this->loginModel, $this->sessionModel, $this->fileReadController);
        $this->registerController   = new \controller\RegisterController($this->registerView, $this->registerModel);
    }
    public function start() {

        if ($this->loginView->userWantsToLogin()) {
            $this->loginController->loginControl();
        }
        if ($this->loginView->userWantsToLogOut()) {
            $this->loginController->logoutControl();
        }

        if ($this->registerView->userWantsToRegister()) {
            $this->registerController->registerControl();
        }
        if ($this->fileReaderView->userWantsToUploadFile()) {
            $this->fileReadController->initiateFileReader();
        }

        // ?register ? true : false
        $registerView = $this->layoutView->getRegisterView();
        if ($registerView) {
            $this->layoutView->render($this->sessionModel->handleIsLoggedIn(), $this->registerView, $this->dateTimeView, $this->fileReaderView);
        } else {
            $this->layoutView->render($this->sessionModel->handleIsLoggedIn(), $this->loginView, $this->dateTimeView, $this->fileReaderView);
        }
    }
}