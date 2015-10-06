<?php


class RegisterModel
{
    private $users;
    public function checkRegisterCredentials($username, $password, $passwordRepeat, RegisterDAL $rd)
    {
        
        
        //Error handling
        
        //Does the current user already exist?.
        $this->users = $rd->getUsers();
        if(!$this->users)
        {
            $this->users = array();
        }
        
        foreach($this->users as $value)
        {
            if($value->getUsername() == $username)
            {
                throw new Exception("User exists, pick another username.");
            }
        }
        
        
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
        
     
        
        if($username != strip_tags($username) || $password != strip_tags($password))
        {
            throw new Exception("Username contains invalid characters.");
        }
        
        
        
        $user = new User($username, $password);
        
        return $user;
        
        
        
        //TODO: Continue if statements.
        
    }
    
    
}