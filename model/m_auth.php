<?php

class AuthModel
{
  public function getUser()
  {
    if (!empty($_POST)) {
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $hashed_password = hash('ripemd160', $_POST['password']);
        $con = new mysqli("localhost", "root", "", "gpp");
        $stmt = $con->prepare("SELECT * FROM users WHERE user_name = ? ");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        // Verify user password and set $_SESSION
        if ($hashed_password == $user->password) {
          $_SESSION['user_id'] = $user->user_id;
          $_SESSION['user_role'] = $user->rol_id;
          $_SESSION['bios_id'] = $user->bioscoop_id;
          header('Location: index.php?op=beHome');
        } else {
          echo "password False";
        }
      }
    }
  }
}
