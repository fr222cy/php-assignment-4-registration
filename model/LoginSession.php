<?php

class LoginSession
{

public function __construct()
{
    if(!isset($_SESSION['isUpdated']))
    {
        $_SESSION['isUpdated'] = false;	
    }
    
}
//Return true if "isUpdated"SESSION is true
//Returns false is "isUpdated"SESSION is false
public function loginMessage()
{
    if(!$_SESSION['isUpdated'])
    {
        $_SESSION['isUpdated'] = true;
        return true;
    }
    else
    {
        return false;
    }
}




}