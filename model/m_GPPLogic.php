<?php
require_once 'model/m_DataHandler.php';

class GPPLogic
{

  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "contacts", "root", "");
  }
  public function __destruct()
  { }
  public function create($formData)
  {

    try { } catch (exception $e) {
      throw $e;
    }
  }
  public function reads()
  {
    try { } catch (exception $e) {
      throw $e;
    }
  }
  public function read($id)
  {
    try { } catch (exception $e) {
      throw $e;
    }
  }
  public function update()
  {
    try { } catch (exception $e) {
      throw $e;
    }
  }
  public function delete($id)
  {
    try { } catch (exception $e) {
      throw $e;
    }
  }
}
