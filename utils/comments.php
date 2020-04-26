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
    
    $comms=$q->getAllData($result);

    $comments = array();
    
    foreach($comms as $comment){
        // Adding the username to the comments array
        $sql = "SELECT user_name FROM users WHERE id = ?";
        $params = array($comment['user_id']);
        $result = $q->query($sql, $params);

        $data = $q->getData($result);
        $comment['user_name'] = $data['user_name'];

        // Adding the extention of the profile pic of the user to the comments array
        $sql = "SELECT extension FROM images WHERE id = ?";
        // params is the same array
        $result = $q->query($sql, $params);

        $data = $q->getData($result);
        $comment['extension'] = $data['extension'];

        $date = date_create($comment['date_added']);
        // var_dump($date);
        $date = date_format($date, DATE_RFC1123);
        $date = explode('+', $date);
        
        $comment['date_added'] = $date[0];        
        $comments[] = $comment;
    }


    return $comments;
}