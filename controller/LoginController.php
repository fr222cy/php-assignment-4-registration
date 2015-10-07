<?php



class LoginController
{
    
    
public function __construct(LoginView $v, LoginModel $lm, LoginSession $ls, DateTimeView $dtv, LayoutView $lv , RegisterDAL $rd)
{
    $this->v = $v;
    $this->lm = $lm;
    $this->ls = $ls;
    $this->dtv = $dtv;
    $this->lv = $lv;
    $this->rd = $rd;
}

public function init()
{
    $this->userPost();
    $this->userWantsToLogout();
    
    //If a registration has happend, print it in the view and set the name of user in the inputbox.
    if(isset($_SESSION['Username']))
    {
        $username = $_SESSION['Username'];
        $this->v->setRegistered($username);
        unset($_SESSION['Username']);
    }
    
    $this->lv->render($this->lm->loginStatus(),false, $this->v, $this->dtv);
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
            $this->lm->checkLogin($username, $password, $this->rd);
        
            //If no Exception is thrown, the user has successfully logged in.
            if($this->ls->loginMessage())
            {
                $this->v->setWelcomeMessage();   
            }
            else
            {
                $this->v->statusMessage('');    
            }
        }   
        //Throw Exception if the user fails to login.
        catch(Exception $e)
        {
            $this->v->statusMessage($e -> getMessage());
        }
    }
}

//Gets the Username input.
private function username()
{
    return $this->v->getUsername();
}

//Gets the Password input.
private function password()
{
    return $this->v->getPassword();
}

//Calls userLogout that destroys the 
public function userWantsToLogout()
{
    if($this->v->logout())
    {
        $this->lm->userLogout();
    
        if(!$this->ls->loginMessage())
        {
            $this->v->setLogoutMessage();
        }
        else
        {
            $this->v->statusMessage(''); 
        }
    }
}



}







