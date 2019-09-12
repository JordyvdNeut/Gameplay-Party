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
				case 'update':
					$this->update();
					break;
				case 'readBios':
					$this->readBios();
					break;
				case 'delBios':
					$this->deleteBios();
					break;
				case 'addBios':
					$this->addBios();
					break;
				
				default:
					$this->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	public function collectHome() {
		include 'view/beheerder/beheerder.php';
	}

	public function update() {
		$result = $this->m_GPPLogic->update();
		include 'view/beheerder/beheerder.php';
	}

	public function readBios() {
		$result = $this->m_GPPLogic->reads();
		include 'view/overzicht/overzicht.php';
	}

	public function addBios() {
		$result = $this->GPPLogic->addBios();
		include 'view/beheerder/addbios.php';
	} 

	public function deleteBios() {
		$result = $this->GPPLogic->delete();
		include 'view/beheerder/deleteBios.php';
	}


}
