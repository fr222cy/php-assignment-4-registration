<?php


class RegisterModel
{
    
    public function checkRegisterCredentials($username, $password, $passwordRepeat, RegisterDAL $rd)
    {
        
        
        
        if(strlen($username) < 3)
        {
            if(strlen($password) < 6)
            {
             throw new Exception("Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters");  
            }
         throw new Exception("Username has too few characters, at least 3 characters.");
        }
        
        if(strlen($password) < 6)
        {
            throw new Exception ("Password has too few characters, at least 6 characters");
        }
        
        if($password != $passwordRepeat)
        {
            throw new Exception("Passwords do not match");
        }
        
        $user = new User($username, $password);
        
        return $user;
        
        
        
        //TODO: Continue if statements.
        
    }
    
    
}