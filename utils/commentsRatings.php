<?php

include '../model/queries.php';


// COMMENTS PART
function setComments($user_id, $categorie_id, $prod_id, $comment, $date_added)
{
            $q = new Queries();
            $sql = "INSERT INTO user_comm (user_id, categorie_id, prod_id, comment, date_added) 
            VALUES(?, ?, ?, ?, ?)";
            $params = array($user_id, $categorie_id, $prod_id, $comment, $date_added);
            $result = $q->query($sql, $params);
}

function getComments($categorie_id, $prod_id)
{
    $q = new Queries();
    $sql = "SELECT * FROM user_comm WHERE categorie_id = ? AND prod_id = ?";
    $params = array($categorie_id, $prod_id);
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

function deleteComments($user_id, $categorie_id, $prod_id, $comment, $date_added)
{
            $q = new Queries();
            $sql = "DELETE FROM user_comm WHERE user_id=:user_id";
            $params = array($user_id);
            $result = $q->query($sql, $params);
}



// RATINGS PART
function setRatings($user_id, $categorie_id, $prod_id, $rating, $r_date)
{
    $q = new Queries();
    $sql = "INSERT INTO user_rate (user_id, categorie_id, prod_id, rating, r_date) 
    VALUES(?, ?, ?, ?, ?)";
    $params = array($user_id, $categorie_id, $prod_id, $rating, $r_date);
    $result = $q->query($sql, $params);

    // Update the media score


    // Find out the table name
    $table_name = "";
    switch($categorie_id) {
        case '1':
            $table_name = "movies";
            break;
        case '2':
            $table_name = "books";
            break;
        case '3':
            $table_name = "games";
            break;
    }

    // Get the rating
    $sql = "SELECT AVG(user_rate.rating) AS rating
            FROM {$table_name}
            LEFT JOIN user_rate
    ON {$table_name}.id = user_rate.prod_id
    WHERE user_rate.categorie_id = {$categorie_id} AND user_rate.prod_id = {$prod_id}
    GROUP BY {$table_name}.id"; 
    $params=array();

    $result = $q->query($sql, $params);
    $data = $q->getData($result);

    $score = $data['rating'];

    // Update the product's score
    $sql = "UPDATE {$table_name} SET score = ? WHERE id = {$prod_id}";
    $params = array($score);

    $result = $q->query($sql, $params);


    return $result;
}
