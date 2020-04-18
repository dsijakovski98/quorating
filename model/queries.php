<?php
require_once 'connection.php'; 

class Queries extends Connection{

    public function query($sql, $params) {
        $pdo = $this->connect();
        $statement = $pdo->prepare($sql);
        if(empty($params)) {
            $statement->execute();
            return $statement;
        }
        else{
            $statement->execute($params);
            return $statement;   
        }
    }
}