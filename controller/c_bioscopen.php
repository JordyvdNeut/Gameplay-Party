<?php

require_once('model/m_bioscopen.php');

class BiosController
{
	public function __construct()
	{
		$this->bioscopen = new Bioscopen();
	}

	public function __destruct()
	{ }

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
					// case 'addBios':
					// 	$this->addBios();
					// 	break;
				case 'overzicht':
					$this->collectOverzicht();
					break;
				case 'detail':
					$this->readBios($_REQUEST['id']);
					break;
					// case 'update':
					// 	$this->update();
					// 	break;
					// case 'delBios':
					// 	$this->deleteBios();
					// 	break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	// public function addBios()
	// {
	// 	$result = $this->bioscopen->addBios();
	// 	include 'view/beheerder/addbios.php';
	// }

	public function collectOverzicht()
	{
		$bioscopen = $this->bioscopen->readBioscopen();
		$biosTable = $this->createDiv($bioscopen);
		include_once 'view/overzicht.php';
	}

	// public function readBios() {
	// 	$result = $this->bioscopen->readBioscoop();
	// 	include 'view/overzicht.php';
	// }

	// public function update()
	// {
	// 	$result = $this->bioscopen->update();
	// 	include 'view/beheerder/beheerder.php';
	// }


	public function createDiv($result)
	{
		$html = "";
		$html .= "<div class='center'><div class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$html .= "<div class='col-6'>";
			$html .= "<div class='content'>";
			$html .= "<h1 class='con_title'>$row[bios_naam]</h1>";
			$html .= "<h2>$row[bios_plaats]</h2>";
			$html .= "<p class='con_in'><img class='biosPhoto' src='$row[bios_foto]'></p>";
			$html .= "<a href='index.php?op=detail&id=$row[bios_id]'><button class='accents, btn'>Lees meer</button></a>";
			$html .= "</div>";
			$html .= "</div>";
		}

		$html .= "</div></div>";
		return $html;
	}

	public function deleteBios()
	{
		$result = $this->bioscopen->delete();
		include 'view/beheerder/deleteBios.php';
	}
}
