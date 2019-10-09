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
			include "view/beheerder/redacteur.php";
		}
		if ($_SESSION['user_role'] == 2) {
			$content = $this->collectAvailabilty();
			// beschikbaarheid tabel, gereserveerde beschikbaarheden
			require_once "view/beheerder/header.php";
			include "view/beheerder/biosBeheerder.php";
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
		require_once "view/beheerder/biosBeheerder.php";
	}

	public function collectAvailabilty()
	{
		$availabilty = $this->beheerdersLogic->readAvailabilty();
		$homeAvailabiltyTable = $this->HTMLBeheerderController->createAvailabiltyTable($availabilty);
		return $homeAvailabiltyTable;
	}
/*
	public function collectUpBiosBeschik($id){
		$result = $this->beheerdersLogic->readBeschik($id);
		include 'view/beheerder/upBiosBeschik.php';
	}
*/
	public function collectBioscopen()
	{
		include_once 'view/beheerder/overzichtBios.php';
	}

	public function collectUpdateHomeconForm($id)
	{
		$homeContent = $this->beheerdersLogic->readHomeCon($id);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/upHomeCon.php';
	}

	public function collectUpdateHomecon()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateHomeContent($formData);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/feedback.php';
	}

	public function collectUpdateContactconForm($id)
	{
		$contactContent = $this->beheerdersLogic->readContactCon($id);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/upContactCon.php';
	}

	public function collectUpdateContactcon()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateContactContent($formData);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/feedback.php';
	}

	public function collectUpdateBiosconForm()
	{
		$biosContent = $this->beheerdersLogic->readsBiosCon();
		require_once "view/beheerder/header.php";
		include 'view/beheerder/upBiosCon.php';
	}

	public function collectUpdateBioscon()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateBiosContent($formData);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/feedback.php';
	}

	// public function collectUpdateAvailabiltyconForm($id)
	// {
	// 	$availabiltyContent = $this->beheerdersLogic->readAvailabiltyCon($id);
	// 	require_once "view/beheerder/header.php";
	// 	include 'view/beheerder/upAvailabiltyCon.php';
	// }

	// public function collectUpdateAvailabiltycon()
	// {
	// 	$formData = $_REQUEST;
	// 	$feedback = $this->beheerdersLogic->updateAvailabiltyContent($formData);
	// 	require_once "view/beheerder/header.php";
	// 	include 'view/beheerder/feedback.php';
	// }

	public function logout()
	{
		$_SESSION['user_id'] = null;
		$_SESSION['user_role'] = null;
		header('Location: index.php?op=loginForm');
	}

	public function makeRadio(){
		$radio = $this->beheerdersLogic->collectRadio();
		$radioButtons = $this->HTMLBeheerderController->makeRadioButtons($radio);
		include 'view/beheerder/addBeschik.php';
	}

	public function addBeschik()
	{
		$creating = $_REQUEST;
		$result = $this->beheerdersLogic->addBeschik($creating);
		$feedback = "<br/>Uw beschikbaarheid is toegevoegd.";
		include 'view/beheerder/feedback.php';
	}

	public function formHomeCont(){
		include 'view/beheerder/addHomeCon.php';
	}

	public function addHomeCont(){
		$creating = $_REQUEST;
		$result = $this->beheerdersLogic->addHomeCont($creating);
		$feedback = "<br/>Uw teksten zijn toegevoegd en worden nu op de homepagina getoond.";
		include 'view/beheerder/feedback.php';
	}
}