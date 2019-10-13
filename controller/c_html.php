<?php

class HTMLController
{
	public function __construct()
	{ }

	public function __destruct()
	{ }

	public function createBiosDetail($result, $beschikbaar)
	{
		$html = "";
		$html .= "<section class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			// $row['bios_info'] = wordwrap($row['bios_info'], 500, "<br><br />\n");
			$html .= "<div class='col-9'>";
			$html .= "<div class='content'>";
			$html .= "<h2>$row[bios_naam]</h2>";
			$html .= "<p class='con_in'><img class='biosPhoto' src='$row[bios_ins]'></p>";
			$html .= "<p>$row[bios_info]</p>";
			$html .= "<h4><strong>Aanbetaling</strong></h4>";
			$html .= "<p>Na dat er een reservering is gemaakt word er verwacht dat er bij $row[bios_naam] een aanbetaling word gedaan binnen 48 uur na de reserviring. Dit is nodig om de bestelling te voltooien.</p>";
			$html .= "</div>";
			$html .= "</div>";

			$html .= "<div class='col-2'>";
			$html .= "<div class='content'>";
			$html .= "<h3><strong>Contact gegevens</strong></h3>";
			$html .= "<h4><strong>Adres: </strong></h4>";
			$html .= "<p>$row[bios_adres]<br />";
			$html .= "$row[bios_plaats]</p>";
			$html .= "<h4><strong>Telefoon nummer: </strong></h4>";
			$html .= "<p>$row[bios_tel]</p>";
			$html .= "</div>";
			$html .= "</div>";
		}
		$html .= "<div class='col-12'>";
		$html .= "<div class='beschikcontent'>";
		$html .= "<h4><strong>Beschikbare zalen</strong></h4>";
		$html .= "</div>";
		$html .= "</div>";
		
		$html .= "<div class='col-12'>";
		$html .= "<div class='beschikSearch'>";
		$html .= "<form action='?op=searchBeschik&id=$_REQUEST[id]' method='POST'>";
		$html .= "<h3>Zoek op datum</h3>";
		$html .= "<input class='form-control' type='date' name='datum' required/>";
		$html .= "<input class='btn' type='submit' value='Zoeken' />";
		$html .= "</form>";
		$html .= "</div>";
		$html .= "</div>";
		while ($row = $beschikbaar->fetch(PDO::FETCH_ASSOC)) {

			$NLdate = date("d-m-Y", strtotime($row['datum']));
			$begintijd = date("H:i ", strtotime($row['beg_tijd']));
			$eindtijd = date("H:i ", strtotime($row['eind_tijd']));
			$html .= "<div class='col-lg-4' style='margin-bottom:15px;'>";
			$html .= "<div class='infocontent'>";

			$html .= "<h4><strong>Zaal $row[zaal_nr]</strong></h4>";
			$html .= "<p>Datum: $NLdate </p>";
			$html .= "<p>Tijd: $begintijd - $eindtijd</p>";
			$html .= "<p>Aantal stoelen: $row[plaatsen]</p>";
			if ("$row[invalide]" == 1) {
				$html .= "<p>Invalide toegankelijk: Ja </p>";
			} else {
				$html .= "<p>Invalide toegankelijk: Nee</p>";
			}
			$html .= "<button class='btn'>Reserveren binnenkort beschikbaar</button>";
			$html .= "</div>";
			$html .= "</div>";
		}
		$html .= "</section>";
		return $html;
	}

	public function createBiosDiv($result)
	{
		$html = "";
		$html .= "<div class='center'><div class='row'>";

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$row['bios_info'] = substr($row['bios_info'], 0, 250);
			$html .= "<div class='col-6' style='padding-bottom: 15px;'>";
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
}
