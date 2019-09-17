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
    $reslt = $this->model->getUser();
    if ($reslt == 'login') {
      require_once('view/beheerder/beheerder.php');
    }
  }
}
?>
<?php
// class LoginSession
// {

//   public function __construct()
//   {
//     $this->model = new AuthModel();
//   }
//   public function getUser()
//   {
//     if (!empty($_POST)) {
//       if (isset($_POST['username']) && isset($_POST['password'])) {
//         // Getting submitted user data from database
//         $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
//         $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
//         $stmt->bind_param('s', $_POST['username']);
//         $stmt->execute();
//         $result = $stmt->get_result();
//         $user = $result->fetch_object();

//         // Verify user password and set $_SESSION
//         if (password_verify($_POST['password'], $user->password)) {
//           $_SESSION['user_id'] = $user->ID;
//         }
//       }
//     }
//   }
// }
