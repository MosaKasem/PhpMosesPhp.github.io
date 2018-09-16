<?php

class RouteController {



    public function start() {
        $register = new Register();
        
        $database = new Database();
        $loginView = new LoginView();
        $layoutView = new LayoutView();
        $registerView = new RegisterView();
        $dateTimeView = new DateTimeView();

        echo "blabla";

        // $layoutView->render(false, $loginView, $dateTimeView);

    }

}