<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.scss">
  <title>GGP Beheerder</title>
</head>

<body>
  <header class="container"></header>

  <?php
  require "controller/c_gpp.php";
  $GPPController = new GPPController;
  $GPPController->handleRequest();
  ?>

</body>

</html>