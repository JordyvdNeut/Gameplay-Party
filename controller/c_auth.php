<?php
include_once('model/m_auth.php');
class AuthController
{
  public $model;
  public function __construct()
  {
    $this->model = new AuthModel();
  }
  public function invoke()
  {
    $reslt = $this->model->getloginRedact();     // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
    if ($reslt == 'login') {
      require_once('view/beheerder/beheerder.php');
    } else {
      require_once('view/login/loginForm.php');
    }
  }
}
