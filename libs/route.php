<?php
namespace Stratum\libs;

require 'classes/dbInfo.php';
require 'classes/diskinfo.php';
require 'classes/sqlite3.php';
require 'classes/cdr.php';
require 'classes/update.php';

class Route{

  public static function getRoute($f, $c){
    $get_route = self::routeList();
    if(array_key_exists($f, $get_route)){
        $class  = 'Stratum\\classes\\' . $c;
        $obj    = new $class();
        call_user_func( array( $obj, $f ) );
    }else{
      header('HTTP/1.0 403 Forbidden');
      echo 'Method do not exists.';
      exit;
    }
  }

  public static function routeList(){
    return $route = [
                      'getConnection' => 'DbInfo',
                      'connectionList' => 'DbInfo',
                      'kill' => 'DbInfo',
                      'dbBackupFilesCount' => 'DbInfo',
                      'df' => 'DiskInfo',
                      'showDatabases' => 'sqlite3',
                      'createDatabases' => 'sqlite3',
                      'removeDatabases' => 'sqlite3',
                      'testSqlite3' => 'sqlite3',
                      'dms' => 'Cdr',
                      'updateComposer' => 'Update',
                    ];
  }

  public static function call(){
    if(isset($_GET['c'])){
      $get_route = explode(':', $_GET['c']);
      self::getRoute($get_route[1], $get_route[0]);
    }else{
      header('HTTP/1.0 403 Forbidden');
      echo 'Route do not exists.';
      exit;
    }
  }

}
?>
