<?php

class RouteController {

    private static $login       = 'LoginView::Login'            ;
	private static $logout      = 'LoginView::Logout'           ;
	private static $name        = 'LoginView::UserName'         ;
	private static $password    = 'LoginView::Password'         ;
	// private static $cookieName = 'LoginView::CookieName';
	// private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep        = 'LoginView::KeepMeLoggedIn'   ;
	private static $messageId   = 'LoginView::Message'          ;
    
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



    public function __construct() {
        
        // Model's folder decleration
        $this->database     = new     Database();

        // View's Folder decleration
        $this->loginView    = new    LoginView();
        $this->layoutView   = new   LayoutView();
        $this->registerView = new RegisterView();
        $this->dateTimeView = new DateTimeView();
        $this->formSecurity = new LoginController();
    }
    public function start() {
        // var_dump($_POST);
        // var_dump($_GET);
        // if ($this->loginView->getuser)
        $username = $this->loginView->getRequestUserName();
        $this->formSecurity->loginValidation($username);
        $this->layoutView->render(false, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}