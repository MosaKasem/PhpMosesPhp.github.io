<?php

session_start();

class LayoutView {
  
  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          <a href="?register">Register</a>
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response() . '

              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
/*   private function renderRegisterForm($isLoggedIn) {
    if (!$isLoggedIn) {
      return '<h1>TODO: RENDER form register? </h1>';
    }
  } */
  public function killSession($isLoggedIn) : bool {
    if ($isLoggedIn) {
      return "<h1>TODO: Kill session</h1>";
    }
  }
}
