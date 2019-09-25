<?php
require_once 'model/m_GPPLogic.php';

class UserController
{
  public function __construct()
  {
    $this->GPPLogic = new GPPLogic();
  }

  public function __destruct()
  { }
  public function handleRequest()
  {
    try {
      $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
      switch ($op) {
        case 'loginForm':
          $this->collectLogin();
          break;
        case 'overons':
          $this->collectOverOns();
          break;
        case 'home':
          $this->collectHome();
          //$this->collectFooter();
          break;
      }
    } catch (ValidationException $e) {
      $errors = $e->getErrors();
    }
  }

  public function collectHome() {
    $result = $this->GPPLogic->readHome();
    $homePage = $this->createHome($result);
    include_once 'view/home.php';
  }

 /* public function collectFooter() {
    $result = $this->GPPLogic->readFooter();
    $footer = $this->createFooter($result);
    include_once 'view/footer.php';
  }

  public function createFooter($result) {
		$html = "";
		$html .= "<div class='center'><div class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$html .= "<div class='col-8'>";
			$html .= "<div class='content'>";
			$html .= "<h1 class='con_title'>Contact</h1>";
			$html .= "<p>$row[voorwaarden]</p>";
			$html .= "</div>";
      $html .= "</div>";
      
      $html .= "<div class='col-2'>";
			$html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>Email</h1>";
      //$html .= "<p>$row[]</p>";
		//	$html .= "<p>$row[]</p>";
			$html .= "</div>";
			$html .= "</div>";
		}

		$html .= "</div></div>";
}*/

  public function collectOverOns() {
    $result = $this->GPPLogic->collectOverOns();
    $contact = $this->createOverOns($result);
    include_once 'view/over_ons.php';
  }

  public function createOverOns($result) {
		$html = "";
		$html .= "<div class='center'><div class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$html .= "<div class='col-8'>";
			$html .= "<div class='content'>";
			$html .= "<h1 class='con_title'>Over ons</h1>";
			$html .= "<p class='con_inh'>$row[overons]</p>";
			$html .= "</div>";
      $html .= "</div>";
      
      $html .= "<div class='col-3'>";
			$html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>Contact</h1>";
      $html .= "<p>$row[emailText]</p>";
			$html .= "<p>$row[email]</p>";
			$html .= "</div>";
			$html .= "</div>";
		}

		$html .= "</div></div>";
		return $html;
  }

  public function createHome($result)
  {
    $html = "";
    $html .= "<div class='center'><div class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      if ($row['homeCon_id'] == 1) {
        $row['homeCon_id'] = "?op=overons";
      } else { $row['homeCon_id'] = "?op=overzicht"; }
      $html .= "<div class='col-5'>";
      $html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>$row[titel]</h1>";
      $html .= "<p class='con_inh'>$row[inhoud]</p>";
      $html .= "<a href='$row[homeCon_id]'><button class='btn'>Lees meer</button></a>";
      $html .= "</div>";
      $html .= "</div>";
    }

    $html .= "</div></div>";
    return $html;
  }

  public function collectLogin() {
    include 'view/loginForm.php';
  }

}
