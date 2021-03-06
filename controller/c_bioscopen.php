<?php
require_once 'model/m_bioscopen.php';
require_once 'controller/c_html.php';
require_once 'controller/c_htmlBeheerder.php';

class BiosController
{
	public function __construct()
	{
		$this->bioscopen = new Bioscopen();
		$this->HTMLController = new HTMLController();
	}

	public function __destruct()
	{ }

	public function collectOverzicht()
	{
		$bioscopen = $this->bioscopen->readBioscopen();
		$biosTable = $this->HTMLController->createBiosDiv($bioscopen);
		include_once 'view/overzicht.php';
	}

	public function readBios($id)
	{
		$result = $this->bioscopen->readBios($id);
		$beschikbaar = $this->bioscopen->readBiosBeschik($id);
		$biosPage = $this->HTMLController->createBiosDetail($result, $beschikbaar);
		include 'view/detail.php';
	}

	public function updateBios()
	{
		$result = $this->bioscopen->updateBios();
		include 'view/beheerder/updatedBios.php';
	}

	public function deleteBios()
	{
		$result = $this->bioscopen->delete();
		include 'view/beheerder/deleteBios.php';
	}
}
