<?php require_once('view/beheerder/header.php') ?>
<div class="col-md-12">
  <div class="content">

    <?php
    $html = "";
    $id = $_REQUEST['id'];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<form class='form-contact' action='?op=updateBeschik&id=$id' method='POST'>";
      $html .= "<h1 class='heading'>Beschikbaarheid aanpassen</h1>";
      $html .= "<h3>Zaalnr: $row[zaal_nr]</h3>";
      $html .= "<label>Datum</label>";
      $html .= "<input class='form-control' type='date' name='datum' value='$row[datum]' />";
      $html .= "<br />";
      $html .= "<label>Begin tijd</label>";
      $html .= "<input class='form-control' type='time' name='beg_tijd' value='$row[beg_tijd]' />";
      $html .= "<br />";
      $html .= "<label>Eind tijd</label>";
      $html .= "<input class='form-control' type='time' name='eind_tijd' value='$row[eind_tijd]' />";
      $html .= "<br />";
      
      $html .= "<label class='custom-control-label'>Boeking</label><br />";
      $beschikbaarheid = "";
      if ($row['beschik'] == true) {
        $beschikbaarheid = "Beschikbaar";
      } else {
        $beschikbaarheid = "Bezet";
      }
      $html .= "<select class='form-control' name='beschik'>";
      $html .= "<option value='$row[beschik]'>$beschikbaarheid</option>";
      $html .= "<option value='0'>Bezet</option>";
      $html .= "<option value='1'>Beschikbaar</option>";
      $html .= "</select>";

      $html .= "<br />";
      $html .= "<button type='submit' class='btn'> Bewerken</button>";
      $html .= "</form>";
    }
    echo $html;
    ?>
  </div>
</div>
</div>
</div>