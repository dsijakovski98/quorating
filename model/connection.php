<?php
//Set database connection
$dbHost = "remotemysql.com";
$dbUser = "Wu2T1HvhJH";
$dbPassword = "TTHSf0wGkN";
$dbName = "Wu2T1HvhJH";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>