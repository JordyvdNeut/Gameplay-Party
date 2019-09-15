<?php

class AuthModel
{
  public function getloginRedact()
  {
    // here goes some hardcoded values to simulate the database
    if (isset($_REQUEST['Rusername']) && isset($_REQUEST['Rpassword'])) {
      if ($_REQUEST['Rusername'] == 'admin' && $_REQUEST['Rpassword'] == 'admin') {
        require_once ("controller/c_gpp.php");
        $GPPController = new GPPController();
        return $GPPController->handleRequest();
      } else {
        return 'invalid user';
      }
    }
  }
}
