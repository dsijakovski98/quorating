<?php

require_once '../utils/include.php';
require_once '../model/get_user.php';

require_page("model/queries.php");
// session_start();

if(!isset($_SESSION['user_name'])) {
    header("Location: /quorating/index.php");
    exit();
}

$q = new Queries();

// General info
$user_name = $user_info['user_name'];
$user_email = $user_info['user_email'];
$user_gender = $user_info['user_gender'];
$user_id = $user_info['user_id'];

// Profile picture
function getProfilePic() {
    global $q, $user_id, $user_name, $website;

    $picName = "";
    $picPath = "";

    $sql = "SELECT * FROM images WHERE id = ? LIMIT 1";
    $params = array($user_id);
    $result = $q->query($sql, $params);

    if($result) {
        $data = $q->getData($result);

        if($data['hasPicture'] == 1){
            $picName = $user_name . "." . $data['extension'];
        }
        else {
            $picName = "default.jpg";
        }

        $picPath = $website . "images/profilePics/$picName";
    }
    return $picPath;
}

// My posts
function getPosts() {
    global $q, $user_id, $website;

    $posts = array();
    $table_names = array("movies", "books", "games");

    foreach(range(0,2) as $i){
        $table_name = $table_names[$i];
        $categorie_id = $i + 1;

        $sql = "SELECT * FROM {$table_name} WHERE posted_by = ?";
        $params = array($user_id);
        
        $result = $q->query($sql, $params);

        $data = $q->getAllData($result);

        $data_posts = array();
        foreach($data as $post){

            $sql = "SELECT * FROM media_images WHERE category = ? AND prod_id = ?";
            $params = array($categorie_id, $post['id']);
            $res = $q->query($sql, $params);
            
            $img_data = $q->getData($res);
            
            $post['cat_id'] = $categorie_id;
            $post['img_destination'] = $website . "images/media/$table_name/" . $img_data['pic_name'] . '.' . $img_data['ext'];
            $post['type'] = substr($table_name, 0, -1);
            $data_posts[] = $post;
        }

        $posts = array_merge($posts, $data_posts);
    }

    return $posts;
}

// Notifications *

