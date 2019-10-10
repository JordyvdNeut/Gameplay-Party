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
    //AND beschik = 1 
    try {
      $sql = "SELECT zaal_nr, datum, beg_tijd,eind_tijd,plaatsen,invalide FROM beschikbaarheid NATURAL JOIN zalen WHERE bios_id = $id ORDER BY datum ASC, beg_tijd ASC, zaal_nr ASC";   
      $result = $this->DataHandler->readsData($sql);
          return $result;
        } catch (exception $e) {
      throw $e;
    }
  }
  public function updateBios($id){
    try {
       /*$sql = "UPDATE * SET WHERE id =UPDATE bioscopen SET bios_info = '$' WHERE bios_id = $;  ";
       $result = $this->DataHandler->updateData($sql);
       return $result;*/
    } catch (exception $e) {
       throw $e;
    }
  }

  
}