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

	public function readBios($id)
	{
		$result = $this->bioscopen->readBios($id);
		$biosPage = $this->createDetail($result);
		include 'view/detail.php';
	}

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
			$row['bios_info'] = substr($row['bios_info'], 0, 250);
			$html .= "<div class='col-5'>";
			$html .= "<div class='content'>";
			$html .= "<h1 class='con_title'>$row[bios_naam]</h1>";
			$html .= "<p class='con_in'><img class='biosPhoto' src='$row[bios_foto]'>";
			$html .= "$row[bios_info]...</p>";
			
			$html .= "<a href='index.php?op=detail&id=$row[bios_id]'><button class='btn'>Lees meer</button></a>";
			$html .= "</div>";
			$html .= "</div>";
		}

		$html .= "</div></div>";
		return $html;
	}

	public function createDetail($result)
	{
		$html = "";
		$html .= "<section class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$html .= "<div class='col-8'>";
			$html .= "<h2>$row[bios_naam]</h2>";
			$html .= "<p class='con_in'><img class='biosPhoto' src='$row[bios_foto]'></p>";
			$html .= "<p>$row[bios_info]</p>";
			if ($row['bios_diensten'] !== null) {
				$html .= "<h2>Extra mogelijkheden: </h2>";
				$html .= "$row[bios_diensen]";
			}
			$html .= "</div>";
			$html .= "<div class='col-2'>";
			$html .= "<h3><strong>Contact gegevens:</strong></h3>";
			$html .= "<p>$row[bios_adres]<br />";
			$html .= "$row[bios_plaats]</p>";
			$html .= "<p>Telefoon nummer: $row[bios_tel]</p>";
			$html .= "</div>";
		}

		$html .= "</section>";
		return $html;
	}

	public function deleteBios()
	{
		$result = $this->bioscopen->delete();
		include 'view/beheerder/deleteBios.php';
	}
}
