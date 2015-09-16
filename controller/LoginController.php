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
        $this->userPost();
        $this->userWantsToLogout();
    }
    
    //Checks if something is posted.
    public function userPost()
    {
        if($this->v->isPosted())
        {
            $username = $this->username();
            $password = $this->password();
            try
            {
              $this->lm->checkLogin($username, $password);  
            }
            //
            catch(Exception $e)
            {
                $this->v->statusMessage($e);
            }
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
    
    public function userWantsToLogout()
    {
        if($this->v->logout())
        {
            $this->lm->userLogout();
        }
    }
    

    
   

    
    
}







