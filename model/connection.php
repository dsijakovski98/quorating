<?php

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

}
?>