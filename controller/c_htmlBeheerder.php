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
      $html .= "<td><a href='?op=$link&id=" . $row['id'] . "'><button class='btn'><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function createAvailabiltyTable($rows)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>Beschikbaren zalen</h3>";
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
      $html .= "<td><a href='?op=upBiosBeschik'><button><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function makeRadioButtons($radio)
  {
    $html = "";
    $html .= "<div>";

    $html .= "<select name='zaal_id'>";
    while ($row = $radio->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<option value='$row[zaal_id]'>Zaal $row[zaal_nr]</option> ";
    }

    $html .= "</select>";
    $html .= "</div>";
    return $html;
  }
}
