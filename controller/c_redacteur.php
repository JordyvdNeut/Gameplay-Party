<?php
require_once 'model/m_beheerdersLogic.php';
require_once 'controller/c_htmlBeheerder.php';

class RedacteurController
{

  public function __construct()
  {
    $this->beheerdersLogic = new BeheerdersLogic();
    $this->HTMLBeheerderController = new HTMLBeheerderController();
  }

  public function __destruct()
  { }


  public function collectUpdateHomeconForm($id)
  {
    $homeContent = $this->beheerdersLogic->readHomeCon($id);
    require_once "view/beheerder/header.php";
    include 'view/beheerder/redacteur/upHomeCon.php';
  }

  public function collectUpdateHomecon()
  {
    $formData = $_REQUEST;
    $feedback = $this->beheerdersLogic->updateHomeContent($formData);
    require_once "view/beheerder/header.php";
    include 'view/beheerder/feedback.php';
  }

  public function collectUpdateContactconForm($id)
  {
    $contactContent = $this->beheerdersLogic->readContactCon($id);
    require_once "view/beheerder/header.php";
    include 'view/beheerder/redacteur/upContactCon.php';
  }

  public function collectUpdateContactcon()
  {
    $formData = $_REQUEST;
    $feedback = $this->beheerdersLogic->updateContactContent($formData);
    require_once "view/beheerder/header.php";
    include 'view/beheerder/feedback.php';
  }

  public function formHomeCont()
  {
    include 'view/beheerder/redacteur/addHomeCon.php';
  }

  public function addHomeCont()
  {
    $creating = $_REQUEST;
    $result = $this->beheerdersLogic->addHomeCont($creating);
    $feedback = "<br/>Uw teksten zijn toegevoegd en worden nu op de homepagina getoond.";
    include 'view/beheerder/feedback.php';
  }
}
