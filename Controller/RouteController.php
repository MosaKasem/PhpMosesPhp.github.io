<?php

class RouteController {
    
    // for This current folder.
    private $pageswap        ;

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

        // $layoutView->render(false, $loginView, $dateTimeView);
    }
    public function start() {
        var_dump($_GET);
        if (isset($_GET['register'])) {

            $this->layoutView->render(false, $this->registerView, $this->dateTimeView);
        } else {
            $this->layoutView->render(false, $this->loginView, $this->dateTimeView);
        }
        // $this->layoutView->render(false, $this->loginView, $this->dateTimeView);
    }

}