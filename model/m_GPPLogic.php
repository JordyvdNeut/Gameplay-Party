<?php
require_once 'model/m_DataHandler.php';

class GPPLogic
{

  public function __construct() {
    $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
  }

  public function __destruct(){}

  public function create($formData){
    try { 

    } catch (exception $e) {
      throw $e;
    }
  }

  public function addBios(){
    try {
      /*$sql = 'INSERT INTO * FROM ';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/
     } catch (exception $e) {
      throw $e;
    }
  }

  public function reads(){
    try { 
      /*$sql = 'SELECT * FROM ';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/
    } catch (exception $e) {
      throw $e;
    }
  }

  public function read($id){
    try {
      /*$sql = 'SELECT * FROM bioscopen WHERE id = ' $id ';';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/
     } catch (exception $e) {
      throw $e;
    }
  }

  public function readBois(){
    try {
      return array("Hier", "Tekst", null);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function update(){
    try {
      /*$sql = 'UPDATE * SET WHERE id =  ';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/
     } catch (exception $e) {
      throw $e;
    }
  }

  public function delete($id){
    try {
      /*$sql = 'DELETE * FROM bioscopen WHERE id = ';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/

     } catch (exception $e) {
      throw $e;
    }
  }
}
