<?php
namespace Controller;
class HomeController {
  public function __construct(){
    echo "hi from home Controller";
  }

  public static function index(){
    echo "hi index";
  }

  public static function gachtou(){
    echo "hi From gachtou method";
  }

  public static function edit(){
    echo "hi From Edit Page [  ]";
  }
}

?>
