<?php


class RegisterView
{
    private static $username = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $register = 'RegisterView::Register';
    private static $message  = 'RegisterView::Message';
    private static $storedName = '';
    
    public function __construct()
    {
        
    }
    
    public function response()
    {
    	$message ="";
    	
    	if($this->hasPressedRegister())
    	{
    	$message = $this->messageToUser;
    	}
    	
    	
        return $this->generateRegistrationFormHTML($message);
    }
    
    public function statusMessage($e)
	{
		$this->messageToUser = $e ;
	}

    
    private function generateRegistrationFormHTML($message)
    {
        return '
         <h2>Register new user</h2>
        
         <form method="post" >
         <fieldset>
         <legend>Register a new user - Write username and password</legend>
         <p id="'. self::$message .'"> '.$message.' </php>
         <br>
         <label for="' . self::$username . '">Username :</label>
	   	 <input type="text" id="' . self::$username . '" name="' . self::$username . '" value="'. self::$storedName .'" /> 
	   	 <br>
	   	 <label for="' . self::$password . '">Password :</label>
	   	 <input type="password" id="' . self::$password . '" name="' . self::$password . '" value="" /> 
	   	 <br>
	   	 <label for="' . self::$passwordRepeat . '">Repeat Password :</label>
	   	 <input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" value="" /> 
	   	 <br>
	   	 <input type="submit" name="' . self::$register . '" value="Register" />
	   	 
	   	 </fieldset>
	   	 </form>
         ';
    }
    
	public function hasPressedRegister()
	{
	    
		if(isset($_POST[self::$register]))
		{
			if(strlen($_POST[self::$username]) >= 3)
			{
		    self::$storedName = $_POST[self::$username];
			}
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getNewUsername()
	{
		return $_POST[self::$username];
	}
	
	public function getNewPassword()
	{
		return $_POST[self::$password];
	}
	
	public function getPasswordRepeat()
	{
		return $_POST[self::$passwordRepeat];
	}
    
}



