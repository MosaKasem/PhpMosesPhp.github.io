<?php

class RouteController {
    
    // for controllers
    private $formSecurity    ; // Controllers

    // for Models folder
    private $register        ; // Model
    private $database        ; // Model

    // for Views folder
    private $loginView       ; // View
    private $layoutView      ; // View
    private $registerView    ; // View
    private $dateTimeView    ; // View
    private $loginController ; // View



    public function __construct() {
        
        // Model's folder decleration
        $this->database         = new        Database();

        // View's Folder decleration
        $this->loginView        = new       LoginView();
        $this->layoutView       = new      LayoutView();
        $this->registerView     = new    RegisterView();
        $this->dateTimeView     = new    DateTimeView();
        // $this->loginController  = new LoginController();
    }
    public function start() {
        // var_dump($_POST);
        // var_dump($_GET);
        // if ($this->loginView->getuser)
        
    if ($this->loginView->userWantsToLogin()) {
        $username = $this->loginView->getRequestUserName();
        $password = $this->loginView->getRequestPassword();
        // $successLogin = $
        // $this->loginController->loginValidation($username, $password);
    }
    

    if ($this->registerView->userWantsToRegister()) {
        $username = $this->registerView->getRequestUserName();
        $password = $this->registerView->getRequestPassword();
/*         if ($username == "Admin" && $password == "Admin") {
            $this->registerView->setMessage('User exists, pick another username.');
        } */
    }
        $this->layoutView->render(false, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}