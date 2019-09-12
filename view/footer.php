<!DOCTYPE html>
    <html>
       
  <footer>
    <h2>Login</h2>
    <?php
    include_once "controller/c_auth.php";
    $controller = new AuthController();
    $controller->invoke();
    ?>
  </footer>
    </html>