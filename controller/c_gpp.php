<?php
require_once 'model/m_GPPLogic.php';

class GPPController
{

	public function __construct()
	{
		$this->GPPLogic = new GPPLogic();
	}

	public function __destruct()
	{ }

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
				case 'beOverzicht':
					$this->collectBioscopen();
					break;
				case 'beHome':
					$this->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	public function collectHome()
	{
		include 'view/beheerder/beheerder.php';
	}

	public function collectBioscopen()
	{
		include 'view/overzichtBios.php';
	}

// 	public function email()
// 	{
// 		if((isset($_POST['name']) && !empty($_POST['name']))
// && (isset($_POST['email']) && !empty($_POST['email']))
// && (isset($_POST['subject']) && !empty($_POST['subject']))){
// 	$name = $_POST['name'];
// 	$email = $_POST['email'];
// 	$subject = $_POST['subject'];
// 	$message = $_POST['message'];
	
// 	$to = "email@email.com";
// 	$headers = "From : " . $email;
	
// 	if( mail($to, $subject, $message, $headers)){
// 		echo "E-Mail Sent successfully, we will get back to you soon.";
// 	}
// }
// 	}
}
