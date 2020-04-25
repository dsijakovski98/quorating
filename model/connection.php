<?php
require_once 'constants.php';

class Connection {
  private $dbHost = "remotemysql.com";
  private $dbUser = DATABASE_USERNAME;
  private $dbPassword = DATABASE_PASSWORD;
  private $dbName = DATABASE_NAME;

  protected function connect()
  {
      $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
      $pdo = new PDO($dsn, $this->dbUser, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  }

}
?>