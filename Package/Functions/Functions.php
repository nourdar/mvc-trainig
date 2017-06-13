<?php
/**
* simple method to show array;
*/
public static function pre(array $parm){
  echo'<div style="
  width:90%;
  height:auto;
  padding:50px;
  border:2px dotted #242424;
  margin:auto;
  text-align:left;
  font-weight:bold;
  "><pre>';
  print_r($parm);
  echo "</pre></div><br />";
}
