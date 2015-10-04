<?php

class RegisterModel
{
    
    public function checkRegisterCredentials($username, $password)
    {
        
        
        if(strlen($username) < 3)
        {
            
            if(strlen($password) < 6)
            {
             throw new Exception("Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters");  
            }
         throw new Exception("Username has too few characters, at least 3 characters.");
        }
        
        //TODO: Continue if statements.
        
    }
    
    
}