<?php
namespace Stratum\libs;


class Db{

  public static $host       = NULL;
  public static $user       = NULL;
  public static $pass       = NULL;
  public static $connection = NULL;


  public static function cred(){
    self::$host = "127.0.0.1";
    self::$user = "root";
    self::$pass = "Stashfin";
  }

  public static function dbConnect(){
    if(is_object(self::$connection)){
      return self::$connection;
    }else {
      self::cred();
      $conn = new \mysqli(self::$host, self::$user, self::$pass);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return self::$connection = $conn;
    }
  }

}
?>
