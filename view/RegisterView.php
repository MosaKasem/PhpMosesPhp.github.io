<?php

class RegisterView {
    private static $sessionKey = "register";
    private static $username = "RegisterView::Username";
    private static $password = "RegisterView::Password";
    private static $password2 = "RegisterView::Password2";
	private static $register = "RegisterView::Register";
	private static $messageId = "RegisterView::Message";
	private $message = null;
	
	public function response() {
		$message = '';

		$response =	$this->generateRegisterFormHTML($message);

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
		if(isset($_POST[self::$register])) {
			return $username;
		}
	}
	public function UserWantsToRegister() {
		if (isset($_POST[self::$register])) {
			$this->validateInput();
		} else {
			$message = "type sometihng dam it";
		}
		return false;
	}
	private function validateInput() {
		var_dump($_POST[self::$username]);
		if (preg_match('/[^A-Za-z0-9]/' ,$_POST[self::$username])) {
			echo "Invalid username";
		}
	}

/* 	private function formValidation() {
		return strip_tags($_POST[self::$username]) && strip_tags($_POST[self::$password]) && strip_tags($_POST[self::$password2]);
	} */
}