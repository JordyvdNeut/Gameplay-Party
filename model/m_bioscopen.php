<?php

require_once('model/m_DataHandler.php');

class bioscopen{

    public function __construct() {
        $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
    }

    public function __destruct(){}

    public function addBios(){
        try {
          /*$sql = 'INSERT INTO * FROM ';
          $result = $this->DataHandler->createData($sql);
          return $result;*/
         } catch (exception $e) {
          throw $e;
        }
      }
    
      public function readsBioscopen(){
        try { 
          $sql = 'SELECT * FROM bioscopen';
          $result = $this->DataHandler->readsData($sql);
          return $result;
        } catch (exception $e) {
          throw $e;
        }
      }
    
      public function readBois($id){
        try {
            /*$sql = 'SELECT * FROM bioscopen WHERE id =  ';
          $result = $this->DataHandler->readData($sql);
          return $result;*/
        } catch (exception $e) {
          throw $e;
        }
      }
    
      public function update($id){
        try {
          /*$sql = 'UPDATE * SET WHERE id =  ';
          $result = $this->DataHandler->updateData($sql);
          return $result;*/
         } catch (exception $e) {
          throw $e;
        }
      }
    
      public function delete($id){
        try {
          /*$sql = 'DELETE * FROM bioscopen WHERE id = ';
          $result = $this->DataHandler->deleteData($sql);
          return $result;*/
    
         } catch (exception $e) {
          throw $e;
        }
      }
}


