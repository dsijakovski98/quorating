<?php

include '../model/queries.php';

function setComments($id, $cat, $prod, $comment, $date)
{
            $q = new Queries();
            $sql = "INSERT INTO user_comm (user_id, categorie_id, prod_id, COMMENT, r_date) 
            VALUES(:user_id, :categorie_id, :prod_id, :COMMENT, :r_date)";
            $params = array($id, $cat, $prod, $comment, $date);
            $result = $q->query($sql, $params);
}

function getComments()
{
    $q = new Queries();
    $sql = "SELECT * FROM user_comm";
    $params = array();
    $result = $q->query($sql, $params);
    
    $r=$q->getData($result);
    $row=$q->getRowCount($result);
    while($row)
    {
        echo "<div>";
        echo $row['user_id'] . "<br>";
        echo $row['date'] . "<br>";
        echo $row['COMMENT'];
        echo "</div>";
    }
}