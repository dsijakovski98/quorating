<?php

include '../model/queries.php';
require_once '../send_mail.php';


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

function deleteComments($user_id, $date_added)
{
            $q = new Queries();
            $sql = "DELETE FROM user_comm WHERE user_id = ? AND date_added = ?";
            $params = array($user_id, $date_added);
            $result = $q->query($sql, $params);

            return $result;
}

function editComments($user_id, $categorie_id, $prod_id, $newComment, $original_date_added,  $new_date_added)
{
    $q = new Queries();

    $sql = "UPDATE user_comm SET comment = ?, date_added = ? WHERE user_id = ? AND date_added = ? AND categorie_id = ? AND prod_id = ?";
    $params = array($newComment, $new_date_added, $user_id, $original_date_added, $categorie_id, $prod_id);
    $result = $q->query($sql, $params);
    return $result;
}

function sendCommentMail($user_id, $categorie_id, $product_id, $comment, $date_added) {
    $q = new Queries();

    // Format date_added
    $date = date_create($date_added);
    $date_added = date_format($date, DATE_COOKIE);
    $date_added = substr($date_added, 0, -5);


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
    $post_type = substr($table_name, 0, -1);


    // To: person who posted the media file => get posted_by ID
    $sql = "SELECT * FROM {$table_name} WHERE id = ? LIMIT 1";
    $params = array($product_id);
    $result = $q->query($sql, $params);

    $data = $q->getData($result);
    $posted_by = $data['posted_by'];
    $post_title = $data['name'];


    // if to_ID == from_ID => return
    if($posted_by == $user_id){
        return;
    }


    $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
    $params = array($posted_by);
    $result = $q->query($sql, $params);

    $to_data = $q->getData($result);
    $to = $to_data['user_email'];
    $to_username = $to_data['user_name'];


    // Get person who posted the comment => get user_name from user_id
    $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
    $params = array($user_id);
    $result = $q->query($sql, $params);

    $commenter_data = $q->getData($result);
    $commenter_username = $commenter_data['user_name'];


    // Subject: Someone commented on your post!
    $subject = "Someone commented on your post!";


    // Body: template html
    $body = '<!doctype html>

    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Comment message</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="container">    
            <br>
            <h6 class="text secondary">
                Hey, ' . $to_username . '! '  . $commenter_username . ' commented on your post!
            </h6>
            <br>
            <h4>
                ' . $post_title . ' <small>(' . $post_type . ')</small>
            </h4>
            <div class="card" style="width:40rem;">
                <div class="card-body clearfix">
                    <h3 class="card-title">' . $commenter_username . '</h3>
                    <p class="card-subtitle mb-2 text-muted">' . $date_added . '</p>
                    <p class="card-text">' . $comment . '</p>
                    <form action="https://site.test/quorating/views/media-view.php" method="POST">
					    <input type="submit" class="btn btn-primary text-light" name="submit-media" value="View comment">
					    <input type="hidden" name="categorie" value="' . $categorie_id . '">
					    <input type="hidden" name="media_id" value="' . $product_id . '">
                        <input type="hidden" name="table_name" value="' . $table_name . '">
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>';
    
    return send_mail($to, $subject, $body);
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
