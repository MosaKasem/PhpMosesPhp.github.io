<?php

class RegisterView {
    private static $sessionKey = "register";
    private static $username = "RegisterView::Username";
    private static $password = "RegisterView::Password";
    private static $password2 = "RegisterView::Password2";
	private static $register = "RegisterView::Register";
	private static $messageId = "RegisterView::Message";
	private $message;

	public function __construct() {
		$this->message = 'Message';
	}
	
	public function response() {
		// $message = 'Message';

		$response =	$this->generateRegisterFormHTML($this->message);

		return $response;
	}
    
	private function generateRegisterFormHTML($message) {
		return '
			<form method="post" action="?register"> 
				<fieldset>
					<legend>Register - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$username . '">Username :</label>
					<input type="text" id="' . self::$username . '" name="' . self::$username . '" value="" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					
					<label for="' . self::$password2 . '">Confirm Password :</label>
					<input type="password" id="' . self::$password2 . '" name="' . self::$password2 . '" />

					<input type="submit" name="' . self::$register . '" value="register" />

				</fieldset>
			</form>
		';
	}
	public function getRequestUserName() {
		if (isset($_POST[self::$username])) {
			return $_POST[self::$username];
		}

	}
	public function getRequestPassword() {
		if (isset($_POST[self::$password])) {
			return $_POST[self::$password];
		}

	}
	public function UserWantsToRegister() {
		if (isset($_POST[self::$register])) {
			$this->validateInput();
		}
	}
	private function validateInput() {
		$userName = $this->getRequestUserName();
		$passWord = $this->getRequestPassword();
		var_dump($userName);
		var_dump($passWord);
		if (empty($userName) && empty($passWord)) {
			$this->setMessage("Username is missing");
		}
		if (empty($passWord)) {
			$this->setMessage('Password is missing');
		}
		if (preg_match('/[^A-Za-z0-9]/', $userName)) {
			$this->setMessage("Invalid username");
		}
		// if ()
	}
	public function setMessage($message) {
		$this->message = $message;
	}

/* 	private function formValidation() {
		return strip_tags($_POST[self::$username]) && strip_tags($_POST[self::$password]) && strip_tags($_POST[self::$password2]);
	} */
}