<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
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
  </footer>
</body>

</html>