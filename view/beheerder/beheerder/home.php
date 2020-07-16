<title>Beheerder</title>

<section>
  <div class="row">
    <div class="col-10 content bewerken">
      <h2>Reserveringen bekijken</h2>
      <form action="?op=searchReservering" method="POST">
        <h3>Zoek op datum</h3>
        <input class="form-control" type='date' name="datum" />
        <input class="btn" type="submit" value="Zoeken" />
      </form>
      <?= $content ?>
    </div>
  </div>
</section>