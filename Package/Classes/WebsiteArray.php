<?php

namespace Package\classes;
use Package\classes\ArrayAsObject;

class WebsiteArray extends ArrayAsObject{

	public $array = array();

 	public function __construct(){
 		
 		$this->array["URL"]  = "www.gachtou.ml";
 		$this->array["NAME"] = "GACHTOU NOUREDDINE WEBSITE";
 		return $this->array;
 	}

}

?>