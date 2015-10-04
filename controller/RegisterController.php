<?php

class RegisterController
{
    
    public function __construct(RegisterView $rv,RegisterModel $rm, DateTimeView $dtv, LayoutView $lv )
    {
        $this->rv = $rv;
        $this->rm = $rm;
        $this->lv = $lv;
        $this->dtv = $dtv;
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
            
            $this->lm->checkRegisterCredentials($username, $password);
            
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
    
    //TODO: Get Repeated Password.
    
}