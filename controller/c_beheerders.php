<?php
require_once 'model/m_beheerdersLogic.php';
require_once 'controller/c_html.php';

class BeheerdersController
{

	public function __construct()
	{
		$this->beheerdersLogic = new BeheerdersLogic();
		$this->HTMLController = new HTMLController();
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
			$user =	$this->collectUser($_SESSION['user_id']);
			$content = $this->collectContent();
			require_once "view/beheerder/header.php";
			include "view/beheerder/redacteur.php";

		}
		if ($_SESSION['user_role'] == 2) {
			$user =	$this->collectUser($_SESSION['user_id']);
			require_once "view/beheerder/header.php";
			include "view/beheerder/biosBeheerder.php";
		}
		if (!$_SESSION | $_SESSION['user_role'] == null) {
			header('Location: index.php?op=loginForm');
		}
	}

	public function collectContent()
	{
		$homeContent = $this->beheerdersLogic->readHomeCon();
		$homeContTable = $this->HTMLController->createHomeConTable($homeContent);
		$overonsContent = $this->beheerdersLogic->readOveronsCon();
		return $homeContTable;
	}

	public function collectBioscopen()
	{
		include_once 'view/beheerder/overzichtBios.php';
	}

	public function logout()
	{
		$_SESSION['user_id'] = null;
		$_SESSION['user_role'] = null;
		header('Location: index.php?op=loginForm');
	}
}
