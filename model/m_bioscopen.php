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
      return $results->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readBios($id)
  {
    try {
      $sql = "SELECT * FROM bioscopen WHERE bios_id = $id";
      $result = $this->DataHandler->readsData($sql);
      return $result->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }
}
