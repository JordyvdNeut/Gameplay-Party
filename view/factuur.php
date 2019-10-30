<title>Factuur</title>
<body>
<!--<img class="logofactuur" src="view/images/gpp.svg" alt="Gameplay Party">-->
  <?php

$html = "";
var_dump($creating);
$html = "<h1>". $creating['naam']. "</h1>";
$html .= "<div class='container'>";
$html .= "<div class='header'></div>";
$html .= "<article class='row'>";
$html.="<div class='col-12 print'><button class='btn'onClick='window.print()'>Print factuur</button></div>";
$html .= "<div class='col-7 ral rot reshead'><h1>Reservering</h1></div>"; 
while ($row = $biosDetails->fetch(PDO::FETCH_ASSOC)) {
$html .= "<div class='col-5 ral resbiosinfo'>";
$html .= "$row[bios_naam] <br />";
$html .= "<br />";
$html .= "$row[bios_adres] <br />";
$html .= "$row[bios_plaats] <br />";
$html .= "</div>";
}
while ($row = $reservatie->fetch(PDO::FETCH_ASSOC)) {
$html .="<div class='col-7 resinfo'>";
$html .="<strong>Klant: </strong>$row[klant_naam]<br/>";
$html .= "<strong>Adres: </strong>$row[klant_adres] <br />";
$html .= "<strong>Plaats: </strong>$row[klant_plaats] <br />";
$html .= "<strong>Telefoonnummer: </strong>$row[klant_tel] <br />";    
$html .= "</div>";
// }

$html .= "<div class='col-5 resinfo'>";
$html .= "<div class='row'>";
$html .= "<div class='col-6 odd  '>";
$html .= "<strong>Reserverings ID:</strong><br>"; 
$html .= "<strong>Datum:</strong><br>"; 
$html .= "<strong>Reserveringsdatum:</strong><br>";  
$html .= "<strong>Totaal EURO:</strong><br><br>"; 
$html .= "</div>";
// while ($row = $reservatie->fetch(PDO::FETCH_ASSOC)) {
$html .= "<div class='col-6 bob resmain'>";
$html .= "$row[res_code]<br>";
$html .= "$row[res_datum]<br>";
$html .= "$row[res_datum]<br>";
$html .= "$row[kosten]<br>";
$html .= "</div>";
}
$html .= "</div>";
$html .= "</div>";

$html .= "<div class='col-12 restablekost '>";
$html .= "<table>";
$html .= "<thead>";
$html .= "<tr class='bob'>";
$html .= "<th class='odd'>dienst</th>";
$html .= "<th class='odd'>tarief</th>";
$html .= "<th class='odd'>bedrag</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";
$html .= "<tr class='bob'><td><strong>Kids GamePlayParty</strong><br>Vrijdag 14 oktober, 2018</td><td><strong>Kinderen t/m 11 jaar:</strong> 8 @ €20,00</td><td>€160,00<br><br></td></tr>";
$html .= "<tr class='bob'><td><strong>Laser ULTRA</strong><br>Vrijdag 14 oktober, 2018</div></td><td><strong>Toeslag:</strong> 8 @ €2,50<br><br></td><td>€ 20,00<br><br></td></tr>";
$html .= "<tr ><td></td><td class='ral'><strong>Subtotaal:</strong></td><td>€180,00</td></tr>";
$html .= "<tr ><td></td><td class='ral'><strong>BTW 21%:</strong></td><td>€ 37,80</td></tr>";
$html .= "<tr ><td></td><td class='ral'><strong>Totaal:</strong></td><td>€217,80</td></tr>";
$html .= "<tr ><td class='bob'></td><td class='ral bob'><strong>Reeds voldaan:</td><td class='bob'>€ 54,45</td></tr>";
$html .= "<tr ><td></td><td class='ral'>Nog te voldoen (75%):<td class='hil'><strong>€163,35</strong></td></tr>";
$html .= "</table>";
$html .= "</div>";
$html .= "<div class='col-12'><strong>Betalingen: </strong>14-10-2018 <strong>€ 54,45 </strong>(MasterCard 1243)</div>";
$html .= "<div class='col-12 bob'><h2>Informatie over Kinepolis Jaarbeurs Utrecht</h2></div>";
$html .= "<div class='col-12 bob'>";
// $html .= "<div class='row'>";
$html .= "<p>Met Kinepolis Jaarbeurs (14 zalen, 3200 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland. Kinepolis Jaarbeurs biedt elke filmbezoeker ‘the ultimate cinema experience’: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau.</p>";
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
    $html .= "<td>{$value}</td>";
  }
  $html .= "</tr>";
  $html .= "</table>";
}

$html .= "</div>";
$html .= "<div class='col-4 ral toeslag titelkeuze'>";
$html .= "<p><strong>Toeslagen:</strong></p>";
$html .= "</div>";
$html .= "<div class='col-8 keuzes'>";
$html .= "€ 0,50 | toeslag bij film van 135 minuten en langer<br>";
$html .= "€ 1,50 | 3D-toeslag excl. bril<br>";
$html .= "€ 2,60 | 3D-toeslag incl. bril<br>";
$html .= "€ 1,50 | Dolby Atmos<br>";
$html .= "€ 2,50 | Laser ULTRA<br>";
$html .= "€ 2,50 | COSY";

$html .= "</div>";
$html .= "<div class='col-4 ral'>";
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
$html .= "</div>";
$html .= "<div class='col-12'>";
$html .= "<table>";
$html .= "<thead>";
$html .= "<tr class='bob'>";
$html .= "<th>Zaal</th>";
$html .= "<th>Aantal stoelen</th>";
$html .= "<th>Rolstoelplaatsen</th>";
$html .= "<th>Schermgrootte</th>";
$html .= "<th>Faciliteiten</th>";
$html .= "<th>Versies</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";
$html .= "<tr class='odd'><td>1</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class='screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden' title='Toegankelijk voor andersvaliden'>Toegankelijk voor andersvaliden</span></td><td><div class='screen-technology icon icon-screen-technology-laser' title='Laser'><span>Laser</span></div><div class='screen-technology icon icon-screen-technology-dolby-71' title='Dolby 7.1'><span>Dolby 7.1</span></div></td></tr>";
$html .= "<tr class='even'><td>2</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class='screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden' title='Toegankelijk voor andersvaliden'>Toegankelijk voor andersvaliden</span></td><td><div class='screen-technology icon icon-screen-technology-laser' title='Laser'><span>Laser</span></div><div class='screen-technology icon icon-screen-technology-dolby-71' title='Dolby 7.1'><span>Dolby 7.1</span></div></td></tr>";
$html .= "</table>";
$html .= "</div>";
$html .= "</article>";
$html .= "</div>";
echo $html;
    ?>
  </body>
