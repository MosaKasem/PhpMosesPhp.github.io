<?php

// namespace View; // Varför funkar inte namespace?


class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	// private static $cookieName = 'LoginView::CookieName';
	// private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	

	private $message;
	private $session;

	public function __construct() {
		$this->message = '';
		$this->session = new SessionModel();
	}



	/**
	 * Create HTTP response
	 * Should be called after a login attempt has been determined
	 * @return void BUT writes to standard output and cookies!
	 */
	public function response() {
		$userIsLogged = $this->session->loggedIn();
		if ($userIsLogged) {
			var_dump($this->message);
			$response = $this->generateLogoutButtonHTML($this->message);
		} else {
			$response = $this->generateLoginFormHTML($this->message);
		}

		// $response .= $this->generateLogoutButtonHTML($message);

		return $response;

	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->getRequestUserName() . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	public function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
		if (isset($_POST[self::$name])) {
			return $_POST[self::$name];
		}
	}
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	public function getRequestPassword() {
		//RETURN REQUEST VARIABLE: USERNAME
		if (isset($_POST[self::$password])) {
			return $_POST[self::$password];
		}
	}
	public function setMessage ($msg) {
		$this->message = $msg;
	}
	public function userWantsToLogin() {
			return isset($_POST[self::$login]) && $this->validateInput();
	}
	private function validateInput() {
		$username = $this->getRequestUserName();
		$password = $this->getRequestPassword();
		if ($username == "" || empty($username)) {
			$this->setMessage('Username is missing');
			return false;
		}
		if ($password == "") {
			$this->setMessage('Password is missing');
			return false;
		}
		return true;
		
	}

	
}
