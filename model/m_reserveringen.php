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
      $sql = "SELECT DISTINCT omschr, kosten
      FROM beschikbaarheid b 
      NATURAL JOIN diensten d 
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
      $sql = "SELECT * FROM tarieven";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }
/*
  public function addReser($creating){
    $  = $creating[""];
    $  = $creating[""];
    $  = $creating[""];
    $  = $creating[""];
    $bes_id = $_REQUEST["bes_id"];

    try{
      $sql = "INSERT INTO reserveringen(res_code, klant_naam, klant_adres, klant_plaats, res_datum, aant_pers, bes_id)  
                  VALUES ('', '', '', '', '', '', '', '')";
      $factuur = $this->DataHandler->createData($sql);
      return $factuur;
    }catch(exception $e){
      throw $e;
    }
  }*/
}
