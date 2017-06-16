<?php
use Route\Route;
/**
* يجب تعيين الدالة التي تريد تنفيذها
* إذا لم تقم بتعيين دالة فستنفذ دالة index
* عليك ان تقوم بكتابة دالة اندكس في الكنترولر
*/
Route::get('home/nour','homeController@indeddsss');
Route::get('home/nour/fares','homeController');
Route::get('home/nour/fares/farouk','nourController');
