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
		$homeContTable = $this->HTMLBeheerderController->createHomeConTable($homeContent);
		$overonsContent = $this->beheerdersLogic->readOveronsCon();
		$overonsContTable = $this->HTMLBeheerderController->createOveronsConTable($overonsContent);
		return "<hr style='border-color: green'>" . $homeContTable . "<hr style='border-color: green'>" . $overonsContTable;
	}

	public function collectAvailabilty()
	{
		$beschikbaarheid = $this->beheerdersLogic->readAvailabilty();
		$homeContTable = $this->HTMLBeheerderController->createAvailabiltyTable($beschikbaarheid);
		return $homeContTable;
	}

	public function collectBioscopen()
	{
		include_once 'view/beheerder/overzichtBios.php';
	}

	public function collectUpdateHomeconForm($id)
	{
		$homeContent = $this->beheerdersLogic->readHomeCon($id);
		require_once "view/beheerder/header.php";
		include 'view/beheerder/updateBios.php';
	}

	public function collectUpdateHomecon()
	{
		$formData = $_REQUEST;
		$feedback = $this->beheerdersLogic->updateHomeContent($formData);
		require_once "view/beheerder/header.php";
		include 'view/feedback.php';
	}

	public function updateHomeContent()
	{
		$result = $this->beheerdersLogic->updateHomeContent();
		require_once "view/beheerder/header.php";
		include 'view/beheerder/updatedBios.php';

	}

	public function logout()
	{
		$_SESSION['user_id'] = null;
		$_SESSION['user_role'] = null;
		header('Location: index.php?op=loginForm');
	}

	public function addForm()
	{
		include 'view/beheerder/addBeschik.php';
	}

	public function viewRadio(){
		$radio = $this->beheerdersLogic->collectRadio();
		

		include 'view/beheerder/addBeschik.php';
	}

	public function makeRadio($radio){
		$radio = $this->beheerdersLogic->addForm();
		$radioButtons = $this->HTMLBeheerderController->makeRadio($radio); 
		include 'view/beheerder/addBeschik.php';
	}

	public function makeRadioButtons($radio){
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		  $html .= "<input type='radio' name='$row[zaal_id]' placeholder='$row[zaal_nr]'>"; 
		}
		return $html;
	  }
	
	public function addBeschik()
	{
		$creating = $_REQUEST;
        $result = $this->beheerdersLogic->addBeschik($creating);
        include 'view/beheerder/redacteur.php';
	}

	
}
