<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');
require_once('model/LoginSession.php');
//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');


//CREATE OBJECT OF THE MODEL
$lm = new LoginModel();
$ls = new LoginSession();
//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($lm);
$dtv = new DateTimeView();
$lv = new LayoutView();
//CREATE OBJECT OF THE CONTROLLER
$lc = new LoginController($v,$lm,$ls);

//INITIALIZE CONTROLLER.
$lc->init();


$lv->render($lm->loginStatus(), $v, $dtv);

