<!DOCTYPE html>
<html lang="en">

<section>
  <div class="login">
    <h2>Bioscoop beheerder</h2>
    <form action="index.php" method="post">
      <p>
        <label>Gebruikersnaam</label>
        <input class="form-control" value="" name="BBusername" type="text" required="required" /><br>
      </p>
      <p>
        <label>Wachtwoord</label>
        <input class="form-control" name="BBpassword" type="password" required="required" />
      </p>
      <br />
      <p>
        <button type="submit" class="btn" name="submit"><span>Inloggen</span></button> <button type="reset" class="btn"><span>Annuleren</span></button>
      </p>
    </form>
  </div>
</section>

<section>
  <div class="login">
    <h2>Redacteur</h2>
    <form action="index.php" method="post">
      <p>
        <label>Gebruikersnaam</label>
        <input class="form-control" value="" name="Rusername" type="text" required="required" /><br>
      </p>
      <p>
        <label>Wachtwoord</label>
        <input class="form-control" name="Rpassword" type="password" required="required" />
      </p>
      <br />
      <p>
        <button type="submit" class="btn" name="submit"><span>Inloggen</span></button> <button type="reset" class="btn"><span>Annuleren</span></button>
      </p>
    </form>
  </div>
</section>

</html>