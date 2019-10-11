<?php
require_once 'model/m_beheerdersLogic.php';
require_once 'controller/c_htmlBeheerder.php';

class BeheerdersController
{

	public function __construct()
	{
		$this->beheerdersLogic = new BeheerdersLogic();
		$this->HTMLBeheerderController = new HTMLBeheerderController();
	}

	public function __destruct()
	{ }

	public function collectUser($id)
	{
		return $this->beheerdersLogic->readUser($id);
	}

	// Don't remove!!
	public function login()
	{ }

	// collect home for every admin
	public function collectHome()
	{
		if ($_SESSION['user_role'] == 3) {
			$content = $this->collectContentTables();
			require_once "view/beheerder/header.php";
			include "view/beheerder/redacteur/home.php";
		}
		if ($_SESSION['user_role'] == 2) {
			$content = $this->collectAvailabilty();
			require_once "view/beheerder/header.php";
			include "view/beheerder/bioscoop/home.php";
		}
		if (!$_SESSION | $_SESSION['user_role'] == null) {
			header('Location: index.php?op=loginForm');
		}
	}

  public function collectContentTables()
  {
    $homeContent = $this->beheerdersLogic->readsHomeCon();
    $homeConTable = $this->HTMLBeheerderController->createConTable($homeContent, 'Home pagina', 'updateHomeConForm');
    $overonsContent = $this->beheerdersLogic->readOveronsCon();
    $overonsConTable = $this->HTMLBeheerderController->createConTable($overonsContent, 'Contact pagina', 'updateContactConForm');
    return "<hr style='border-color: green'>" . $homeConTable . "<hr style='border-color: green'>" . $overonsConTable;
  }

	public function collectBioscon()
	{
		$bioscoopContent = $this->beheerdersLogic->readsBiosContent();
		$content = $this->HTMLBeheerderController->createConTable($bioscoopContent, 'Bioscoop gegevens', 'updatBiosConForm');
		require_once "view/beheerder/header.php";
		require_once "view/beheerder/bioscoop/home.php";
	}

	public function collectAvailabilty()
	{
		$availabilty = $this->beheerdersLogic->readAvailabilty();
		$availabiltyTable = $this->HTMLBeheerderController->createAvailabiltyTable($availabilty);
		return $availabiltyTable;
	}


	public function collectUpdateBiosconForm()
	{
		$biosContent = $this->beheerdersLogic->readsBiosCon();
		include 'view/beheerder/redacteur/upBiosCon.php';
	}

	public function collectUpdateBioscon()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateBiosContent($formData);
		include 'view/beheerder/feedback.php';
	}

	public function logout()
	{
		$_SESSION['user_id'] = null;
		$_SESSION['user_role'] = null;
		header('Location: index.php?op=loginForm');
	}

	public function collectAddBeschik()
	{
		$radio = $this->beheerdersLogic->collectRadio();
		$radioButtons = $this->HTMLBeheerderController->makeRadioButtons($radio);
		include 'view/beheerder/bioscoop/addBeschik.php';
	}

	public function addBeschik()
	{
		$creating = $_REQUEST;
		$result = $this->beheerdersLogic->addBeschik($creating);
		$feedback = "<br/>Uw beschikbaarheid is toegevoegd.";
		include 'view/beheerder/feedback.php';
	}

	public function collectUpFormBeschik($id)
	{
		$result = $this->beheerdersLogic->readBeschik($id);
		include 'view/beheerder/bioscoop/upBeschik.php';
	}
	public function updateBeschik()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateBeschik($formData);
		include 'view/beheerder/feedback.php';
	}
}
