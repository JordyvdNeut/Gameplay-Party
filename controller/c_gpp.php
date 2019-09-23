<?php
require_once 'model/m_GPPLogic.php';

class GPPController
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
				case 'beOverzicht':
					$this->collectBioscopen();
					break;
				case 'beHome':
					$this->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	public function collectHome()
	{
		include 'view/beheerder/beheerder.php';
	}

	public function collectBioscopen()
	{
		include 'view/overzichtBios.php';
	}
}
