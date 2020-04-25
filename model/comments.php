<?php

include 'queries.php';

function setComments()
{
        if(isset($_POST['commentSubmit']))
        {
            $user_id = $_POST['user_id'];
            $date_added = $_POST['date_added'];
            $COMMENT = $_POST['COMMENT'];

            $q = new Queries();
            $sql = "INSERT INTO user_comm (user_id, categorie_id, prod_id, COMMENT, r_date) 
            VALUES(:user_id, :categorie_id, :prod_id, :COMMENT, :r_date)";
            $params = array($user_id, $catrgorie_id, $prod_id, $COMMENT, $r_date);
            $result = $q->query($sql, $params);
        }
}

function getComments()
{
    $q = new Queries();
    $sql = "SELECT * FROM user_comm";
    $params = array($user_id, $catrgorie_id, $prod_id, $COMMENT, $r_date);
    $result = $q->query($sql, $params);
    
    $r=getData($result);
    $row=getRowCount($r);
    while($row)
    {
        echo "<div>";
        echo $row['user_id'] . "<br>";
        echo $row['date'] . "<br>";
        echo $row['COMMENT'];
        echo "</div>";
        
    }
    
    
}