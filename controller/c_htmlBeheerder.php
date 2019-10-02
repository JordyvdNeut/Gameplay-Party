<?php

class HTMLBeheerderController
{
  public function __construct()
  { }

  public function __destruct()
  { }

  public function createHomeConTable($rows)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>Home pagina</h3>";
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
      $html .= "<td><a href=''><button><span class='glyphicon glyphicon-pencil'></span> Bewerken</button></a></td>";
      $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
  }

  public function createOveronsConTable($rows)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>Contact pagina</h3>";
    $html .= "<table>";

    foreach ($rows as $row) {
      $row['Over ons'] = substr($row['Over ons'], 0, 250) . "...";
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

  public function createAvailabiltyTable($rows)
  {
    $tableheader = false;
    $html = "";

    $html .= "<h3>Contact pagina</h3>";
    $html .= "<table>";

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
}
