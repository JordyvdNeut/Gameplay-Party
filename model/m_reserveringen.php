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

  public function getBestDetail($bes_id)
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

  public function getBiosDetail($bios_id)
  {
    try {
      $sql = "SELECT * FROM bioscopen WHERE bios_id = $bios_id";
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
}
