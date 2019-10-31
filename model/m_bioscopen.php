<?php

require_once('model/m_DataHandler.php');

class Bioscopen
{

  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
  }

  public function __destruct()
  { }

  public function readBioscopen()
  {
    try {
      $sql = "SELECT * FROM bioscopen";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readBios($id)
  {
    try {
      $sql = "SELECT * FROM bioscopen WHERE bios_id = $id";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }
  public function readBiosBeschik($id)
  {
    try {
      $sql = "SELECT bes_id, zaal_nr, datum, beg_tijd,eind_tijd,plaatsen,invalide 
      FROM beschikbaarheid NATURAL JOIN zalen 
      WHERE bios_id = $id 
      AND beschik = true 
      AND datum >= CURRENT_DATE()
      ORDER BY datum ASC, beg_tijd ASC, zaal_nr ASC";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readAvailability($date, $id)
  {
    try {
      $sql = "SELECT bes_id, zaal_nr, datum, beg_tijd,eind_tijd,plaatsen,invalide 
      FROM beschikbaarheid NATURAL JOIN bioscopen NATURAL JOIN zalen 
      WHERE datum = '$date' 
      AND bios_id = $id 
      AND beschik = true 
      AND datum >= CURRENT_DATE()
      ORDER BY datum ASC, beg_tijd ASC, zaal_nr ASC";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }
}
