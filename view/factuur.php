<title>Factuur</title>
<body>
<!-- <img class="logofactuur" src="view/images/gpp.svg" alt="Gameplay Party"> -->
  <?php
  // var_dump($creating);
  // var_dump($_REQUEST);
$html = "";
$html .= "<div class='container'>";
$html .= "<div class='header'></div>";
$html .= "<article class='row'>";
$html.="<div class='col-12 print'><button class='btn'onClick='window.print()'>Print factuur</button></div>";
$html .= "<div class='col-7 ral rot reshead'><h1>Reservering</h1></div>"; 

while ($row = $biosDetails->fetch(PDO::FETCH_ASSOC)) {
$html .= "<div class='col-5 ral resbiosinfo'>";
$html .= "$row[bios_naam]<br />";
$html .= "$row[bios_adres] <br />";
$html .= "$row[bios_plaats] <br />";
$bios_info="$row[bios_info]";
$biosid="$row[bios_id]";
$biosnaam="$row[bios_naam]";
$html .= "</div>";
}

$html .="<div class='col-7 resinfo'>";
$html .="<strong>Klant: </strong>". $creating['naam']. "<br/>";
$html .= "<strong>Adres: </strong>". $creating['adres']. "<br />";
$html .= "<strong>Plaats: </strong>". $creating['woonplaats']. "<br />";
$html .= "<strong>Telefoonnummer: </strong>". $creating['telefoon']. " <br />";    
$html .= "</div>";

while ($row = $reservatie->fetch(PDO::FETCH_ASSOC)) {
$html .= "<div class='col-5 resinfo'>";
$html .= "<div class='row'>";
$html .= "<div class='col-6 odd  '>";
$html .= "<strong>Reserverings ID: GP-$row[res_code]</strong><br>"; 
$html .= "<strong>Datum: $row[res_datum]</strong><br>"; 
$html .= "<strong>Reserveringsdatum: $row[res_datum]</strong><br>";  
$html .= "<strong>Totaal EURO:  €$row[kosten]</strong><br><br>"; 
$html .= "</div>";
$html .= "</div>";
$html .= "</div>";
}
$html .= "<div class='col-12 restablekost'>";
$html .= "<table>";
$html .= "<thead>";
$html .= "<tr class='bob'>";
$html .= "<th class='odd'>Dienst</th>";
$html .= "<th class='odd'>Tarief</th>";
$html .= "<th class='odd'>Bedrag</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";
$html .= "<tr class='bob'><td><strong>Kids GamePlayParty</strong><br></td>";

$create = array('normaal'=>$creating['normaal'],'12tm17'=>$creating['tm17'], 'tm11'=>$creating['tm11'],'plus'=>$creating['plus'],'overig'=>$creating['overig']);
if($creating = $create['normaal']){
  $html  .= "<td><strong>Normaal: </strong>$create[normaal]</td>
<td> €$row[kosten]</td>";
} else if($creating = $create['12tm17']){
  $html  .= "<td><strong>Jeugd12 t/m 17 jaar: </strong>$create[tm17]</td>
<td>€$row[kosten]</td>";
} else if($creating = $create['tm11']){
  $html  .= "<td><strong>T/m 11 jaar: </strong>$create[tm11]</td>
<td>€$row[kosten]</td>";
} else if($creating = $create['65plus']){
  $html  .= "<td><strong>65+: </strong>$create[plus]</td>
<td>€$row[kosten]</td>";
} else if($creating = $create['overig']){
  $html  .= "<td><strong>65+: </strong>$create[overig]</td>
<td>€$row[kosten]</td>";
}
$html .= "</tr>";

//Berekeningen
$btw = $row['kosten'] / 100 * 21;
$totaal = $btw + $row['kosten'];

$html .= "<tr ><td></td><td class='ral'><strong>Subtotaal:</strong></td><td> €$row[kosten]</td></tr>";
$html .= "<tr ><td></td><td class='ral'><strong>BTW 21%:</strong></td><td> €$btw</td></tr>";
$html .= "<tr ><td></td><td class='ral'><strong>Totaal:</strong></td><td> €$totaal</td></tr>";

$html .= "</tbody>";
$html .= "</table>";
$html .= "</div>";
}


$html .= "<div class='col-12 bob'><h2>Informatie over $bios_naam</h2></div>";
$html .= "<div class='col-12 bob'>";
// $html .= "<div class='row'>";
$html .= $bios_info;
$html .= "</div>";

$html .= "<div class='col-4 ral titelkeuze'>";
$html .= "<p><strong>Reguliere tarieven:</strong></p>";
$html .= "</div>";

$html .= "<div class='col-8 tkeuzes'>";
while ($row = $tarieven->fetch(PDO::FETCH_ASSOC)) {
  $html .= "<table>";
  $html .= "<tr>";
  foreach ($row as $key => $value) {
    $html .= "<th>{$key}</th>";
  }
  $html .= "</tr>";
  $html .= "<tr>";
  foreach ($row as $value) {
    $html .= "<td>€{$value}</td>";
  }
  $html .= "</tr>";
  $html .= "</table>";
}
$html .= "</div>";

while ($row = $Toeslagen->fetch(PDO::FETCH_ASSOC)) {
  $html .= "<div class='col-4 ral toeslag titelkeuze'>";
$html .= "<p><strong>Toeslagen:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8 keuzes'>";
$html .= "<table>";
$html .= "<tr>";
foreach ($row as $key => $value) {
  $html .= "<th></th>";
}
$html .= "</tr>";
$html .= "<tr>";
foreach ($row as $value) {
  $html .= "<td>{$value}</td>";
}
$html .= "</tr>";
$html .= "</table>";
$html .= "</div>";
}

$html .= "<div class='col-4 ral'>";
if($biosid==1){
$html .= "<p><strong>Voorwaarden:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.";
$html .= "</div>";
$html .= "<div class='col-4 ral'>";
$html .= "<p><strong>Bereikbaarheid auto:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "<p>Met de auto bereikt u Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding 'Jaarbeurs' te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid. Parkeren op het Jaarbeursterrein is per 1 mei gratis voor alle automobilisten die een kaartje voor de film hebben gekocht.</p>";
$html .= "</div>";
$html .= "<div class='col-4 ral'>";
$html .= "<p><strong>Bereikbaarheid OV:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "<p>Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden ‘Jaarbeursplein’ en loop richting de Jaarbeurshallen. Binnen enkele minuten vindt u de bioscoop aan uw linkerhand.</p>";
$html .= "</div>";
$html .= "<div class='col-4 ral'>";
$html .= "<p><strong>Bereikbaarheid Fiets:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "<p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>";
$html .= "</div>";
$html .= "<div class='col-4 ral'>";
$html .= "<p><strong>Rolstoeltoegankelijkheid:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "<p>Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.</p>";
$html .= "</div>";        

$html .= "<div class='col-4 ral'>";
$html .= "<p><strong>Voorwaarden:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8'>";
$html .= "<p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>";
}else if ($biosid==2){
  $html .= "<p><strong>Voorwaarden:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.";
  $html .= "</div>";
  $html .= "<div class='col-4 ral'>";
  $html .= "<p><strong>Bereikbaarheid auto:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "<p>In Den Helder volgt u de ANWB borden richting Willemsoord, de bioscoop bevindt zich op dit terrein. De ingang van Willemsoord zit aan de route voor de veerboot naar Texel. Parkeren kan gratis op het Willemsoord terrein.</p>";
  $html .= "</div>";
  $html .= "<div class='col-4 ral'>";
  $html .= "<p><strong>Bereikbaarheid OV:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "<p>Kinepolis Den Helder is vanaf het trein- en busstation van CS Den Helder op 10-15 minuten loopafstand. Volg hiervoor de borden 'Willemsoord'. </p>";
  $html .= "</div>";
  $html .= "<div class='col-4 ral'>";
  $html .= "<p><strong>Bereikbaarheid Fiets:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "<p>Willemsoord is goed bereikbaar per fiets. Volg hiervoor de borden 'Willemsoord'. Voor de bioscoop zijn fietsenrekken aanwezig.</p>";
  $html .= "</div>";
  $html .= "<div class='col-4 ral'>";
  $html .= "<p><strong>Rolstoeltoegankelijkheid:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "<p>Kinepolis Den Helder is grotendeels rolstoeltoegankelijk, neem contact op met de bioscoop voor meer informatie. Er is een lift en mindervalidentoilet aanwezig.</p>";
  $html .= "</div>";        
  
  $html .= "<div class='col-4 ral'>";
  $html .= "<p><strong>Voorwaarden:</strong></p>";
  $html .= "</div>";
  $html .= "<div class='col-8'>";
  $html .= "<p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling.</p>"; 
}else if ($biosid==3){
      $html .= "<p><strong>Voorwaarden:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.";
      $html .= "</div>";
      $html .= "<div class='col-4 ral'>";
      $html .= "<p><strong>Bereikbaarheid auto:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "<p>Met de auto bereikt u Kinepolis Almere door richting 'Centrum' te volgen. Rondom Kinepolis Almere is volop parkeergelegenheid. De P6 Hospitaalgarage of P7 Schippersgarage zijn het gunstigst gelegen t.o.v. de bioscoop. Parkeert u na 18:00 uur, dan geldt het maximale avondtarief van €5,25 voor de hele avond. </p>";
      $html .= "</div>";
      $html .= "<div class='col-4 ral'>";
      $html .= "<p><strong>Bereikbaarheid OV:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "<p>U kunt ons met de trein en bus zeer makkelijk bereiken. Vanaf station Almere Centrum loopt u in circa 5 minuten in zuidelijke richting richting naar Almere Citymall. Kinepolis Almere is tevens goed bereikbaar per bus via haltes Passage (buslijn M1 & M4) en Flevoziekenhuis (buslijn M5 en M7). </p>";
      $html .= "</div>";
      $html .= "<div class='col-4 ral'>";
      $html .= "<p><strong>Bereikbaarheid Fiets:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "<p>Citymall Almere heeft diverse (bewaakte) fietsenstallingen, bijvoorbeeld aan de Hospitaaldreef.</p>";
      $html .= "</div>";
      $html .= "<div class='col-4 ral'>";
      $html .= "<p><strong>Rolstoeltoegankelijkheid:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "<p>Kinepolis Almere heeft in elke zaal mindervalide plaatsen. Tevens zijn er mindervalide toiletten en een lift aanwezig.</p>";
      $html .= "</div>";        
      
      $html .= "<div class='col-4 ral'>";
      $html .= "<p><strong>Voorwaarden:</strong></p>";
      $html .= "</div>";
      $html .= "<div class='col-8'>";
      $html .= "<p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling.</p>";
      }
// $html .= "</div>";
// $html .= "<div class='col-12'>";
// $html .= "<table>";
// $html .= "<thead>";
// $html .= "<tr class='bob'>";
// $html .= "<th>Zaal</th>";
// $html .= "<th>Aantal stoelen</th>";
// $html .= "<th>Rolstoelplaatsen</th>";
// $html .= "<th>Schermgrootte</th>";
// $html .= "<th>Faciliteiten</th>";
// $html .= "<th>Versies</th>";
// $html .= "</tr>";
// $html .= "</thead>";
// $html .= "<tbody>";
// $html .= "<tr class='odd'><td>1</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class='screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden' title='Toegankelijk voor andersvaliden'>Toegankelijk voor andersvaliden</span></td><td><div class='screen-technology icon icon-screen-technology-laser' title='Laser'><span>Laser</span></div><div class='screen-technology icon icon-screen-technology-dolby-71' title='Dolby 7.1'><span>Dolby 7.1</span></div></td></tr>";
// $html .= "<tr class='even'><td>2</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class='screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden' title='Toegankelijk voor andersvaliden'>Toegankelijk voor andersvaliden</span></td><td><div class='screen-technology icon icon-screen-technology-laser' title='Laser'><span>Laser</span></div><div class='screen-technology icon icon-screen-technology-dolby-71' title='Dolby 7.1'><span>Dolby 7.1</span></div></td></tr>";
// $html .= "</table>";
// $html .= "</div>";
// $html .= "</article>";
// $html .= "</div>";
echo $html;
    ?>
  </body>
