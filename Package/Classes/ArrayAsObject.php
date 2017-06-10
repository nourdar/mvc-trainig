<?php 
namespace Package\classes;

use ArrayAccess;


class ArrayAsObject implements ArrayAccess{
	
	public $array  = array();
	

	/*
	** The Abstract Methods 
	*/
	
	/* 
	** @return bool
	*/
	public  function offsetExists($value){
		return isset($this->array[$value]);
	}
	/*
	* @return Void
	*/
	public  function offsetGet($value){
		return isset($this->array[$value])? $this->array[$value] : null ;
	}
	/*
	* @return bool
	*/
	public  function offsetSet($key,$value){
		if(is_null($key)){
			return $this->container[] = $value ;
		} else {
			return $this->container[$key] = $value ;
		}
	}
	/*
	* @return Void
	*/
	public  function offsetUnset($value){
	 unset($this->array[$value]);
	}
	
}