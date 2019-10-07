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
      // if ($row['Inhoud']) {
      //   $row['Inhoud'] = substr($row['Inhoud'], 0, 250) . "...";
      // }
      // if ($row['Over Ons']) {
      //   $row['Over ons'] = substr($row['Over ons'], 0, 250) . "...";
      // }
      $html .= "<tr>";
      if ($tableheader !== true) {
        foreach ($row as $key => $value) {
          // if ($value !== $value['id']) {
            $html .= "<th>{$key}</th>";
          // }
        }
        $html .= "<th>Wijzigen</th>";
        $html .= "</tr>";
        $tableheader = true;
      }
      foreach ($row as $value) {
        // if ($value !== $value['id']) {
          $html .= "<td>{$value}</td>";
        // }
      }
      $html .= "<td><a href='?op=$link&id=" . $row['id'] . "'><button><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
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
      $html .= "<td><a href=''><button><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function makeRadio($result)
  {
    $html = "";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<input type='radio' name='$row[zaal_id]' placeholder='$row[zaal_nr]'>";
    }
    return $html;
  }
}
