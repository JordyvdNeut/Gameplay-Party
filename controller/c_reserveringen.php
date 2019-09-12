<?php

require_once('m_reserveringen.php');

class resController{
    public function __construct() {
		$this->reserveringen = new reserveringen();
	}

    public function __destruct() {}
        
	public function handleRequest() {
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
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
}
