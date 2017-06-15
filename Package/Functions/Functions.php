<?php
use App\Config;
    /**
    * simple method to show array;
    *@parm array $parm
    */
  function pre(array $parm){
    echo'<div class="preFunction"><pre>';
    print_r($parm);
    echo "</pre></div><br />";
  };

  /**
  * Function To Get Url
  *@parm string $folder
  */
    function url($folder){
      $dir = Config::dir($folder);
    }
    /**
    * Function To Get StyleUrl
    *@parm string file name
    */
      function view($file){
        $dir = Config::dir("views");
        return $dir.$file.".php";
      }

  /**
  * Function To Get StyleUrl
  *@parm string file name
  */
    function css($file){
      $dir = Config::dir("css");
      return $dir.$file.".css";
    }

  /**
  * Function To Get StyleUrl
  *@parm string file name
  */
    function js($file){
      $dir = Config::dir("js");
      return $dir.$file.".js";
    }
