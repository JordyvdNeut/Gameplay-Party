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
					//Reserveren 
				case 'resForm':
					$this->resController->getResForm();
					break;
				case 'reserveren':
					$this->resController->insertRes();
					$this->resController->getFactuur();
					break;
				case 'getOverzichtReservering':
					$this->resController->getOverzichtReservering();
					break;
					// Beheerders
				case 'beHome':
					$this->beheerdersController->collectHome();
					break;
					// Bioscoop beheerder
				case 'readBiosCon':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->collectBioscon();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'searchBeschikBios':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->searchbiosBeschik();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updatBiosConForm':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->collectUpdateBiosconForm();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'upFormBeschik':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->collectUpFormBeschik($_REQUEST['id']);
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updateBeschik':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->updateBeschik($_REQUEST['id']);
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updateBiosCon':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->collectUpdateBioscon();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'addBeschik':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->addBeschik();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'addForm':
					if ($_SESSION['user_role'] == 2) {
						$this->beheerdersController->collectAddBeschik();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
					// Redacteur
				case 'homePost':
					if ($_SESSION['user_role'] == 3) {
						$this->userController->collectHomePost($_REQUEST['id']);
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'formHomeCont':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->formHomeCont();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'addHomeCont':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->addHomeCont();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updateHomeConForm':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->collectUpdateHomeconform($_REQUEST['id']);
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'deleteHomeConForm':
					$this->redacteurController->collectDeleteHomeconform($_REQUEST['id']);
					break;
				case 'updateHomeCon':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->collectUpdateHomecon();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'deleteHomeCon':
					$this->redacteurController->collectDeleteHomecon();
					break;
				case 'updateHome':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->updateHomeContent();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updateContactConForm':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->collectUpdateContactconForm($_REQUEST['id']);
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'updateContactCon':
					if ($_SESSION['user_role'] == 3) {
						$this->redacteurController->collectUpdateContactcon();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
					// beheerder
				case 'searchReservering':
					if ($_SESSION['user_role'] == 4) {
						$this->beheerdersController->searchReserveringen();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'searchMonth':
					if ($_SESSION['user_role'] == 4) {
						$this->beheerdersController->reserveringenMonth();
					} else {
						header('Location: index.php?op=loginForm');
					}
					break;
				case 'searchReserveringMonth':
					if ($_SESSION['user_role'] == 4) {
						$this->beheerdersController->searchReserveringenMonth($_REQUEST['month'], $_REQUEST['year']);
					} else {
						header('Location: index.php?op=loginForm');
					}
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
				case 'factuur':
					$this->userController->collectfactuur();
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
