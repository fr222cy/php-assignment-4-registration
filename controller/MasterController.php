<?php

//INCLUDE THE FILES NEEDED...
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('view/LoginView.php');
require_once('view/RegisterView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/LoginModel.php');
require_once('model/LoginSession.php');
require_once('model/RegisterModel.php');
class MasterController
{
    public function init()
    {
        //CREATE OBJECT OF THE MODEL
        $loginModel = new LoginModel();
        $loginSession = new LoginSession();
        $registerModel = new RegisterModel();
        //CREATE OBJECTS OF THE VIEWS
        $loginView = new LoginView($loginModel);
        $registerView = new RegisterView();
        $dateTimeView = new DateTimeView();
        $layoutView = new LayoutView();
        //CREATE OBJECTS OF THE CONTROLLERS
        $loginController = new LoginController($loginView,$loginModel,$loginSession,$dateTimeView, $layoutView);
        $registerController = new RegisterController($registerView,$registerModel,$dateTimeView, $layoutView);
        
        //Checks if the url ends with register or not.
        $uri = $_SERVER["REQUEST_URI"];
        
        $uri = explode("?",$uri);
        
        if (count($uri) > 1 && $uri[1] == "register")
        {
        $registerController->init();
        }
        else
        {
        $loginController->init();
        }
        
        
        
        //render PARAM-> (user logged in?, user in registry page?, loginview, datetime, registryview.)
        
    }
    
    
}