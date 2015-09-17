<?php 
session_start();

class LoginModel
{

private $message;


//CHECKLOGIN
//Processes the logindetails that the user has typed in. 
//Returns errormessage if it fails. sets "LOGINSTATUS" to true if succeed.

public function __construct()
{
    if(!isset($_SESSION["loginStatus"]))
    {
    $_SESSION["loginStatus"] = false;     
    }
}

public function checkLogin($username, $password)
{

$correctUN = "Admin";
$correctPW = "Password";
$message = "";

    if($username == $correctUN && $password == $correctPW)
    {
        $_SESSION["loginStatus"] = true;
      
    }
    else if ($username == "")
    {
        //$message = "Username is missing";
        throw new Exception("Username is missing");
    }
    else if ($password == "")
    {
        //$message = "Password is missing";
        throw new Exception("Password is missing");
    }
    else
    {
        //$message = "Wrong name or password";
        throw new Exception("Wrong name or password");
    }
 
}
    


public function userLogout()
{
    unset($_SESSION["loginStatus"]);
    session_destroy();
} 

public function loginStatus()
{
    if(isset($_SESSION["loginStatus"]))
    {
      return $_SESSION["loginStatus"];  
    }
    
} 

}






