<?php
class LoginController {
    private $message;
    public function loginValidation ($username) {
        if (!$username); {
            // var_dump($_GET);
            var_dump($_POST["LoginView::Login"]);
        }
        echo $username;
    }
}