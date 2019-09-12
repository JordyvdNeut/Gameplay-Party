<?php

class AuthModel
{
  public function getlogin()
  {
    // here goes some hardcoded values to simulate the database
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
      if ($_REQUEST['username'] == 'admin' && $_REQUEST['password'] == 'admin') {
        include("controller/c_gpp.php");
         $GPPController = new GPPController();
         return "login";
         return $GPPController->handleRequest();
      } else {
        return 'invalid user';
      }
    }
  }
}
