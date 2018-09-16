<?php

class RouteController {



    public function start() {
        $session = new Session();
        $database = new Database();
        $loginView = new LoginView();
        $layoutView = new LayoutView();
        $registerView = new RegisterView();
        $dateTimeView = new DateTimeView();

        $layoutView->render(false, $loginView, $dateTimeView);
        $session->databaseC();
    }

}