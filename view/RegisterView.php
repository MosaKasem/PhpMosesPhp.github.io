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
		if(isset($_POST[self::$register])) {
			$userRequest = $this->formValidation();
			var_dump($userRequest);
		}

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
	private function formValidation() {
		if ($_POST[self::$username] != trim($_POST[self::$username])) {
			echo FALSE;
		}
		// COPY AND PASTE FROM FUNCTION.TRIM.PHP
		// THIS FUCKING SUCKS
		$text   = "\t\tThese are a few words :) ...  " . "<br>";
		$binary = "\x09Example string\x0A" . "<br>";
		$hello  = "Hello World" . "<br>";
		var_dump($text, $binary, $hello);

		print "\n";

		$trimmed = trim($text);
		var_dump($trimmed);

		$trimmed = trim($text, " \t.") . "<br>";
		var_dump($trimmed);

		$trimmed = trim($hello, "Hdle");
		var_dump($trimmed);

		$trimmed = trim($hello, 'HdWr');
		var_dump($trimmed);

		// trim the ASCII control characters at the beginning and end of $binary
		// (from 0 to 31 inclusive)
		$clean = trim($binary, "\x00..\x1F");
		var_dump($clean);
		return strip_tags($_POST[self::$username]) && strip_tags($_POST[self::$password]) && strip_tags($_POST[self::$password2]);
	}
}