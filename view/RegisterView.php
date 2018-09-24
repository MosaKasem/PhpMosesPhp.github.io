<?php

class RegisterView {
    private static $sessionKey = "register";
    private static $username = "RegisterView::UserName";
    private static $password = "RegisterView::Password";
    private static $passwordRepeat = "RegisterView::PasswordRepeat";
	private static $register = "RegisterView::Register";
	private static $messageId = "RegisterView::Message";
	private $message;

	public function __construct() {
		$this->message = '';
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
					
					<label for="' . self::$passwordRepeat . '">Confirm Password :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />

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
	public function userWantsToRegister() {
		return isset($_POST[self::$register]) && $this->validateInput();
	}
	private function validateInput() {
		$userName = $this->getRequestUserName();
		$passWord = $this->getRequestPassword();
		if (preg_match('/[^A-Za-z0-9]/', $userName)) {
			$this->setMessage("Username contains invalid characters.");
			return false;
		}
/* 		if (strlen($userName) < 3 && strlen($passWord) < 6) {
			$this->setMessage('Username has too few characters, at least 3 characters.');
		} */
		if (empty($userName) || strlen($userName) < 3) {
			$this->setMessage('Username has too few characters, at least 3 characters.');
			return false;
		}
		if (empty($password) || strlen($passWord) < 6) {
			$this->setMessage('Password has too few characters, at least 6 characters.');
			return false;
		}


/* 
		if (empty($userName) && empty($passWord)) {
			$this->setMessage("Username is missing");
			return false;
		}
		if (empty($passWord)) {
			$this->setMessage('Password is missing');
			return false;
		}
		if (empty($userName)) {
			$this->setMessage('Username is missing');
			return false;
		} */
		if ($passWord !== $_POST[self::$passwordRepeat]) {
			$this->setMessage('Password do not match.');
			return false;
		}

		return true;
	}
	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage($message) {
		return $this->message;
	}

}