<?php

require_once('model/m_DataHandler.php');

class reserveringen{

    public function __construct() {
        $this->DataHandler = new DataHandler("localhost", "mysql", "gpp", "root", "");
    }

    public function __destruct(){}


}