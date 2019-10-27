<title>Beheerder</title>

<section>
  <div class="row">
    <div class="col-10 content bewerken">
      <h2>Reserveringen per maand bekijken</h2>
      <form action="?op=searchReserveringMonth" method="POST">
        <h3>Zoek op nummer van de maand</h3>
        <select class="form-control" name="month">
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maart</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Augustus</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <?php 
        $thisYear = date("Y");
        $html = "<input class='form-control' type='number' name='year' value='$thisYear'>";
        echo $html;
        ?>
        <input class="btn" type="submit" value="Zoeken" />
      </form>
      <?= $content ?>
    </div>
  </div>
</section>