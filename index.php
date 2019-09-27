<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  session_start();


  require_once "controller/c_route.php";
  $routeController = new RouteController;
  $routeController->handleRequest();

  require_once "controller/c_auth.php";
  $controller = new AuthController();
  $controller->invoke();

  // require_once 'controller/c_bioscopen.php';
  // $controller = new BiosController();
  // $controller->handleRequest();
  ?>
</body>

</html>