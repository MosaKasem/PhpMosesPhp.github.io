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



    public function __construct() {
        
        // Model's folder decleration
        $this->formPost     = new     FormPost();
        $this->database     = new     Database();

        // View's Folder decleration
        $this->loginView    = new    LoginView();
        $this->layoutView   = new   LayoutView();
        $this->registerView = new RegisterView();
        $this->dateTimeView = new DateTimeView();
        $this->formSecurity = new FormSecurity();
    }
    public function start() {
        $this->formPost->register();
        $this->layoutView->render(false, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}