<?php

class HTMLController
{
  public function __construct()
  { }

  public function __destruct()
  { }

  public function createHomeConTable($rows)
  {
    $tableheader = false;
    $html = "";

    $html .= "<table>";

    foreach ($rows as $row) {
      $row['Inhoud'] = substr($row['Inhoud'], 0, 250) . "...";
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
      $html .= "<td><button><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }
}
