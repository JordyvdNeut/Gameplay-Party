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
      $html .="<div class='row'>";
      while ($row = $biosDetails->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<div class='bestel col-5'>";
        $html .= "<h3>Bioscoop gegevens</h3><br />";
        $html .= "<p>";
        $html .= "$row[bios_naam] <br />";
        $html .= "<br />";
        $html .= "$row[bios_adres] <br />";
        $html .= "$row[bios_plaats] <br />";
        $html .= "</p>";
        // $biosOmschr = $row['bios_info'];
        $html .= "</div>";
      }
      while ($row = $bestelDetails->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<div class='bestel col-5'>";
        $html .= "<h3>Bestel gegevens</h3><br />";
        $html .= "<p>";
        $html .= "Zaal nummer: $row[zaal_nr] <br />";
        $html .= "<br />";
        $html .= "Datum: $row[datum] <br />";
        $html .= "Tijden: $row[beg_tijd] - $row[eind_tijd]<br />";
        $html .= "</p>";
        $html .= "</div>";
      }
      // $html .= "$biosOmschr <br />";
      
      $html .= "<br />";

      
      echo "<br />";

    $html .= "<div class='tarieven col-5'>";
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
      $html .="</div>";
      $html .= "<div class='diensten col-5'>";
      $html .= "<h3>Diensten van de zaal</h3><br />";
      while ($row = $zaalGegevens->fetch(PDO::FETCH_ASSOC)) {
        $row['kosten'] = '€ ' . str_replace('.', ',', $row['kosten']);
        $html .= "<p>";
        $html .= "$row[omschr]: $row[kosten]";
        $html .= "</p>";
      }
      $html .= "</div>";
      $html .="</div>";
      
      echo $html;
      ?>
      <div class="row">
        <!-- Klant gegevens toevoegen
      index.php?op=reserveren&id= $_REQUEST['id'] ?>&bios=$_REQUEST['bios'] -->
        <div class="col-5 rescontent">
          <form action="index.php?op=reserveren&id= $_REQUEST['id'] ?>&bios=$_REQUEST['bios']" method="post">
            <label>Uw Naam</label>
            <input class="form-control" name="naam" type="text" required="required" />
            <br />
            <label>Adres</label>
            <input class="form-control" name="adres" type="text" required="required" />
            <br />
            <label>Postcode</label>
            <input class="form-control" name="postcode" type="text" required="required" />
            <br />
            <label>Woonplaats</label>
            <input class="form-control" name="woonplaats" type="text" required="required" />
            <br />
            <label>Telefoon nummer</label>
            <input class="form-control" name="telefoon" type="tel" required="required" />
            <br />
            <br />
        </div>
        <!-- Personen toevoegen -->
        <div class="col-5 rescontent">
          <label>Normaal</label>
          <select name="normaal" class="form-control">
            <option value="">--Geen 18 jaar of ouder--</option>
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
          <select name="65plus" class="form-control">
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
            <option value="0">--Geen Studenten, CJP of BankGiro Loterij VIP-KAART--</option>
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