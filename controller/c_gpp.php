<?php
  require_once 'model/m_GPPLogic.php';
  
  class GPPController {
	public function __construct() {
      $this->GPPLogic = new GPPLogic();
	}
	
	public function __destruct() {}
    public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
			switch ($op) {
				case 'reads':
				$this->collectReads();
				break;
				case 'read':
				$this->collectRead($_REQUEST['id']);
				break;
				case 'update':
				$this->collectUpdate();
				break;
				case 'delete':
				$this->collectDelete($_REQUEST['id']);
				break;
				default:
				$this->collectReads();
				break;
			}			
		} catch (ValidationException $e) {
				$errors = $e->getErrors();

		}
	}
  public function collectRead($id)
  {
    $template = $this->GPPLogic->read($id);
    include 'view/index.php';
  }
	public function collectReads() {
    $template = $this->GPPLogic->reads();
	  include 'view/index.php';
  }
  public function collectUpdate(){ }
  public function collectDelete($id)
  {
    $template = $this->GPPLogic->delete($id);
    include 'view/index.php';
  }
	}
