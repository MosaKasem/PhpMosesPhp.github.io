<?php

class RouteController {

    private $isLoggedIn      ;
    
    // for controllers
    private $formSecurity    ; // Controllers

    // for Models folder
    private $register        ; // Model
    private $database        ; // Model
    private $sessionModel    ; // Model
    private $loginModel      ; // Model

    // for Views folder
    private $loginView       ; // View
    private $layoutView      ; // View
    private $registerView    ; // View
    private $dateTimeView    ; // View
    private $loginController ; // View



    public function __construct() {
        
        // Model's folder decleration
        $this->loginModel       = new      LoginModel();
        $this->database         = new        Database();

        // View's Folder decleration
        $this->loginView        = new       LoginView();
        $this->layoutView       = new      LayoutView();
        $this->registerView     = new    RegisterView();
        $this->dateTimeView     = new    DateTimeView();
        $this->sessionModel     = new    SessionModel();
        // $this->loginController  = new LoginController();
    }
    public function start() {
        $isLoggedIn = false;
        // var_dump($_POST);
        // var_dump($_GET);
        // if ($this->loginView->getuser)
    if ($this->loginView->userWantsToLogin()) {
        $username = $this->loginView->getRequestUserName();
        $password = $this->loginView->getRequestPassword();
        $successLogin = $this->loginModel->validateLogin($username, $password);
		if ($successLogin) {
            $this->sessionModel->storeUserToSession($username);
            $this->loginView->setMessage("Welcome");
            $isLoggedIn = true;
		} else {
			$this->loginView->setMessage('Wrong name or password');
		}
        // $successLogin = $
        // $this->loginController->loginValidation($username, $password);
    }
    

    if ($this->registerView->userWantsToRegister()) {
        $username = $this->registerView->getRequestUserName();
        $password = $this->registerView->getRequestPassword();
        $isLoggedIn = false;
/*         if ($username == "Admin" && $password == "Admin") {
            $this->registerView->setMessage('User exists, pick another username.');
        } */
    }
    // $isLoggedIn = false;
        $this->layoutView->render($isLoggedIn, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}