<title>Login</title>

<?php require_once('view/header.php'); ?>

<section>
  <!-- <div>
    <p>Op deze pagina kunnen beheerders en beheerder van bioscopen inloggen</p>
  </div> -->
  <div class="row">
    <div class="col-4 content">
      <h2>Beheerders login</h2>
      <form action="index.php?op=beHome" method="post">
        <label>Gebruikersnaam</label>
        <input class="form-control" value="" name="username" type="text" required="required" />
        <br />
        <label>Wachtwoord</label>
        <input class="form-control" name="password" type="password" required="required" />
        <br />
        <div class="row">
          <button type="submit" class="btn btnLogin" name="submit">Inloggen</button><button type="reset" class="btn btnLogin">Annuleren</button>
        </div>
      </form>
    </div>
  </div>

</section>

<?php require_once('view/footer.php'); ?>