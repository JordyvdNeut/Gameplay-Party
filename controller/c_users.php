<?php
require_once 'model/m_beheerdersLogic.php';

class UserController
{
  public function __construct()
  {
    $this->beheerdersLogic = new BeheerdersLogic();
  }

  public function __destruct()
  { }

  public function collectHome()
  {
    $result = $this->beheerdersLogic->readHome();
    $homePage = $this->createHome($result);
    include_once 'view/home.php';
  }
  
  public function collectCreateEmail()
  {
    $creating = $_REQUEST;
    $email = $this->beheerdersLogic->sendEmail($creating);
    $result = $this->beheerdersLogic->collectOverOns();
    $contact = $this->createOverOns($result);
    include_once 'view/over_ons.php';
  }

  public function collectOverOns()
  {
    $result = $this->beheerdersLogic->readOverOns();
    $contact = $this->createOverOns($result);
    include_once 'view/over_ons.php';
  }

  public function createOverOns($result)
  {
    $html = "";
    $html .= "<div class='center'><div class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<div class='col-12'>";
      $html .= "<div class='table content'>";
      $html .= "<h1 class='con_title'>Over ons</h1>";
      $html .= "<p class='con_inh'>$row[overons]</p>";
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</div></div>";
    return $html;
  }

  public function createHome($result)
  {
    $html = "";
    $html .= "<div class='container'><div class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      
      $html .= "<div class='col-6'>";
      $html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>$row[titel]</h1>";
      $html .= "<p class='con_inh'>$row[inhoud]</p>";

      if ($row['homeCon_id'] == 1) {
        $row['homeCon_id'] = "?op=overons";
        $html .= "<a href='$row[homeCon_id]'><button class='btn'>Lees meer</button></a>";
      } else {
        $row['homeCon_id'] = "?op=overzicht";
        $html .= "<a href='$row[homeCon_id]'><button class='btn extra'>Lees meer</button></a>";
      }
      
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</div></div>";
    return $html;
  }

  public function collectLogin()
  {
    $feedback = "";
    include 'view/loginForm.php';
  }
}