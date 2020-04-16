<?php
require_once 'connection.php'; 

class Queries extends Connection{

    public function query($sql, $params) {
        $pdo = $this->connect();
        $statement = $pdo->prepare($sql);
		$statement->execute($params);
		return $statement;   
    }
}