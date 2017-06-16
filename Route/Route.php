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
    private static $methodName;

    /**
    * URI Pattern Route::get($uriPattern,$controller)
    * @var  array $uri
    */
    private static $uri = array();


    /**
    * URI Pattern http:://www.site.com/URI
    * @var  array $url
    */
    private static $url = array();

    /**
    * define controller namespace
    * @var ControllerNamespcae
    */
    private static $ControllerNamespace = '\Controller\\';

    /**
    * Controller Name Extends From routing file
    * '@' separated between Controller Name And Controller method to execute ;
    * @var array $controller
    */
    private static $Controller;

    public function __construct(){
      $url = $_GET['route'];

      if(strpos($url,'/') === false ){
        return Route::$url = $url;
      } else {
        $uri = explode("/",$url);

        if(in_array("",$uri)){
        $key = array_search("",$uri);
        unset($uri[$key]);
        }
        return Route::$url = $uri;
      }
    }

    public static function gest($uriPattern,$controller){
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

    public static function get($uriPattern,$Controller){
      Route::splitUri($uriPattern);
      if(Route::checkUrl(Route::$url,Route::$uri) === true ){
        if(Route::ControllerName($Controller)){
          if(Route::ControllerMethod($Controller)){
            if(Route::ControllerExists()){
              if(method_exists(Route::$ControllerNamespace.Route::$Controller,Route::$methodName)){
                call_user_func(Route::$ControllerNamespace.Route::$Controller.'::'.Route::$methodName);
                exit;
              } else {
                $error404  = " Method [ ".Route::$methodName." ]Not Found <br /><br />";
                $error404 .= " - check method Name Inside Your Controller <br /><br />" ;
                $error404 .= " - check namespace Inside Your Controller <br /><br />" ;
                $error404 .= " - check Class Name Inside Your Controller<br />";
                include(Config::dir('controller')."404.php");
                exit;
              }
            } else {
              $error404 = " Controller Not Found , check Controller Name";
              include(Config::dir('controller')."404.php");
              exit;
            }
          } else {
            $error404 = " Controller method problem";
            include(Config::dir('controller')."404.php");
            exit;
          }
        } else {
          $error404 =  " check Controller Name";
          include(Config::dir('controller')."404.php");
          exit;
        }
      } else {
        /**
        * في حالة إستدعاء الدالة أكثر من مرة
        * get($uri,$controller);
        * get($uri1,$controller1);
        * هنا عندي مشكل الدالة تستدعى مرتين وبالتالي سيحدث معي خطأ
        * قمت بتعيين إرجاع القيمة خطأ في حالة ما إذا لم يتوافق الرابط مع اليوراي
        * يتم تنفيذ الدالة التي ترجع بقيمة صحيحة فقط
        */
        return true;
      }


    }

    /**
    * @return boolean
    */
  public static function splitUri($uriPattern){
    if(strpos($uriPattern,'/') === false ){
      return Route::$uri = $uriPattern;
    } else {
      $uri = explode("/",$uriPattern);
      return Route::$uri = $uri;
    }
  }

    /**
    * @return boolean
    */
  public static function checkurl($url,$uriPattern){
    $i = 0 ;
  if(!count($url) === count($uriPattern)){
    return false;
  }
    foreach($url as $val){
      if(isset($uriPattern[$i])){
        if($uriPattern[$i] == $val){
          $i++;
        }
      } else {
        return false;
      }
    }
    return true;
  }

      /**
      * @return array();
      */
    public static function explodeController($Controller){
        if(strpos($Controller,'@') === false){
          return false;
        } else {
          $methodName = explode('@',$Controller);
          return $methodName;
        }

    }

    /**
    * @return array();
    */
    public static function ControllerName($Controller){
      $con = Route::explodeController($Controller);

      if($con === false ){
        return Route::$Controller = $Controller;
      } else {
        return Route::$Controller = $con[0];
      }
    }

    /**
    * @return array();
    */
    public static function ControllerMethod($Controller){
      $method = Route::explodeController($Controller);

      if($method === false ){
        return Route::$methodName = "index";
      } else {
        $methodName = array_pop($method);
        return Route::$methodName = $methodName;
      }

    }


    /**
    * @return boolean
    */
    public static function ControllerExists(){
      $dir = Config::dir('controller');
      if(file_exists($dir.Route::$Controller.".php")){
        return true;
      }
    }

}
