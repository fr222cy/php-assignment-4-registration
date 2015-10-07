<?php 


class LoginModel
{

    private $message;

    public function __construct()
    {
        if(!isset($_SESSION["loginStatus"]))
        {
            $_SESSION["loginStatus"] = false;     
        }
    }
    //CHECKLOGIN
    //Processes the logindetails that the user has typed in. 
    //Returns errormessage if it fails. sets "LOGINSTATUS" to true if succeed.
    public function checkLogin($username, $password, RegisterDAL $rd)
    {
        //hash the inputed password.
        if(strlen($password) >= 6)
        {
            $password = hash('sha1', $password);   
        }
        
        
        
        $users = $rd->getUsers();
         
        if(!$users)
        {
            $users = array();
        }
        
        foreach($users as $value)
        {
            $correctUN = $value->getUsername();
            $correctPW = $value->getPassword();
            
            $message = "";
        
            if($username == $correctUN && $password == $correctPW)
            {
                $_SESSION["loginStatus"] = true;
                break;
            }  
        } 
        if($_SESSION["loginStatus"] == false)
        {
            
            
            if ($username == "")
            {
                throw new Exception("Username is missing");
            }
            if ($password == "")
            {
                throw new Exception("Password is missing");
            }
            else
            {
                throw new Exception("Wrong name or password");
            }
        }
       
        
        
    
    
    }
        
    public function userLogout()
    {
        unset($_SESSION['loginStatus']);
        session_destroy();
    } 
    
    public function loginStatus()
    {
        if(isset($_SESSION["loginStatus"]))
        {
            return $_SESSION["loginStatus"];  
        }
    } 

}






