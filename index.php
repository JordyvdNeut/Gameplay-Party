<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Gameplay Party</title>
</head>

<body>
  <!--<header class="container">Hallo!
    
  </header>-->

  <?php
  require_once('view/header.php');
  require_once('view/home.php');
  ?>
  <title>GPP</title>
</head>

<body>
  <header class="container"></header>

  <?php
  require "controller/c_users.php";
  $userController = new UserController;
  $userController->handleRequest();

  ?>

  <footer>
    <h2>Login</h2>
    <?php
    include_once "controller/c_auth.php";
    $controller = new AuthController();
    $controller->invoke();
    ?>
  </footer>
</body>

</html>