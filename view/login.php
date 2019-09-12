<html>

<head></head>

<body>
  <?php
  echo $reslt;
  ?>
  <form action="" method="POST">
    <p>
      <label>Gebruikersnaam</label>
      <input id="username" value="" name="username" type="text" required="required" /><br>
    </p>
    <p>
      <label>Wachtwoord</label>
      <input id="password" name="password" type="password" required="required" />
    </p>
    <br />
    <p>
      <button type="submit" name="submit"><span>Inloggen</span></button> <button type="reset"><span>Annuleren</span></button>
    </p>
  </form>
</body>

</html>