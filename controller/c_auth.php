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
    $reslt = $this->model->getlogin();     // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
    if ($reslt == 'login') {
      include 'view/login/afterLogin.php';
    } else {
      include 'view/login/loginForm.php';
    }
  }
}
