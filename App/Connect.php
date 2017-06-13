<?php
namespace App;
use PDO;
use PDOException;
use App\config;
use Package\classes\Functions;
class Connect {

	 private $parm   = array();
	 private $opt    = array();
	 public $connect = null;


	public  function __construct(){
		$parm = config::DB();

		$opt  = array(
			PDO::ATTR_ERRMODE 						=> PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC
		);

		try{
			$this->connect =  new PDO('mysql:host='.$parm['DB_HOST'].';dbname:'.$parm['DB_NAME'],$parm['DB_USER'],$parm['DB_PASS'],$opt);

} catch (PDOException $e){
	die ($e->getMessage());
}
		return $this->connect;
	}


	public  function select(){
		global $connect;
		$sql = "SELECT * from sawem.users ";
		$r = $connect->query($sql)->fetch();
		functions::pre($r);

	}
}


?>
