<title>Login</title>

<?php require_once('view/header.php'); ?>

  <section class="row">

    <div class="col-4 content">
      <h2>Redacteur</h2>
      <form action="index.php?op=beHome" method="post">
        <label>Gebruikersnaam</label>
        <input class="form-control" value="" name="username" type="text" required="required" />
        <br />
        <label>Wachtwoord</label>
        <input class="form-control" name="password" type="password" required="required" />
        <br />
        <div class="row">
          <button type="submit" class="btn" name="submit">Inloggen</button> <button type="reset" class="btn">Annuleren</button>
        </div>
      </form>
    </div>

    <div class="col-4 content">
      <h2>Bioscoop Beheerder</h2>
      <form action="index.php?op=beHome" method="post">
        <label>Gebruikersnaam</label>
        <input class="form-control" value="" name="username" type="text" required="required" />
        <br />
        <label>Wachtwoord</label>
        <input class="form-control" name="password" type="password" required="required" />
        <br />
        <div class="row">
          <button type="submit" class="btn" name="submit">Inloggen</button> <button type="reset" class="btn">Annuleren</button>
        </div>
      </form>
    </div>
    
  </section>

<?php require_once('view/footer.php'); ?>