<?php

<<<<<<< HEAD
try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
=======
class Connection{
  private $dbHost = "remotemysql.com";
  private $dbUser = "Wu2T1HvhJH";
  private $dbPassword = "TTHSf0wGkN";
  private $dbName = "Wu2T1HvhJH";

  protected function connect()
  {
      $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
      $pdo = new PDO($dsn, $this->dbUser, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  }

>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
}
?>