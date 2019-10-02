<?php

class HTMLController
{
  public function __construct()
  { }

  public function __destruct()
  { }
  public function createDetail($result)
  {
    $html = "";
    $html .= "<section class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<div class='col-8'>";
      $html .= "<div class='content'>";
      $html .= "<h2>$row[bios_naam]</h2>";
      $html .= "<p class='con_in'><img class='biosInside' src='$row[bios_ins]'></p>";
      $html .= "<p>$row[bios_info]</p>";
      if ($row['bios_diensten'] !== null) {
        $html .= "<h2>Extra mogelijkheden: </h2>";
        $html .= "$row[bios_diensen]";
      }
      $html .= "</div>";
      $html .= "</div>";


      $html .= "<div class='col-3'>";
      $html .= "<div class='content'>";
      $html .= "<h3><strong>Contact gegevens</strong></h3>";
      $html .= "<h4><strong>Adres: </strong></h4>";
      $html .= "<p>$row[bios_adres]<br />";
      $html .= "$row[bios_plaats]</p>";
      $html .= "<p>Telefoon nummer: $row[bios_tel]</p>";
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</section>";
    return $html;
  }

  public function createDiv($result)
  {
    $html = "";
    $html .= "<div class='center'><div class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $row['bios_info'] = substr($row['bios_info'], 0, 250);
      $html .= "<div class='col-5'>";
      $html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>$row[bios_naam]</h1>";
      $html .= "<p class='con_inh'><img class='biosPhoto' src='$row[bios_foto]'><br />";
      $html .= "$row[bios_info]...</p><br />";

      $html .= "<a href='index.php?op=detail&id=$row[bios_id]'><button class='btn'>Lees meer</button></a>";
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</div></div>";
    return $html;
  }
}