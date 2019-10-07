<?php
require_once 'controller/c_users.php';
require_once 'controller/c_bioscopen.php';
require_once 'controller/c_beheerders.php';

class RouteController
{

	public function __construct()
	{
		$this->beheerdersController = new BeheerdersController();
		$this->userController = new UserController();
		$this->biosController = new BiosController();
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
				case 'beOverzicht':
					$this->beheerdersController->collectBioscopen();
					break;
				case 'login':
					$this->beheerdersController->login();
					break;
				case 'beHome':
					$this->beheerdersController->collectHome();
					break;
				case 'updateHomeConForm':
					$this->beheerdersController->collectUpdateHomeconform($_REQUEST['id']);
					break;
				case 'updateHomeCon':
					$this->beheerdersController->collectUpdateHomecon();
					break;
				case 'updateContactConForm':
					$this->beheerdersController->collectUpdateContactconForm($_REQUEST['id']);
					break;
				case 'updateContactCon':
					$this->beheerdersController->collectUpdateContactcon();
					break;
				case 'updateBios':
					$this->biosController->updateBios();
					break;
				case 'updateHome':
					$this->beheerdersController->updateHomeContent();
					break;
				case 'loguit':
					$this->beheerdersController->logout();
					break;
				case 'addBeschik':
					$this->beheerdersController->addBeschik();
					break;
				case 'addForm':
					$this->beheerdersController->makeRadio();
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
