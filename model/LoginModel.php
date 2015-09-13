<?php 

class LoginModel
{

private $correctUN;
private $correctPW;
private $message;

public function checkLoginDetails($username, $password)
{
var_dump($username);
var_dump($password);
$correctUN = "Admin";
$correctPW = "password";
$message = "";
if($username == $correctUN && $password == $correctPW)
{
    $message = "Welcome!";
}

else if ($username == "")
{
    $message = "UserName is missing";
}
else if ($password == "")
{
    $message = "Password is missing";
}

else
{
    $message = "Wrong name or password";
}
   $this->message = $message; 
}
    
public function response()
{
    return $this->message;
}
    
    
}




