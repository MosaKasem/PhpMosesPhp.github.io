<?php

class RouteController {
    
    // for controllers
    private $formSecurity    ;

    // for Models folder
    private $register        ;
    private $database        ;

    // for Views folder
    private $loginView       ;
    private $layoutView      ;
    private $registerView    ;
    private $dateTimeView    ;



    public function __construct() {
        
        // Model's folder decleration
        $this->register     = new     Register();
        $this->database     = new     Database();

        // View's Folder decleration
        $this->loginView    = new    LoginView();
        $this->layoutView   = new   LayoutView();
        $this->registerView = new RegisterView();
        $this->dateTimeView = new DateTimeView();
        $this->formSecurity = new FormSecurity();
    }
    public function start() {

        $this->layoutView->render(false, $this->loginView, $this->dateTimeView, $this->registerView);
    }

}