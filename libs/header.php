<?php
namespace Stratum\libs;

class header{

  public static function notAllowed(){
    header('HTTP/1.0 403 Forbidden');
    echo 'Method not allowed.';
    exit;
  }

  public static function notFound(){
    header('HTTP/1.0 403 Forbidden');
    echo 'Method not allowed.';
    exit;
  }

}

?>
