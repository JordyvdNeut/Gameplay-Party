<?php
require_once 'model/m_DataHandler.php';

class BeheerdersLogic{

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

  public function readHome(){
    try { 
      $sql = "SELECT * FROM homecontent";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }
  public function sendEmail($creating){
    $name           = $creating["name"];
    $email     = $creating["email"];
    $subject         = $creating["subject"];
    $infomessage          = $creating["infomessage"];
  try{
   $sql = "INSERT INTO `email` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$infomessage')";
   $result = $this->DataHandler->createData($sql);
   return $result;
  } catch (exception $e) {
    throw $e;
  }
  }

  /*
  public function readFooter(){
    try { 
      $sql = "SELECT * FROM footer";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }
*/

  public function collectOverons(){
      try {
        $sql = "SELECT * FROM contact";
        $results = $this->DataHandler->readsData($sql);
        return $results;
      } catch (exception $e) {
        throw $e;
      }
  }

  public function read($id){
    try {
      /*$sql = 'SELECT * FROM  WHERE id = ' $id ';';
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
      /*$sql = 'DELETE * FROM  WHERE id = ';
      $result = $this->DataHandler->readsData($sql);
      return $result;*/
     } catch (exception $e) {
      throw $e;
    }
  }
}