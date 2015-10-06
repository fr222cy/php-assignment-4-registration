<?php 


class LoginModel
{

private $message;




public function __construct(RegisterDAL $rd)
{
    if(!isset($_SESSION["loginStatus"]))
    {
        $_SESSION["loginStatus"] = false;     
    }
}
//CHECKLOGIN
//Processes the logindetails that the user has typed in. 
//Returns errormessage if it fails. sets "LOGINSTATUS" to true if succeed.
public function checkLogin($username, $password)
{
    //TODO: CHECK IF USERNAME OR PASSWORD IS CORRECT!
    foreach($this->)
    $correctUN = "Admin";
    $correctPW = "Password";
    $message = "";

    if($username == $correctUN && $password == $correctPW)
    {
        $_SESSION["loginStatus"] = true;
    }
    else if ($username == "")
    {
        throw new Exception("Username is missing");
    }
    else if ($password == "")
    {
        throw new Exception("Password is missing");
    }
    else
    {
        throw new Exception("Wrong name or password");
    }

}
    
public function userLogout()
{
    unset($_SESSION['loginStatus']);
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






