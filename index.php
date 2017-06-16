<?php

use admin\usersAdmin;
use App\Connect;
use App\Config;
use App\DB;
use Package\classes\WebsiteArray;
use Route\Route;


 spl_autoload_register(function($className){
	$file = str_replace("\\",DIRECTORY_SEPARATOR,$className);

	$file = __DIR__.DIRECTORY_SEPARATOR.$file.'.php';
	if(file_exists($file)){
	require $file;
}
else {
	echo "no file";
}
});



/*********************************/
/********* Functions Part *****/
$func = config::dir('functions');
include($func.'functions.php');
//@includef From Route Class __construct()
/*********************************/


/*********************************/
/********* Connection Part *****/
 $con = new Connect();
 $connect = $con->connect;
/*********************************/


/*********************************/
/********* Routing Part *****/

//$route = (isset($_GET['Route']))? new Route($_GET['Route']) :  new Route();
$route = new route();

include(Config::dir("route")."web.php");
/*********************************/


/*********************************/
/********* View Part *****/
$index = view("index");
include($index);
/*********************************/

if(isset($_GET['route'])){
  new Route($_GET['route']);
} else {
  new Route('home');
}









?>
