<?php 

namespace App;

class Config {
	
	
	 protected $dbConfig;

	 /* contain All Database Connection Paramters
	 ** @return array()
	 */
	public static function db(){
		$dbConfig = array(
			"DB_HOST"   => "localhost",
			"DB_USER"   => "root",
			"DB_PASS"   => "",
			"DB_NAME"   => "sawem"
			);
		return $dbConfig;

	}

	public function dir(){

	}
		
	}
	
	

	

	
	
