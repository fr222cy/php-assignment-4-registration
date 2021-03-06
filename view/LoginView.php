<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private static $storedName = '';
	private $message;
	
	public function __construct(LoginModel $lm)
	{
	$this->lm = $lm;
	}

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		
		
		$response = "";
		$message = "";
		if($this->message != null)
		{
			$message = $this->message;
		}
		if($this->lm->loginStatus())
		{
			$response .= $this->generateLogoutButtonHTML($message);	
		}
		else
		{
			$response = $this->generateLoginFormHTML($message);
		}
		
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
	//Gets statusmessage from exception.
	public function statusMessage($e)
	{
		$this->message = $e ;
	}
	public function logout()
	{
		if(isset($_POST[self::$logout]))
		{
			return true;
		}
	}
	
	public function setWelcomeMessage()
	{
		$this->statusMessage('Welcome');
	}
	public function setLogoutMessage()
	{
		$this->statusMessage('Bye bye!');
	}
	public function setRegistered($username)
	{
		$this->statusMessage('Registered new user');
		self::$storedName = $username;
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
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . self::$storedName . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	// If the user has typed in username and password.
	public function isPosted()
	{
		if(isset($_POST[self::$login]))
		{
			self::$storedName = $_POST[self::$name];
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getUsername()
	{
		return $_POST[self::$name];
	}
	public function getPassword()
	{
		return $_POST[self::$password];
	}
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
		
	}
	
}