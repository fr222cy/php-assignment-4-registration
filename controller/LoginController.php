<?php



class LoginController
{
    

    public function __construct(LoginView $v)
    {
        
        $this->v = $v;
        
        
        $this->isSomethingPosted();
        
        
        
    }
    
    
    public function isSomethingPosted()
    {
        if($this->v->isPosted())
        {
            echo "Du har skrivit in ett användarnamn!";
            return true;
        }
        else
        {
            echo "You need to type in an Username!";
            return false;
        }
    }
    
    public function username()
    {
        
    }
    
    public function password()
    {
        
    }
    
    
}







