<?php

namespace App;

class Config {


	 protected $dbConfig;

	 protected static $dirArray = array();

	 public static  $http_server;

	 public function __construct(){
		echo "hi from config class";

	 }
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

	/** Directory Configuration
	*@parm string $action
	*@return string directory
	*/
	public static function dir( $action = null){

		$action = strtolower($action);

		$server = self::$http_server = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR;
		$server = str_replace("\\",DIRECTORY_SEPARATOR,$server);
		$App = $server."App".DIRECTORY_SEPARATOR;

		$Controller = "Controller".DIRECTORY_SEPARATOR;

		$Package = "Package".DIRECTORY_SEPARATOR;

		$Classes = "Package".DIRECTORY_SEPARATOR."Classes".DIRECTORY_SEPARATOR;

		$Functions = "Package".DIRECTORY_SEPARATOR."Functions".DIRECTORY_SEPARATOR;

		$Routes = "Route".DIRECTORY_SEPARATOR;

		$Model = "Model".DIRECTORY_SEPARATOR;

		$Views = "Views".DIRECTORY_SEPARATOR;

		$Css = $Views."style".DIRECTORY_SEPARATOR."css".DIRECTORY_SEPARATOR;

		$Js = $Views."style".DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR;

		self::$dirArray = [
			"server"  		=> $server,
			"app"  				=> $App,
			"controller"  => $Controller,
			"package" 		=> $Package,
			"classes"  		=> $Classes,
			"functions"  	=> $Functions,
			"route"  			=> $Routes,
			"model"  			=> $Model,
			"views"  			=> $Views,
			"css"  				=> $Css,
			"js"  				=> $Js,
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
