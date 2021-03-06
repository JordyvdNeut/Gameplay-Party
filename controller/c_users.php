<?php
require_once 'model/m_beheerdersLogic.php';
require_once 'controller/c_bioscopen.php';
require_once 'controller/c_html.php';

class UserController
{
  public function __construct()
  {
    $this->beheerdersLogic = new BeheerdersLogic();
		$this->biosModel = new Bioscopen();
		$this->HTMLController = new HTMLController();
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
  public function collectCookie()
  {
    include_once 'view/voorwaardes/termsfeed-cookies-policy-html-english.php';
  }
  public function collectrefund()
  {
    include_once 'view/voorwaardes/termsfeed-return-refund-policy-html-english.php';
  }
  public function collectPrivacy()
  {
    include_once 'view//voorwaardes/termsfeed-privacy-policy-html-english.php';
  }
  public function collectTerms()
  {
    include_once 'view/voorwaardes/terms-conditions-english.php';
  }
  public function collectvoorwaarde()
  {
    include_once 'view/voorwaardes/termsfeed-terms-conditions-html-english.php';
  }
  
  public function collectHomePost($id){
    $result = $this->beheerdersLogic->readHomePost($id);
    $homePost = $this->makeHomePost($result);
    include_once 'view/homePost.php';
  }

  public function makeHomePost($result){
    $html = "";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<h1 class='con_title'>$row[titel]</h1>";
      $html .= "<p class='con_inh'>$row[inhoud]</p>";
    }
    
    return $html;
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
    $html .= "<div class='container'><div class='row noflex'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      
      $html .= "<div class='col-6' style='padding-bottom: 10px; '>";
      $html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>$row[titel]</h1>";
      $row['inhoud'] = substr($row['inhoud'], 0, 250) . "...";
      $html .= "<p class='con_inh'>$row[inhoud]</p>";

      if ($row['homeCon_id'] == 1) {
        $row['homeCon_id'] = "?op=overons";
        $html .= "<a href='$row[homeCon_id]'><button class='btn'>Lees meer</button></a>";
      } elseif($row['homeCon_id']  == 2) {
        $row['homeCon_id'] = "?op=overzicht";
        $html .= "<a href='$row[homeCon_id]'><button class='btn extra'>Lees meer</button></a>";
      } else{
        $html .= "<a href='?op=homePost&id=$row[homeCon_id]'><button class='btn'>Lees meer</button></a>";
      }
      
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</div></div>";
    return $html;
  }

	public function searchuserBeschik($id)
	{
    $biosDetail = $this->biosModel->readBios($id);
		$datum = date("Y-m-d", strtotime($_REQUEST['datum']));
    $datumBeschikbaarheden = $this->biosModel->readAvailability($datum, $id);
		$searchedBeschikTable = $this->HTMLController->createBiosDetail($biosDetail, $datumBeschikbaarheden);
		$biosPage = $searchedBeschikTable;
		require_once "view/header.php";
		include "view/detail.php";
		return $biosPage;
  }

  public function collectLogin()
  {
    $feedback = "";
    include 'view/loginForm.php';
  }
}