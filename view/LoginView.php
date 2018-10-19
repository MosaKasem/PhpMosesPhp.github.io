<?php

namespace view;

class LoginView {
	private static $login 			= 	'LoginView::Login';
	private static $logout 			= 	'LoginView::Logout';

	private static $name 			= 	'LoginView::UserName';
	private static $password	    =  	'LoginView::Password';

	private static $cookieName	    = 	'LoginView::CookieName';
	private static $cookiePassword  = 	'LoginView::CookiePassword';
	private static $keep 			= 	'LoginView::KeepMeLoggedIn';

	private static $messageId 		=	'LoginView::Message';
	

	private $message;
	private $session;

	public function __construct($sm) {
		$this->message = "";
		$this->session = $sm;
	}

	public function response() {
		$userIsLogged = $this->session->userIsLoggedIn();

		if ($userIsLogged) {
			$response = $this->generateLogoutButtonHTML($this->message);
		} else {
			$response = $this->generateLoginFormHTML($this->message);
		}
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML() {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $this->getMessage() .'</p>
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
					<p id="' . self::$messageId . '">' . $this->getMessage() . '</p>
					
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

	public function userWantsToLogin() {
		return isset($_POST[self::$login]) && $this->validateInput();
	}
	public function userWantsToLogOut() {
		if (isset($_POST[self::$logout])) 
			return true;
	}
	public function keepMeLoggedIn() {
		if (isset($_POST[self::$keep])) 
			return $_POST[self::$keep];
	}

	public function getRequestUserName() : string {
		return isset($_POST[self::$name]) ? $_POST[self::$name] : "";
	}
	public function getRequestPassword() : string {
		if (isset($_POST[self::$password])) {
			return $_POST[self::$password];
		} else {
			return "";
		}
	}

	public function setMessage ($msg) : void {
		$this->message = $msg;
	}
	public function getMessage () {
		return $this->message;
	}

	private function validateInput() {
		if (empty($this->getRequestUserName())) {
			$this->setMessage('Username is missing');
			return false;
		}
		if (empty($this->getRequestPassword())) {
			$this->setMessage('Password is missing');
			return false;
		}
		return true;
	}
	public function getUserCredentials() {
		if ($this->validateInput() == true) 
		{
			return new \model\UserCredentials($this->getRequestUserName(), $this->getRequestPassword());
		}
	}

	public function keepMeLoggedValidation($username, $password)
	{
		if ($this->keepMeLoggedIn()) {
			$this->saveCookie($username, $password);
			$this->setMessage('Welcome and you will be remembered');

		} else {
			$this->setMessage("Welcome");
		}
	}
	
	public function saveCookie($username, $password) { // 86400 is equivalent to 24 hours.
		setcookie(self::$cookieName, $username, time() + 86400, "/");
		setcookie(self::$cookiePassword, $password, time() + 86400, "/");
		// setcookie syntax : setcookie(name,value,expire,path,domain,secure,httponly)
	}

	
}
