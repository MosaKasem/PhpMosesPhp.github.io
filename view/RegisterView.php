<?php

class RegisterView {
    private static $sessionKey = __NAMESPACE__ . __CLASS__ . "register";
    private static $username;
    private static $password;
    // private static $password2; // look up password confirmation.
    public function userWantsToRegister() : bool {
        return isset($_GET[$sessionKey]);
    }
    
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