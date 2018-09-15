<?php
session_start();
class RouteController {

    private $database;
    private $loginView;
    private $layoutView;
    private $registerView;
    private $dateTimeView;

    public function __construct() {

        $this->database = new Database();
        $this->loginView = new LoginView();
        $this->layoutView = new LayoutView();
        $this->registerView = new RegisterView();
        $this->dateTimeView = new DateTimeView();
    }

    public function start() {

        return $this->layoutView->render(false, $this->loginView, $this-dateTimeView);
    }

}