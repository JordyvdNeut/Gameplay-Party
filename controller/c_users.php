<?php
require_once 'model/m_GPPLogic.php';

class UserController
{
  public function __construct()
  {
    $this->GPPLogic = new GPPLogic();
  }

  public function __destruct()
  { }
  public function handleRequest()
  {
    try {
      $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
      switch ($op) {
        case 'loginForm':
          $this->collectLogin();
          break;
        case 'overons':
          $this->collectOverOns();
          break;
        case 'home':
          $this->collectHome();
          break;
      }
    } catch (ValidationException $e) {
      $errors = $e->getErrors();
    }
  }

  public function collectHome()
  {
    $template = $this->GPPLogic->reads();
    include_once 'view/home.php';
  }

  public function collectLogin()
  {
    include 'view/loginForm.php';
  }

  public function collectOverOns()
  {
    include_once 'view/over_ons.php';
  }
}
