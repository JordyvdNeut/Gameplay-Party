<title>Beheerder</title>

<section>
  <div class="row">
    <div class="col-10 content bewerken">
      <h2>Reserveringen per maand bekijken</h2>
      <form action="?op=searchReserveringMonth" method="POST">
        <h3>Zoek op maand</h3>
        <input class="form-control" type='number' name="month" />
        <input class="btn" type="submit" value="Zoeken" />
      </form>
      <?= $content ?>
    </div>
  </div>
</section>