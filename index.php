<?php

use admin\usersAdmin;
use App\connect;
use App\DB;
use Package\classes\WebsiteArray;

spl_autoload_register(function($className){

	$file = str_replace("\\",DIRECTORY_SEPARATOR,$className);

	$file = __DIR__.DIRECTORY_SEPARATOR.$file;
	require $file.'.php';

});

$connect = new connect();





?>
