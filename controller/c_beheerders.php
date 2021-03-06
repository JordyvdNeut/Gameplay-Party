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
		if ($_SESSION['user_role'] == 4) {
			$content = $this->collectReserveringen();
			require_once "view/beheerder/header.php";
			include "view/beheerder/beheerder/home.php";
		}
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
		$homeConTable = $this->HTMLBeheerderController->createConTableDel($homeContent, 'Home pagina', 'updateHomeConForm', 'deleteHomeConForm');
		$overonsContent = $this->beheerdersLogic->readOveronsCon();
		$overonsConTable = $this->HTMLBeheerderController->createConTable($overonsContent, 'Contact pagina', 'updateContactConForm', 'deleteHomeConForm');
		return "<hr style='border-color: green'>" . $homeConTable . "<hr style='border-color: green'>" . $overonsConTable;
	}

	public function collectReserveringen()
	{
		$reserveringen = $this->beheerdersLogic->readReserveringen();
		$content = $this->HTMLBeheerderController->createResTable($reserveringen, 'Reserveringen');
		return $content;
	}

	public function searchReserveringen()
	{
		$datum = date("Y-m-d", strtotime($_REQUEST['datum']));
		$datumReservering = $this->beheerdersLogic->readSearchedReserveringen($datum);
		$content = $this->HTMLBeheerderController->createResTable($datumReservering, 'Gevonden reserveringen', 'updateReservering');
		require_once "view/beheerder/header.php";
		include "view/beheerder/beheerder/home.php";
	}

	public function reserveringenMonth()
	{
		$resThisMonth = $this->beheerdersLogic->readReserveringenMonth();
		$content = $this->HTMLBeheerderController->createResTable($resThisMonth, 'Reserveringen deze maand', 'updateReservering');
		require_once "view/beheerder/header.php";
		include "view/beheerder/beheerder/resMonth.php";
	}

	public function searchReserveringenMonth($month, $year)
	{
		$resMonth = $this->beheerdersLogic->searchReserveringenMonth($month, $year);
		$content = $this->HTMLBeheerderController->createResTable($resMonth, 'Gevonden reserveringen', 'updateReservering');
		require_once "view/beheerder/header.php";
		include "view/beheerder/beheerder/resMonth.php";
	}

	public function collectBioscon()
	{
		$bioscoopContent = $this->beheerdersLogic->readsBiosContent();
		$content = $this->HTMLBeheerderController->createConTable($bioscoopContent, 'Bioscoop gegevens', 'updatBiosConForm');
		require_once "view/beheerder/header.php";
		require_once "view/beheerder/bioscoop/content.php";
	}

	// get beschikbaren en geboekte plaatsen
	public function collectAvailabilty()
	{
		$availabe = $this->beheerdersLogic->readAvailabilty();
		$availabiltyTable = $this->HTMLBeheerderController->createAvailabiltyTable($availabe, 'Beschikbaren zalen');
		$booked = $this->beheerdersLogic->readBooked();
		$bookedTable = $this->HTMLBeheerderController->createAvailabiltyTable($booked, 'Geboekte zalen');
		return "<hr style='border-color: green'>" . $availabiltyTable . "<hr style='border-color: green'>" . $bookedTable;
	}

	// search function voor beschikbaarheid voor bioscoop beheerder
	public function searchbiosBeschik()
	{
		$NLdatum = date("d-m-Y", strtotime($_REQUEST['datum']));
		$datum = date("Y-m-d", strtotime($_REQUEST['datum']));
		$searchBeschikDatum = $this->beheerdersLogic->readAvailabilityDate($datum);
		$availabiltyTable = $this->HTMLBeheerderController->createAvailabiltyTable($searchBeschikDatum, "Beschikbaren zalen gevonden op: $NLdatum");
		$searchBookedDatum = $this->beheerdersLogic->readBookedDate($datum);
		$bookedTable = $this->HTMLBeheerderController->createAvailabiltyTable($searchBookedDatum, "Geboekte zalen gevonden op: $NLdatum");
		$content = "<hr style='border-color: green'>" . $availabiltyTable . "<hr style='border-color: green'>" . $bookedTable;
		require_once "view/beheerder/header.php";
		include "view/beheerder/bioscoop/home.php";
		return $content;
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
