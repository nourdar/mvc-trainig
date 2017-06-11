<?php

use admin\usersAdmin;
use App\Connect;
use App\Cconfig;
use App\DB;
use Package\classes\WebsiteArray;



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




 $con = new Connect();
 $connect = $con->connect;



//
// var_dump($connect);
// function nour(){
// 	global $connect;
// 	$sql ="SELECT * FROM users ";
// 	$result = $connect->prepare($sql);
// 	$result->execute()->fetch();
// }
//
// var_dump(nour());



$nour = "gachtou noureddine";

echo addslashes($nour);






?>
