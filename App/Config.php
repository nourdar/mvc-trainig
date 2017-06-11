<?php

namespace App;

class Config {


	 protected $dbConfig;

	 protected static $dirArray = array();

	 public static  $http_server;

	 /**
	 * contain All Database Connection Paramters
	 * @return array()
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

	/* Directory Configuration
	**@parm string $action
	**@return string directory
	*/
	public function dir( $action = null){

		$action = strtolower($action);

		$server = self::$http_server = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR;

		$App = $server."App".DIRECTORY_SEPARATOR;

		$Controller = $server."Controller".DIRECTORY_SEPARATOR;

		$Package = $server."Package".DIRECTORY_SEPARATOR;

		$Classes = $server."Package".DIRECTORY_SEPARATOR."Classes".DIRECTORY_SEPARATOR;

		$Routes = $server."Route".DIRECTORY_SEPARATOR;

		$Model = $server."Model".DIRECTORY_SEPARATOR;

		$Views = $server."View".DIRECTORY_SEPARATOR;

		self::$dirArray = [
			"server"  		=> $server,
			"app"  				=> $App,
			"controller"  => $Controller,
			"package" 		=> $Package,
			"classes"  		=> $Classes,
			"route"  			=> $Routes,
			"model"  			=> $Model,
			"views"  			=> $Views,
		];

		if($action == null ){
			return  self::$dirArray;
		}

		if(isset(self::$dirArray[$action])) {
			return  self::$dirArray[$action];
		} else {
			return null;
		}

	}







	}
