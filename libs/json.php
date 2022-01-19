<?php
if($_SERVER['REQUEST_METHOD'] != 'GET'){
  header('HTTP/1.0 403 Forbidden');
  echo 'Method not allowed';
  exit;
}
exit;



date_default_timezone_set("Asia/Calcutta");





$servername = "127.0.0.1";
$username = "root";
$password = "Stashfin";




//class








// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
