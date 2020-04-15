<?php
//Set database connection
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "quorating";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>