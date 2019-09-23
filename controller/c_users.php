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
          break;
      }
    } catch (ValidationException $e) {
      $errors = $e->getErrors();
    }
  }

  public function collectHome() {
    $template = $this->GPPLogic->reads();
    include_once 'view/home.php';
  }

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
			$html .= "<h1 class='con_title'>Over Ons</h1>";
			$html .= "<p>$row[overons]</p>";
			$html .= "</div>";
      $html .= "</div>";
      
      $html .= "<div class='col-2'>";
			$html .= "<div class='content'>";
      $html .= "<h1 class='con_title'>Email</h1>";
      $html .= "<p>$row[emailText]</p>";
			$html .= "<p>$row[email]</p>";
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
