<?php
require_once 'controller/c_users.php';
require_once 'controller/c_bioscopen.php';
require_once 'controller/c_beheerders.php';
require_once 'controller/c_redacteur.php';
require_once 'controller/c_reserveringen.php';

class RouteController
{

	public function __construct()
	{
		$this->beheerdersController = new BeheerdersController();
		$this->userController = new UserController();
		$this->biosController = new BiosController();
		$this->redacteurController = new RedacteurController();
		$this->resController = new ResController();
	}

	public function __destruct()
	{ }

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
				case 'loginForm':
					$this->userController->collectLogin();
					break;
				case 'overons':
					$this->userController->collectOverOns();
					break;
				case 'createEmail':
					$this->userController->collectCreateEmail();
					break;
				case 'home':
					$this->userController->collectHome();
					break;
				case 'overzicht':
					$this->biosController->collectOverzicht();
					break;
				case 'detail':
					$this->biosController->readBios($_REQUEST['id']);
					break;
				case 'searchBeschik':
					$this->userController->searchuserBeschik($_REQUEST['id']);
					break;
				case 'resForm':
					$this->resController->getResForm();
					break;
				case 'reserveren':
					$this->resController->insertRes();
					$this->resController->getFactuur();
					break;
					// Beheerders
				case 'beHome':
					$this->beheerdersController->collectHome();
					break;
					// Bioscoop beheerder
				case 'readBiosCon':
					$this->beheerdersController->collectBioscon();
					break;
				case 'searchBeschikBios':
					$this->beheerdersController->searchbiosBeschik();
					break;
				case 'updatBiosConForm':
					$this->beheerdersController->collectUpdateBiosconForm();
					break;
				case 'upFormBeschik':
					$this->beheerdersController->collectUpFormBeschik($_REQUEST['id']);
					break;
				case 'updateBeschik':
					$this->beheerdersController->updateBeschik($_REQUEST['id']);
					break;
				case 'updateBiosCon':
					$this->beheerdersController->collectUpdateBioscon();
					break;
				case 'addBeschik':
					$this->beheerdersController->addBeschik();
					break;
				case 'addForm':
					$this->beheerdersController->collectAddBeschik();
					break;
					// Redacteur
				case 'homePost':
					$this->userController->collectHomePost($_REQUEST['id']);
					break;
				case 'formHomeCont':
					$this->redacteurController->formHomeCont();
					break;
				case 'addHomeCont':
					$this->redacteurController->addHomeCont();
					break;
				case 'updateHomeConForm':
					$this->redacteurController->collectUpdateHomeconform($_REQUEST['id']);
					break;
				case 'updateHomeCon':
					$this->redacteurController->collectUpdateHomecon();
					break;
				case 'updateHome':
					$this->redacteurController->updateHomeContent();
					break;
				case 'updateContactConForm':
					$this->redacteurController->collectUpdateContactconForm($_REQUEST['id']);
					break;
				case 'updateContactCon':
					$this->redacteurController->collectUpdateContactcon();
					break;
				case 'searchReservering':
					$this->beheerdersController->searchReserveringen();
					break;
					// Voorwaardes
				case 'cookievw':
					$this->userController->collectCookie();
					break;
				case 'refundvw':
					$this->userController->collectRefund();
					break;
				case 'privacyvw':
					$this->userController->collectPrivacy();
					break;
				case 'privacytermvw':
					$this->userController->collectTerms();
					break;
				case 'voorwaardevw':
					$this->userController->collectVoorwaarde();
					break;
				case 'login':
					$this->beheerdersController->login();
					break;
				case 'loguit':
					$this->beheerdersController->logout();
					break;
				default:
					$this->userController->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}
}
