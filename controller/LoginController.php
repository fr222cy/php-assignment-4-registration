<?php



class LoginController
{
    
    public function __construct(LoginView $v, LoginModel $lm)
    {
        $this->v = $v;
        $this->lm = $lm;
    }
    
    public function init()
    {
        $this->isSomethingPosted();
    }
    
    //Checks if something is posted.
    public function isSomethingPosted()
    {
        if($this->v->isPosted())
        {
            $username = $this->username();
            $password = $this->password();
            
            echo "<br>LoginController POSTED:true";
            $this->lm->checkLoginDetails($username, $password);
        
            
        }
        else
        {
            echo "<br>LoginController POSTED:false";
            return false;
        }
    }
    //Gets the Username input.
    public function username()
    {
        return $this->v->getUsername();

    }
    //Gets the Password input.
    public function password()
    {
        return $this->v->getPassword();
    }
    

    
   

    
    
}







