<?php
require_once 'model/m_beheerdersLogic.php';

class BeheerdersController
{

	public function __construct()
	{
		$this->beheerdersLogic = new BeheerdersLogic();
	}

	public function __destruct()
	{ }

	public function collectHome()
	{
		include_once 'view/beheerder/beheerder.php';
	}

	public function collectBioscopen()
	{
		include_once 'view/beheerder/overzichtBios.php';
	}
}
