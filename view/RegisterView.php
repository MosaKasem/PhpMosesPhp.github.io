<?php

namespace view;

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

		$response =	$this->generateRegisterFormHTML($this->message);

		return $response;
	}
    
	private function generateRegisterFormHTML($message) {
		return '
			<form method="post">
				<fieldset>
					<legend>Register a new user - Write Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->getMessage() . '</p>

					<label for="' . self::$username . '">Username :</label>
					<input type="text" id="' . self::$username . '" name="' . self::$username . '" value="' . strip_tags($this->getRequestUserName()) . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					
					<label for="' . self::$passwordRepeat . '">Confirm Password :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />

					<input type="submit" name="' . self::$register . '" value="register" />

				</fieldset>
			</form>
		';
	}
	public function userWantsToRegister() {
		return isset($_POST[self::$register]) && $this->validateInput();
	}
	
	public function getRequestUserName() {
		if (isset($_POST[self::$username])) return trim($_POST[self::$username]);
	}
	public function getRequestPassword() {
		if (isset($_POST[self::$password])) return trim($_POST[self::$password]);
	}

	private function validateInput() {
		$userName = $this->getRequestUserName();
		$passWord = $this->getRequestPassword();

		if (preg_match('/[^A-Za-z0-9]/', trim($userName))) {
			$this->setMessage("Username contains invalid characters.");
			return false;
		} if (empty($userName) && empty($passWord)) {
			$this->setMessage('Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.');
			return false;
		} if (empty($userName) || strlen($userName) < 3) {
			$this->setMessage('Username has too few characters, at least 3 characters.');
			return false;
		} if (strlen($passWord) < 6) {
			$this->setMessage('Password has too few characters, at least 6 characters.');
			return false;
		}  else if ($passWord !== $_POST[self::$passwordRepeat]) {
			$this->setMessage('Passwords do not match.');
			return false;
		} 
		return true;
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}

}