<?php
namespace Stratum;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'libs/header.php';
require 'libs/db.php';
require 'libs/route.php';
use Stratum\libs\header as Header;
use Stratum\libs\db as Db;
use Stratum\libs\route as Route;

if($_SERVER['REQUEST_METHOD'] != 'GET'){
  Header::notAllowed();
}
//Get db connected
$conn = Db::dbConnect();
//Get route and call controller
Route::call();
$conn->close();
?>