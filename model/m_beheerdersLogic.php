<?php
require_once 'model/m_DataHandler.php';

class BeheerdersLogic
{

  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
  }

  public function __destruct()
  { }

  public function readUser($id)
  {
    try {
      $sql = "SELECT * FROM users WHERE user_id = $id";
      $result = $this->DataHandler->readsData($sql);
      return $result->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readHome()
  {
    try {
      $sql = "SELECT * FROM homecontent";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readsHomeCon()
  {
    try {
      $sql = "SELECT homeCon_id id, titel Titel, inhoud Inhoud FROM homecontent";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readHomeCon($id)
  {
    try {
      $sql = "SELECT * FROM homecontent WHERE homeCon_id = $id";
      $result = $this->DataHandler->readsData($sql);
      return $result->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readOverons()
  {
    try {
      $sql = "SELECT * FROM contact";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readOveronsCon()
  {
    try {
      $sql = "SELECT overons 'Over ons', email Email, emailText 'Email text' FROM contact";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readAvailabilty()
  {
    try {
      $sql = "SELECT zaal_id,	datum Datum,	beg_tijd 'Begin tijd',	eind_tijd 'Eind tijd' FROM mogelijkheden WHERE beschik = 'flase'";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function sendEmail($creating)
  {
    $name           = $creating["name"];
    $email     = $creating["email"];
    $subject         = $creating["subject"];
    $infomessage          = $creating["infomessage"];
    try {
      $sql = "INSERT INTO `email` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$infomessage')";
      $result = $this->DataHandler->createData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function updateHomeContent($formData)
  {
    $id = $formData['id'];
    $titel = $formData['title'];
    $inhoud = $formData['inhoud'];
    try {
      $sql = "UPDATE homecontent SET titel = '$titel' , inhoud = '$inhoud' WHERE homeCon_id = $id";
      $result = $this->DataHandler->updateData($sql);
      return $result ? "Content is succesvol bewerkt!" : "Het bewerken van de content is niet gelukt";
    } catch (exception $e) {
      throw $e;
    }
  }

  public function addBeschik($creating){
    $zaal           = $creating["zaal_id"];
    $beg_tijd     = $creating["beg_tijd"];
    $eind_tijd        = $creating["eind_tijd"];
    $datum          = $creating["datum"];
    try {
      $sql = "INSERT INTO mogelijkheden (zaal_id, datum, beg_tijd, eind_tijd) VALUES ('$zaal', '$datum',  '$beg_tijd', '$eind_tijd')";
      $result = $this->DataHandler->createData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function collectRadio(){
    try{
      $sql = "SELECT zaal_nr, zaal_id FROM zalen NATURAL JOIN users NATURAL JOIN bioscopen WHERE bios_id = 'var_dump($_SESSION[bios_id])'";
      $result = $this->DataHandler->readsData($sql);
      var_dump($result);
      return $result;
    } catch(exception  $e){
        throw $e;
    }
  }
}
