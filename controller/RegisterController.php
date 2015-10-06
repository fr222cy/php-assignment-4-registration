<?php

class RegisterController
{
    
    public function __construct(RegisterView $rv,RegisterModel $rm, DateTimeView $dtv, LayoutView $lv, RegisterDAL $rd)
    {
        $this->rv = $rv;
        $this->rm = $rm;
        $this->lv = $lv;
        $this->dtv = $dtv;
        $this->rd = $rd;
       
    }
    
    public function init()
    {
        $this->userRegister();
        $this->lv->render(false, true, $this->rv, $this->dtv);
    }
    
    public function userRegister()
    {
        if($this->rv->hasPressedRegister())
        {
            $username = $this->newUsername();
            $password = $this->newPassword();
            $passwordRepeat = $this->newPasswordRepeat();
            
            try
            {
               //Check if the credentials is correct, then return a user object.
               $user = $this->rm->checkRegisterCredentials($username, $password, $passwordRepeat,$this->rd);  
               $this->rd->AddUser($user); 
               //Adds the user to database.bin
           
               $_SESSION['Username'] = $username;
               header('Location:?');
            }
            catch(Exception $e)
            {
                $this->rv->statusMessage($e -> getMessage());
            }
            
        }
        
    }
    
    private function newUsername()
    {
        return $this->rv->getNewUsername();
    }
    
    private function newPassword()
    {
        return $this->rv->getNewPassword();
    }
    
    private function newPasswordRepeat()
    {
        return $this->rv->getPasswordRepeat();
    }
    
   
    
}