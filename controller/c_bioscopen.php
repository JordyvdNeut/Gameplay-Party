<?php

require_once('model/m_bioscopen.php');

class biosController{
    public function __construct() {
		$this->bioscopen = new bioscopen();
	}

    public function __destruct() {}
        
	public function handleRequest() {
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
		$result = $this->bioscopen->update();
		include 'view/beheerder/beheerder.php';
	}

	public function readBios() {
		$result = $this->bioscopen->reads();
		include 'view/overzicht/overzicht.php';
	}

	public function addBios() {
		$result = $this->bioscopen->addBios();
		include 'view/beheerder/addbios.php';
	} 

	public function deleteBios() {
		$result = $this->bioscopen->delete();
		include 'view/beheerder/deleteBios.php';
	}

}
