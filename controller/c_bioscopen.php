<?php

require_once('model/m_bioscopen.php');

class biosController{
    public function __construct() {
		$this->bioscopen = new bioscopen();
	}

    public function __destruct() {}
        
	public function handleRequest() {
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
				case 'update':
					$this->update();
					break;
				case 'readBios':
					$this->readBios();
					break;
				case 'delBios':
					$this->deleteBios();
					break;
				case 'addBios':
					$this->addBios();
					break;
				
				default:
					$this->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
    }

    public function collectHome() {
		include 'view/beheerder/beheerder.php';
	}
    
    public function update() {
		$result = $this->bioscopen->update();
		include 'view/beheerder/beheerder.php';
	}

	public function readBios() {
		$result = $this->bioscopen->readsBioscopen();
		include 'view/overzicht.php';
	}

	public function createTable($result) {
        $tableheader = false;
        $html = "";
        $html .= "<table>";

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            
            if($tableheader == false) {
                $html .= "<tr>";
                
                foreach($row as $key=>$value) {
                    $html .= "<th>{$key}</th>";
                }
                
                $html .= "</tr>";
                $tableheader = true;
            }
            
            foreach($row as $value) {
                $html .= "<td>{$value}</td>";
            }
        
            $html .= "</tr>";
        }
        
        $html .= "</table>";
        return $html;
	}
	

	public function addBios() {
		$result = $this->bioscopen->addBios();
		include 'view/beheerder/addbios.php';
	} 

	public function deleteBios() {
		$result = $this->bioscopen->delete();
		include 'view/beheerder/deleteBios.php';
	}

}
