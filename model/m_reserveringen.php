<?php
require_once 'model/m_DataHandler.php';

class reserveringenModel
{

  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
  }

  public function __destruct()
  { }

  public function getZaalDetail($bes_id)
  {
    try {
      $sql = "SELECT omschr, kosten 
      FROM beschikbaarheid b 
      NATURAL JOIN zaal_diensten zd NATURAL JOIN diensten d 
      WHERE b.bes_id = $bes_id";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function getBeschikDetail($bes_id)
  {
    try {
      $sql = "SELECT zaal_nr, datum, beg_tijd, eind_tijd
      FROM beschikbaarheid b 
      NATURAL JOIN zalen z 
      WHERE b.bes_id = $bes_id";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function getTarieven()
  {
    try {
      $sql = "SELECT normaal 'Normaal', tm11 '0 tot 12 Jaar',  12tm17 '12 tot 18 Jaar', 65plus '65+' , overig 'Overig' FROM tarieven";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }
  public function getToeslagen($id)
  {
    try {
      $sql = "SELECT omschr,kosten FROM diensten NATURAL JOIN zaal_diensten WHERE zaal_id=$id";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function getReservatie($id)
  {
    try {
      $sql = "SELECT * FROM reserveringen NATURAL JOIN beschikbaarheid WHERE bes_id=$id";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function addReser($creating){
    $bes_id = $creating['id'];
    $klant_naam = $creating['naam'];
    $klant_adres = $creating['adres'];
    $klant_pc = $creating['postcode'];
    $klant_plaats = $creating['woonplaats'];
    $klant_nr = $creating['telefoon'];
    $datum = date('Y-m-d');
    $aant_pers = $creating['normaal'] + $creating['tm17'] + $creating['tm11'] + $creating['plus'] + $creating['overig'];

    $bedrag = $this->berekBedrag($creating)->fetch(PDO::FETCH_ASSOC);
    $totaalBed = $bedrag['Bedrag'];

    $updateBeschik = $this->updateBeschik($bes_id);

    try{
      $sql = "INSERT INTO reserveringen( klant_naam, klant_adres, klant_pc, klant_plaats, klant_tel, res_datum, aant_pers, bes_id, kosten) 
                  VALUES ('$klant_naam', '$klant_adres', '$klant_pc', '$klant_plaats','$klant_nr', '$datum', '$aant_pers', '$bes_id'
                  , '$totaalBed')";
      $factuur = $this->DataHandler->createData($sql);
      return $factuur;
    }catch(exception $e){
      throw $e;
    }
  }

  public function updateBeschik($bes_id){
    try{
      $sql = "UPDATE beschikbaarheid SET beschik = 0 WHERE bes_id = $bes_id";
      $update = $this->DataHandler->updateData($sql);
    }catch(exception $e){
      throw $e;
    }
  }

  public function berekBedrag($creating){
    try{
      $normaal = intval($creating['normaal']);
      $tm11 = intval($creating['tm11']);
      $jongeren = intval($creating['tm17']);
      $ouderen = intval($creating['plus']);
      $overig = intval($creating['overig']);

      $sql = "SELECT SUM(($normaal * normaal) + ($tm11 * tm11) + ($jongeren * 12tm17) + ($ouderen *65plus) + ($overig * overig)) AS Bedrag FROM tarieven";
      $bedrag = $this->DataHandler ->readsData($sql);
      return $bedrag;
    }catch (exception $e){
      throw $e;
    }
  }
}
