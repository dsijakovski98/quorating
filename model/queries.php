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

    public function getRowCount($result) {
        return $result->rowCount();
    }

    public function getData($result) {
        return $result->fetch();
    }

    public function getAllData($result) {
        return $result->fetchAll();
    }
}