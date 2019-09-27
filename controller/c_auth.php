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
    if ($reslt == 'login') {
      include_once('view/beheerder/beheerder.php');
    } else {
      // header('Location: index.php?op=loginForm');
      // exit;
      // include_once('view/loginForm.php');
    }
  }
}
?>
<?php
class LoginSession
{

  public function __construct()
  {
    $this->model = new AuthModel();
  }
  public function getUser()
  {
    return $this->model->getUser();
  }
}
