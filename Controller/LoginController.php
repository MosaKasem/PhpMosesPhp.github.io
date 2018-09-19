<?php
class LoginController {
    private $message;

    public function __construct() {
        $this->message = new LoginView();
    }
    public function loginValidation ($username, $password) {
        if (!$username); {
            // var_dump($_GET);
            $this->message = "username is missing"; 
            // var_dump($this->message);   
            // var_dump($_POST["LoginView::Login"]);
        }
        $this->message = "username is missing"; 
        // echo $username;
    }
}