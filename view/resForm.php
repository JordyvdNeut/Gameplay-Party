<title>Reserveren</title>
<?php
require_once('view/header.php');
?>

<section>
  <div class="row">
    <div class="col-10 content">

      <h2>Reserveren:</h2>
      <?php
      $html = "";
      while ($row = $biosDetails->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<p>";
        $html .= "$row[bios_naam] <br />";
        $html .= "<br />";
        $html .= "$row[bios_adres] <br />";
        $html .= "$row[bios_plaats] <br />";
        $html .= "</p>";
        $biosOmschr = $row['bios_info'];
      }
      while ($row = $bestelDetails->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<h3>Bestel gegevens</h3><br />";
        $html .= "<p>";
        $html .= "Zaal nummer: $row[zaal_nr] <br />";
        $html .= "<br />";
        $html .= "Datum: $row[datum] <br />";
        $html .= "Tijden: $row[beg_tijd] - $row[eind_tijd]<br />";
        $html .= "</p>";
      }
      $html .= "Bios naam: $biosOmschr <br />";
      $html .= "<br />";
      $html .= "<h3>Diensten van de zaal</h3><br />";
      while ($row = $zaalGegevens->fetch(PDO::FETCH_ASSOC)) {
        $row['kosten'] = '€ ' . str_replace('.', ',', $row['kosten']);
        $html .= "<p>";
        $html .= "$row[omschr]: $row[kosten]";
        $html .= "</p>";
      }
      echo "<br />";
      $html .= "<h3>De tarieven</h3><br />";
      while ($row = $tarieven->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<table>";
        $html .= "<tr>";
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        $html .= "</tr>";
        $html .= "<tr>";
        foreach ($row as $value) {
          $html .= "<td>{$value}</td>";
        }
        $html .= "</tr>";
        $html .= "</table>";
      }
      $html .= "<hr />";
      echo $html;
      ?>
      <div class="row">
        <!-- Klant gegevens toevoegen -->
        <div class="col-5 rescontent">
          <form action="index.php?op=reserveren&id=<?= $_REQUEST['id'] ?>&bios=<?= $_REQUEST['bios'] ?>" method="post">
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
        <!-- Personen toevoegen -->
        <div class="col-5 rescontent">
          <label>18 t/m 64 zonder bijzonderheden</label>
          <select name="normaal" class="form-control">
            <option value="">--Geen 18 tot 65 jaar--</option>
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