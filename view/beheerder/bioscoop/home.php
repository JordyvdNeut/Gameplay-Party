<title>Bioscoop Beheerder</title>

<section>
  <div class="row">
    <div class="col-10 content bewerken">
      <h2>Bioscoop gegevens bekijken</h2>
      <div class="beschiksearch">
        <form action="?op=searchBeschikBios" method="POST">
          <h3>Zoek op datum</h3>
          <input class="form-control datebeschik" type='date' name="datum" />
          <input class="btn submitbeschik" type="submit" value="Zoeken" />
        </form>
      </div>
      <?= $content ?>
    </div>
  </div>
</section>