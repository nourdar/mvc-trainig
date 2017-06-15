<?php
namespace Route;
use \App\Config;


class Route {

    /**
    * method of request GET - POST - PUT - PATCH - DELETE
    * @var string $method
    */
    private $method;

    /**
    * method of request GET - POST - PUT - PATCH - DELETE
    * @var string $method
    */
    private $methodName;

    /**
    * URI Pattern http:://www.site.com/URI
    * @var  array $uri
    */
    private static $uri = array();

    /**
    * Controller Name Extends From routing file
    * '@' separated between Controller Name And Controller method to execute ;
    * @var array $controller
    */
    private $controller;

    public function __construct(){

      if(isset($_GET['route'])){
      Route::$uri['GET'] = trim($_GET['route']);
      }
      return Route::$uri;
    }

    public static function get($uriPattern,$controller){
      $dir = Config::dir('controller');

      if(in_array($uriPattern,Route::$uri)){
          $method = explode('@',$controller);
          $methodCount = count($method);
          if(file_exists($dir.$method[0].".php")){
             if($methodCount > 1 ){
               if(method_exists('\Controller\\'.$method[0],$method[1])){
                    call_user_func('\Controller\\'.$method[0].'::'.$method[1]);
                  } else {
                    $error404 =  "Method [ ".$method[1]." ] Not Found In Controller : ".$method[0]."<br /><br />";
                    $error404 .=  "Please verify Your Web.php Page And ".$method[0].".php Page  ";
                    include($dir."404.php");
                  }
                } else {
                    if(method_exists('\Controller\\'.$method[0],'index')){
                         call_user_func('\Controller\\'.$method[0].'::index');
                       }
                     }
          } else {

            $error404  = "Controller Not Found : ".$method[0]."Please verify Your Web.php Page .";
            include($dir."404.php");
          }
      } else {
        (isset(Route::$uri['GET']))? $e = Route::$uri['GET'] : $e = "Please Enter Url";
            $error404 =  "URI Pattern Not Found : ".$e;
            include($dir."404.php");
      }



    }
      /**
      * @return boolean
      */
    public static function checkUriPattern($uriPattern){
      if(in_array($uriPattern,Route::$uri)){
        return true;
      }
    }

      /**
      * @return array();
      */
    public static function exploadController(string $Controller){
        $methodName = explode('@',$Controller);
        return $methodName;
    }

    /**
    * @return array();
    */
    public static function ControllerMethod(array $Controller){
      $method = Route::exploadController($Controller);

      $methodName = array_pop($method);
      return $this->methodName = $methodName;

      $methodCount = count($method);
    }

    /**
    * @return boolean
    */
    public static function ControllerExists(string $Controller){
      if(file_exists($dir.$method[0].".php")){
        return true;
      }
    }

}
