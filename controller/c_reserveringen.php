<?php
require_once 'model/m_reserveringen.php';
require_once 'controller/c_bioscopen.php';

class resController
{
	public function __construct()
	{
		$this->reserveringenModel = new reserveringenModel();
		$this->biosModel = new Bioscopen();
	}

	public function __destruct()
	{ }

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) { }
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	public function	getFactuur()
	{
		$factuur = $_REQUEST;
		$biosDetails = $this->biosModel->readBios($_REQUEST['bios']);
		$zaalGegevens = $this->reserveringenModel->getZaalDetail($_REQUEST['id']);
		$bestelDetails = $this->reserveringenModel->getBeschikDetail($_REQUEST['id']);
		$tarieven = $this->reserveringenModel->getTarieven();
		$reservatie= $this->reserveringenModel->getReservatie($_REQUEST['id']);
		// return $creating;
		// include 'view/factuur.php';
	}
  
  public function getResForm()
  {
		$biosDetails = $this->biosModel->readBios($_REQUEST['bios']);
		$zaalGegevens = $this->reserveringenModel->getZaalDetail($_REQUEST['id']);
		$bestelDetails = $this->reserveringenModel->getBeschikDetail($_REQUEST['id']);
		$tarieven = $this->reserveringenModel->getTarieven();
		include "view/resForm.php";
  }

  public function getOverzichtReservering(){
	  $creating = $_REQUEST;
	  $bedrag = $this->reserveringenModel->berekBedrag($creating);
	  include 'view/reservering_overzicht.php';
  }

  public function insertRes(){
	$creating = $_REQUEST;
	$reservering = $this->reserveringenModel->addReser($creating);
	$biosDetails = $this->biosModel->readBios($_REQUEST['bios']);
	$zaalGegevens = $this->reserveringenModel->getZaalDetail($_REQUEST['id']);
	$bestelDetails = $this->reserveringenModel->getBeschikDetail($_REQUEST['id']);
	$tarieven = $this->reserveringenModel->getTarieven();
	$Toeslagen = $this->reserveringenModel->getToeslagen($_REQUEST['id']);
	$reservatie= $this->reserveringenModel->getReservatie($_REQUEST['id']);
	
	include 'view/factuur.php';
  }
}
