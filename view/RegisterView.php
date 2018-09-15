<?php

class RegisterView {
    private static $sessionKey = "register";
    private static $username = "RegisterView::username";
    private static $password = "RegisterView::password";


    
	private function generateRegisterFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Register - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$username . '">Username :</label>
					<input type="text" id="' . self::$username . '" name="' . self::$username . '" value="" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

				</fieldset>
			</form>
		';
	}
}