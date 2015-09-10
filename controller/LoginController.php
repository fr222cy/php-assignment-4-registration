<?php



class LoginController
{
    

    public function __construct(LoginView $v)
    {
        $this->v = $v;
    }
    //init LoginController...
    public function init()
    {
        $this->isSomethingPosted();
        $this->username();
        $this->password();
    }
    
    
    public function isSomethingPosted()
    {
        if($this->v->isPosted())
        {
            echo "You have typed in your Username and the Password!";
            return true;
        }
        else
        {
            echo "You have NOT typed in the Username or Password";
            return false;
        }
    }
    public function username()
    {
        $username = $this->v->getUsername();
    }
    public function password()
    {
        $password = $this->v->getPassword();
    }
    

    
    
}







