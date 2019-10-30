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
  public function getReservatie()
  {
    try {
      $sql = "SELECT klant_naam,klant_adres, klant_plaats, klant_tel ,res_code,res_datum,res_tijd,kosten FROM reserveringen WHERE res_code=2";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function addReser($creating){
    $bes_id = $creating['bes_id'];
    $klant_naam = $creating['naam'];
    $klant_adres = $creating['adres'];
    $klant_pc = $creating['post_code'];
    $klant_plaats = $creating['plaats'];
    $klant_nr = $creating['telefoon'];
    $aant_pers = $creating['normaal'] + $creating['12tm17'] + $creating['tm11'] + $creating['65plus'] + $creating['overig'];

    $bedrag = $this->berekBedrag($creating);

    try{
      $sql = "INSERT INTO reserveringen(res_code, klant_naam, klant_adres, klant_pc, klant_plaats, klant_tel res_datum, aant_pers, bes_id, kosten) 
                  VALUES ('', '$klant_naam', '$klant_adres', '$klant_pc', '$klant_plaats','$klant_nr', '', '$aant_pers', '$bes_id', '$bedrag' )";
      $factuur = $this->DataHandler->createData($sql);
      return $factuur;
    }catch(exception $e){
      throw $e;
    }
  }

  public function berekBedrag($creating){
// + ($tm11 * tm11) + ($12tm17 * 12tm17) + ($ouderen * 65plus) + ($overig * overig) 
    try{
      $normaal = $creating['normaal'];
      $tm11 = $creating['tm11'];
      $jongeren = $creating['12tm17'];
      $ouderen = $creating['65+'];
      $overig = $creating['overig'];

      $sql = "SELECT ('$normaal' * normaal) + ('$tm11' * tm11) + ('$jongeren' * 12tm17) + ('$ouderen' *65plus) + ('$overig' * overig) FROM tarieven";
      $bedrag = $this->DataHandler ->readsData($sql);
      return $bedrag;
    }catch (exception $e){
      throw $e;
    }
  }
}
