<?php

class AuthModel
{
  public function getUser()
  {
    if (!empty($_POST)) {
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $hashed_password = hash('ripemd160', $_POST['password']);
        // Getting submitted user data from database
        $con = new mysqli("localhost", "root", "", "gpp");
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ? ");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        // Verify user password and set $_SESSION
        if ($hashed_password == $user->password) {
          $_SESSION['user_id'] = $user->user_id;
          $_SESSION['user_role'] = $user->role;
          return 'login';
        } else {
          echo "password False";
        }
      }
    
  }
}
}
