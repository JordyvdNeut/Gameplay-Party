<?php

class HTMLBeheerderController
{
  public function __construct()
  { }

  public function __destruct()
  { }

  public function createConTable($rows, $header, $link)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>$header</h3>";
    $html .= "<table class='table'>";

    foreach ($rows as $row) {
      $html .= "<tr>";
      if ($tableheader !== true) {
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        $html .= "<th>Wijzigen</th>";
        $html .= "</tr>";
        $tableheader = true;
      }
      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      }
      $html .= "<td><a href='?op=$link&id=" . $row['id'] . "'><button class='btn'><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></td> ";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }
  public function createConTableDel($rows, $header, $link, $delete)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>$header</h3>";
    $html .= "<table class='table'>";

    foreach ($rows as $row) {
      $html .= "<tr>";
      if ($tableheader !== true) {
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        $html .= "<th>Wijzigen</th>";
        $html .= "<th>verwijderen</th>";
        $html .= "</tr>";
        $tableheader = true;
      }
      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      }
      $html .= "<td><a href='?op=$link&id=" . $row['id'] . "'><button class='btn'><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></td> ";
      $html .= "<td><a href='?op=$delete&id=" . $row['id'] . "'><button class='btn'><span class='glyphicon glyphicon-pencil'></span> verwijderen</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function createAvailabiltyTable($rows, $title)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>$title</h3>";
    $html .= "<table class='table'>";


    foreach ($rows as $row) {
      $html .= "<tr>";
      if ($tableheader !== true) {
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        $html .= "<th>Wijzigen</th>";
        $html .= "</tr>";
        $tableheader = true;
      }
      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      }
      $html .= "<td><a href='?op=upFormBeschik&id=$row[id]'><button class='btn'><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function createResTable($rows, $header)
  {
    $tableheader = false;
    $html = "";
    $totaal = 0;

    $html .= "<h3>$header</h3>";
    $html .= "<table class='table'>";

    foreach ($rows as $row) {
      $html .= "<tr>";
      if ($tableheader !== true) {
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        $html .= "</tr>";
        $tableheader = true;
      }
      $totaal += $row['Kosten'];
      $html .= "<td>$row[Datum]</td>";
      $html .= "<td>$row[Bioscoop]</td>";
      $row['Kosten'] = '€' . str_replace('.', ',', $row['Kosten']);
      $html .= "<td>$row[Kosten]</td>";
      $html .= "</tr>";
    }
    $html .= "<tr>";
    $html .= "<td>";
    $html .= "</td>";
    $html .= "<td>";
    $html .= "</td>";
    $html .= "<td>";
    $totaal = str_replace('.', ',', $totaal);
    $html .= "Totaal: €" . $totaal;
    $html .= "</td>";
    $html .= "</tr>";

    $html .= "</table>";
    return $html;
  }

  public function makeRadioButtons($radio)
  {
    $html = "";
    $html .= "<div>";

    $html .= "<select name='zaal_id' class='form-control' style='width: 35%'>";
    while ($row = $radio->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<option value='$row[zaal_id]'>Zaal $row[zaal_nr]</option> ";
    }

    $html .= "</select>";
    $html .= "</div>";
    return $html;
  }

  public function searchBeschikBiosDate()
  {
    $html = "";
    $html .= "<div class='beschiksearch'>";
    $html .= "<form action='?op=searchBeschikBios' method='POST'>";
    $html .= "<h3>Zoek op datum</h3>";
    $html .= "<input class='form-control datebeschik' type='date' name='datum' />";
    $html .= "<input class='btn submitbeschik' type='submit' value='Zoeken' />";
    $html .= "</form>";
    $html .= "</div>";
    echo $html;
  }
}
