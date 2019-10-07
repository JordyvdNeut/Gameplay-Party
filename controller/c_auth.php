<?php
require_once('model/m_auth.php');
class AuthController
{
  public $model;
  public function __construct()
  {
    $this->model = new AuthModel();
  }
  public function invoke()
  {
    $reslt = $this->model->getUser();
  }
}
?>