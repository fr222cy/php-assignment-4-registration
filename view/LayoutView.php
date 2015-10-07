<?php


class LayoutView {
  
  public function render($isLoggedIn,$isRegisterPage, $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login & Register</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderIsRegistrating($isRegisterPage) . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) 
  {
    if ($isLoggedIn) 
    {
      return '<h2>Logged in</h2>';
    }
    else
    {
      return '<h2>Not logged in</h2>';
    }
  }
  
   function renderIsRegistrating($isRegisterPage)
  {
    
      if(!isset($_SESSION["loginStatus"]))
      {
         $_SESSION["loginStatus"] = null;
      }
      
      //If the user is not logged in -> show the registration tab.
      if(!$_SESSION["loginStatus"])
      {
        if(!$isRegisterPage )
        {
          return '<a href=?register>Register a new user</a> ';
        }
        else 
        {
          return '<a href=?>Back to login</a>';
        }  
      }
 }
}
