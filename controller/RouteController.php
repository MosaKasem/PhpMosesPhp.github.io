<?php

// TODO: write to self != writing to reader
// TODO: 


class RouteController {

    private $isLoggedIn      ; // Variable
    
    private $formSecurity    ; // Controllers

    private $register        ; // Model
    private $database        ; // Model
    private $sessionModel    ; // Model
    private $loginModel      ; // Model


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
        // Event listener for login
    if ($this->sessionModel->getUserSession()) {
        $isLoggedIn = true;
        // var_dump($this->sessionModel->getUserSession());
    }
    if ($this->loginView->userWantsToLogin()) {

                        //Get username
        $username     = $this->loginView->getRequestUserName();
                        //Get password
        $password     = $this->loginView->getRequestPassword();

                        //Returns true or false
        $successLogin = $this->loginModel->validateLogin($username, $password);

                        //If keepMeLogged in is checked
        $cookie       = $this->loginView->keepMeLoggedIn();

		if ($successLogin) {

            $isLoggedIn = true;

            if ($this->loginView->keepMeLoggedIn()) {

                $this->loginView->saveCookie($username, $password);
                $this->loginView->setMessage('Welcome and you will be remembered');

            } else {
                $this->loginView->setMessage("Welcome");
            }

            if ($this->sessionModel->getUserSession()) {
                $this->loginView->setMessage('');   
            }

            $this->sessionModel->storeUserToSession($username);

		} else {
			$this->loginView->setMessage('Wrong name or password');
		}

    }
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
/*         if ($username == "Admin" && $password == "Admin") {
            $this->registerView->setMessage('User exists, pick another username.');
        } */
    }

        $this->layoutView->render($isLoggedIn, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}