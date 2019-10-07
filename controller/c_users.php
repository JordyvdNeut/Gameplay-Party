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
  public function collectHome() {
    $result = $this->beheerdersLogic->readHome();
    $homePage = $this->createHome($result);
    include_once 'view/home.php';
  }
	public function collectCreateEmail() {
		$creating = $_REQUEST;
    $email = $this->beheerdersLogic->sendEmail($creating);
    $result = $this->beheerdersLogic->collectOverOns();
    $contact = $this->createOverOns($result);
    include_once 'view/over_ons.php';
	}

// public function collectCreateNew() {
//     $creating = $_REQUEST;
//     $email = $this->productLogic->createemail($creating);
// }

 /* public function collectFooter() {
    $result = $this->beheerdersLogic->readFooter();
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
    $result = $this->beheerdersLogic->collectOverOns();
    $contact = $this->createOverOns($result);
    include_once 'view/over_ons.php';
  }

  public function createOverOns($result) {
		$html = "";
		$html .= "<div class='container'><div class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$html .= "<div class='col-lg-11'>";
			$html .= "<div class='table content p-3'>";
			$html .= "<h1 class='con_title'>Over ons</h1>";
			$html .= "<p class='con_inh'>$row[overons]</p>";
			$html .= "</div>";
      $html .= "</div>";
      
      // $html .= "<div class='col-3'>";
			// $html .= "<div class='content'>";
      // $html .= "<h1 class='con_title'>Contact</h1>";
      // $html .= "<p>$row[emailText]</p>";
      // $html .= "<p>$row[email]</p>";
			// $html .= "</div>";
			// $html .= "</div>";
		}

		$html .= "</div></div>";
		return $html;
  }

  public function createHome($result)
  {
    $html = "";
    $html .= "<div class='container'><div class='row'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      if ($row['homeCon_id'] == 1) {
        $row['homeCon_id'] = "?op=overons";
        $button="btn";
      } else { $button="btn h_overzicht";$row['homeCon_id'] = "?op=overzicht";}      
      $html .= "<div class='col-lg-6'>";
      $html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>$row[titel]</h1>";
      $html .= "<p class='con_inh'>$row[inhoud]</p>";
      $html .= "<a href='$row[homeCon_id]'><button class='$button '>Lees meer</button></a>";
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
