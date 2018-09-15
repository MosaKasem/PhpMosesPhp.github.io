<?php

class RouteController {

    private $database;
    private $loginView;

    public function __construct() {
        $this->database = new Database();
        $this->loginView = new LoginView();
    }

    public function start() {
        $this->loginView->render();
    }

}