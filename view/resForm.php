<title>Reserveren</title>
<?php
require_once('view/header.php');
?>

<section>
  <div class="row">
    <div class="col-10 content">

      <h2>Reserveren:</h2>
      <p>
        Bioscoop: $row[bios_naam] <br />
        <br />
        Bioscoop: $row[bios_adres] <br />
        Bioscoop: $row[bios_plaats] <br />
      </p>
      <div class="row">
      <div class="col-5 rescontent">
      <form action="index.php?op=login" method="post">
        <label>Uw voornaam</label>
        <input class="form-control" name="voornaam" type="text" required="required" />
        <br />
        <label>Tussenvoegsel</label>
        <input class="form-control" name="tussenvoegsel" type="text" required="required" />
        <br />
        <label>Achternaam</label>
        <input class="form-control" name="achternaam" type="text" required="required" />
        <br />
        <label>Woonplaats</label>
        <input class="form-control" name="woonplaats" type="text" required="required" />
        <br />
        <label>Adres</label>
        <input class="form-control" name="adres" type="text" required="required" />
        <br />
        <label>Postcode</label>
        <input class="form-control" name="postcode" type="text" required="required" />
        <br />
        <label>Huisnummer</label>
        <input class="form-control" name="adres" type="number" required="required" />
        <br />
        <label>Telefoon nummer</label>
        <input class="form-control" name="adres" type="tel" required="required" />
        <br />
        <br />
</div>
        <div class="col-5 rescontent">
        <label>volwassenen</label>
        <select name="normaal" class="form-control">
          <option value="">--Geen volwassenen--</option>
          <?php
          foreach (range(1, 50) as $number) {
            echo "<option value='" . $number . "'>" . $number . "</option>";
          }
          ?>
        </select>
        <br />
        <label>Aantal kinderen t/m 11 jaar</label>
        <select name="tm11" class="form-control">
          <option value="">--Geen kinderen--</option>
          <?php
          foreach (range(1, 50) as $number) {
            echo "<option value='" . $number . "'>" . $number . "</option>";
          }
          ?>
        </select>
        <br />
        <label>Jeugd 12 t/m 17 jaar</label>
        <select name="12tm17" class="form-control">
          <option value="">--Geen jeugd--</option>
          <?php
          foreach (range(1, 50) as $number) {
            echo "<option value='" . $number . "'>" . $number . "</option>";
          }
          ?>
        </select>
        <br />
        <label>65+</label>
        <select name="65+" class="form-control">
          <option value="">--Geen 65 plussers--</option>
          <?php
          foreach (range(1, 50) as $number) {
            echo "<option value='" . $number . "'>" . $number . "</option>";
          }
          ?>
        </select>
        <br />
        <label>Studenten, CJP & BankGiro Loterij VIP-KAART</label>
        <select name="overig" class="form-control">
          <option value="">--Geen Studenten, CJP of BankGiro Loterij VIP-KAART--</option>
          <?php
          foreach (range(1, 50) as $number) {
            echo "<option value='" . $number . "'>" . $number . "</option>";
          }
          ?>
        </select>
        <br />
        <div class="row flexnone">
          <div class='resbtn'>
          <button type="submit" class="btn">Reserveren</button><button type="reset" class="btn">Annuleren</button>
        </div>
        </div>
        </div>
        </div>
      </form>
    </div>

</section>

<?php
require_once('view/footer.php');
?>