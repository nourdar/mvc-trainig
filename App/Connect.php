<?php
namespace App;
use PDO;
use PDOException;
use App\config;

class Connect extends PDO{
	
	 private $parm;
	 private $connect;
	
	public  function __construct(){

		$parm = config::DB();
		
		try {
		$connect = new  PDO('mysql:host='.$parm['DB_HOST'].';dbname:'.$parm['DB_NAME'],$parm['DB_USER'],$parm['DB_PASS']);
	} catch (PDOException $e ) {

		die ($e->getMessage());

			}
		}
	
	}


?>