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
      $sql = "SELECT contact_id id, overons 'Over ons', email Email, emailText 'Email text' FROM contact";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readContactCon($id)
  {
    try {
      $sql = "SELECT * FROM contact WHERE contact_id = $id";
      $results = $this->DataHandler->readsData($sql);
      return $results->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readHomePost($id)
  {
    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT zaal_nr Zaal ,	datum Datum,	beg_tijd 'Begin tijd',	eind_tijd 'Eind tijd' FROM beschikbaarheid NATURAL JOIN bioscopen NATURAL JOIN zalen WHERE beschik = 'false' AND bios_id = $bios_id ORDER BY datum ASC, zaal_nr ASC, beg_tijd ASC";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readHomePost($id){
    $postId = $id;
    try {
      $sql = "SELECT titel, inhoud FROM homecontent WHERE homeCon_id = $postId";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function sendEmail($creating)
  {
    $name         = $creating["name"];
    $email        = $creating["email"];
    $subject      = $creating["subject"];
    $infomessage  = $creating["infomessage"];
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
      return $result ? "<h3><strong>Content is <span style='color: green'>succesvol</span> bewerkt!</strong></h3>" : "<h3 style='color:red;'><strong>Het bewerken van de content is niet gelukt</strong></h3>";
    } catch (exception $e) {
      throw $e;
    }
  }

  public function updateContactContent($formData)
  {

    $email = $formData['email'];
    $overons = $formData['overons'];
    try {
      $sql = "UPDATE contact SET email = '$email' , overons = '$overons' WHERE contact_id = 1";
      $result = $this->DataHandler->updateData($sql);
      return $result ? "<h3><strong>Contact pagina is <span style='color: green'>succesvol</span> bewerkt!</strong></h3>" : "<h3 style='color:red;'><strong>Het bewerken van de contact pagina is niet gelukt</strong></h3>";
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readsBiosContent()
  {
    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT bios_id id, bios_tel 'Telefoon nummer', bios_info 'Bioscoop informatie', bios_foto 'Afbeelding gebouw', bios_ins 'Afbeelding zaal' FROM bioscopen WHERE bios_id = $bios_id";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readsBiosCon()
  {
    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT * FROM bioscopen WHERE bios_id = $bios_id";
      $result = $this->DataHandler->readsData($sql);
      return $result->fetch(PDO::FETCH_ASSOC);
    } catch (exception $e) {
      throw $e;
    }
  }

  public function updateBiosContent($formData)
  {
    $bios_id = $_SESSION['bios_id'];
    $bios_tel = $formData['bios_tel'];
    $bios_info = $formData['bios_info'];
    $bios_foto = $formData['bios_foto'];
    $bios_ins = $formData['bios_ins'];

    try {
      $sql = "UPDATE bioscopen SET bios_tel = '$bios_tel' , bios_info = '$bios_info' , bios_foto = '$bios_foto' , bios_ins = '$bios_ins' WHERE bios_id = $bios_id";
      $result = $this->DataHandler->updateData($sql);
      return $result ? "<h3><strong>Gegevens van de bioscoop zijn <span style='color: green'>succesvol</span> bewerkt!</strong></h3>" : "<h3 style='color:red;'><strong>Het bewerken van de gegevens is niet gelukt</strong></h3>";
    } catch (exception $e) {
      throw $e;
    }
  }

  // public function collectRadio()
  // {
  //   $zaal           = $creating["zaal_id"];
  //   $beg_tijd     = $creating["beg_tijd"];
  //   $eind_tijd    = $creating["eind_tijd"];
  //   $datum       = $creating["datum"];
  //   try {
  //     $sql = "INSERT INTO beschikbaarheid (zaal_id, datum, beg_tijd, eind_tijd) VALUES ('$zaal', '$datum',  '$beg_tijd', '$eind_tijd')";
  //     $result = $this->DataHandler->createData($sql);
  //     return $result;
  //   } catch (exception $e) {
  //     throw $e;
  //   }
  // }

  public function collectRadio(){

    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT zaal_nr, zaal_id FROM zalen WHERE bios_id = $bios_id";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception  $e) {
      throw $e;
    }
  }

  public function addHomeCont($creating)
  {
    $titel = $creating["titel"];
    $tekst = $creating["tekst"];
    try {
      $sql = "INSERT INTO homecontent(homeCon_id, titel, inhoud) VALUES ('' , '$titel', '$tekst')";
      $result = $this->DataHandler->createData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readBeschik($id)
  {
    try {
      $sql = "SELECT bes_id id, zaal_id, zaal_nr,	datum,	beg_tijd,	eind_tijd, beschik FROM beschikbaarheid 
      NATURAL JOIN bioscopen NATURAL JOIN zalen WHERE bes_id = $id 
      ORDER BY datum ASC, zaal_nr ASC, beg_tijd ASC";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readAvailabilty()
  {
    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT bes_id id, zaal_nr Zaal,	datum Datum,	beg_tijd 'Begin tijd',	eind_tijd 'Eind tijd' FROM beschikbaarheid NATURAL JOIN bioscopen NATURAL JOIN zalen WHERE beschik = 'false' AND bios_id = $bios_id ORDER BY datum ASC, zaal_nr ASC, beg_tijd ASC";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readunavailable()
  {
    $bios_id = $_SESSION['bios_id'];
    try {
      $sql = "SELECT bes_id id, zaal_nr Zaal,	datum Datum,	beg_tijd 'Begin tijd',	eind_tijd 'Eind tijd' FROM beschikbaarheid NATURAL JOIN bioscopen NATURAL JOIN zalen WHERE beschik = 'true' AND bios_id = $bios_id ORDER BY datum ASC, zaal_nr ASC, beg_tijd ASC";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function addBeschik($creating)
  {
    $zaal           = $creating["zaal_id"];
    $beg_tijd     = $creating["beg_tijd"];
    $eind_tijd    = $creating["eind_tijd"];
    $datum       = $creating["datum"];
    try {
      $sql = "INSERT INTO beschikbaarheid (zaal_id, datum, beg_tijd, eind_tijd) VALUES ('$zaal', '$datum',  '$beg_tijd', '$eind_tijd')";
      $result = $this->DataHandler->createData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function updateBeschik($formData)
  {
    $bes_id = $formData['id'];
    $datum = $formData['datum'];
    $beg_tijd = $formData['beg_tijd'];
    $eind_tijd = $formData['eind_tijd'];
    $beschik = $formData['beschik'];

    try {
      $sql = "UPDATE beschikbaarheid SET datum = '$datum' , beg_tijd = '$beg_tijd' , eind_tijd = '$eind_tijd' , beschik = '$beschik' WHERE bes_id = $bes_id";
      $result = $this->DataHandler->updateData($sql);
      return $result ? "<h3><strong>De beschikbaarheid is <span style='color: green'>succesvol</span> bewerkt!</strong></h3>" : "<h3 style='color:red;'><strong>Het bewerken van de beschikbaarheid is niet gelukt</strong></h3>";
    } catch (exception $e) {
      throw $e;
    }
  }
}
