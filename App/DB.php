<?php
namespace App;


class DB{

	private  $select;
	private  $table;
	private  $where;

	/*
	** SELECT FROM DB 
	**@parm $select
	**@return $this
	*/
	public static function  select($select){
		
		if(empty($select)){
			$this->select = "*";
		}
		 $this->select = $select;
		 return $this;

	}

	/*
	** SELECT Table as FROM TableName... 
	**@parms $table
	**@return $this
	*/
	public  function table($table){
		$this->$table = $table;
		return $this;
	}

	/*
	** WHERE 
	*/
	public  function where($where){
		$this->where = $where ;
		return $this ;
	}

	/*
	** get result 
	** @return array()
	*/
	public static function get(){
		global $select,$table,$where,$connect ;
		if(empty($where)){

			$sql = "SELECT ".$select." FROM ".$table;
		} else {
			$sql = "SELECT ".$select." FROM ".$table." WHERE ".$where;
		}

		return $connect->prepare($sql)->execute()->fetchAll();
		
	}

}


?>