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
		$beschikbaar =$this->bioscopen->readBiosBeschik($id);
		$biosPage = $this->createDetail($result,$beschikbaar);
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
			//$row['bios_info'] = wordwrap($row['bios_info'], 500, "<br><br />\n");
			$html .= "<div class='col-5'>";
			$html .= "<div class='content'>";
			$html .= "<h1 class='con_title'>$row[bios_naam]</h1>";
			$html .= "<p class='con_inh'><img class='biosPhoto' src='$row[bios_foto]'><br />";
			$html .= "$row[bios_info]...</p><br />";
			
			$html .= "<a href='index.php?op=detail&id=$row[bios_id]'><button class='btn'>Lees meer</button></a>";
			$html .= "</div>";
			$html .= "</div>";
		}

		$html .= "</div></div>";
		return $html;
	}

	public function createDetail($result,$beschikbaar)
	{
		$html = "";
		$html .= "<section class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			//$row['bios_info'] = wordwrap($row['bios_info'], 500, "<br><br />\n");
			$html .= "<div class='col-9'>";
			$html .= "<div class='content'>";
			$html .= "<h2>$row[bios_naam]</h2>";
			$html .= "<p class='con_in'><img class='biosPhoto' src='$row[bios_ins]'></p>";
			$html .= "<p>$row[bios_info]</p>";
			if ($row['bios_diensten'] !== null) {
				$html .= "<h2>Extra mogelijkheden: </h2>";
				$html .= "$row[bios_diensten]";
			}
			$html .= "</div>";
			$html .= "</div>";

			
			$html .= "<div class='col-2'>";
			$html .= "<div class='content'>";
			$html .= "<h3><strong>Contact gegevens</strong></h3>";
			$html .= "<h4><strong>Adres: </strong></h4>";
			$html .= "<p>$row[bios_adres]<br />";
			$html .= "$row[bios_plaats]</p>";
			$html .= "<p>Telefoon nummer: $row[bios_tel]</p>";
			$html .= "</div>";
			$html .= "</div>";



		}
		$html .= "<div class='col-12'>";
		$html .= "<div class='beschikcontent'>";
		$html .="<h4><strong>Beschikbare zalen</strong></h4>";
		$html .= "</div>";
		$html .= "</div>";
		while ($row = $beschikbaar->fetch(PDO::FETCH_ASSOC)) {
			$gooddate= date("d-m-Y", strtotime($row['datum']));
			$begintime= date("H:i ", strtotime($row['beg_tijd']));
			$endtime= date("H:i ", strtotime($row['eind_tijd']));
			$html .= "<div class='col-lg-4'>";
			$html .= "<div class='infocontent'>";
			$html .= "<h4><strong>Datum: $gooddate </h4>";
			$html .= "<p>Tijd: $begintime - $endtime</p>";
			$html .= "<p>Aantal stoelen: $row[plaatsen]</p>";
			if("$row[invalide]"==1){
				$html .= "<p>Invalide toegankelijk: Ja </p>";
			}else{
				$html .= "<p>Invalide toegankelijk: Nee</p>";
			}
			$html .="<button class='btn'>Reserveren binnekort beschikbaar</button>";
			$html .= "</div>";
			$html .= "</div>";
		}
		// $html .= "<div class='col-9'>";
		// $html .= "<div class='content'>";
		// 	$html .= "<h2>Extra mogelijkheden: </h2>";
		// $html .= "</div>";
		// $html .= "</div>";
		$html .= "</section>";
		return $html;
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
