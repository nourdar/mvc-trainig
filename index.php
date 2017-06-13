<?php

use admin\usersAdmin;
use App\Connect;
use App\Config;
use App\DB;
use Package\classes\WebsiteArray;
use Package\classes\Functions;



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
/********* Connection Part *****/
 $con = new Connect();
 $connect = $con->connect;
/*********************************/

/*********************************/
/********* Routing Part *****/
$route = config::dir('route');
include($route.'web.php');
/*********************************/













?>
