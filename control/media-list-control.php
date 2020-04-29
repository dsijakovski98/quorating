<?php

if(!isset($_GET['c'])){
    header("Location: ../index.php");
    exit();
}

$categorie = (int)$_GET['c'];
require_page("model/queries.php");

$q = new Queries();


// Get the name of the table
$sql = "SELECT cat_name FROM categories WHERE cat_id = ?";
$params = array($categorie);
$result = $q->query($sql, $params);

$media_name = $result->fetch();

// Media will be either "Movies", "Books" or "Games"
$media = $media_name['cat_name'];
// We need to lowe-case the first letter to get the name of the table
$table_name = lcfirst($media);





$sql = "SELECT id, name, description, genre FROM $table_name";
$params = array();

$result = $q->query($sql, $params);

$data = $result->fetchAll();

$genres = array();

foreach($data as $row) {
    $movie_genres = explode(',', $row['genre']);
    foreach($movie_genres as $genre) {
        if(in_array(ucfirst(ltrim($genre)), $genres) == false){
            $genres[] = ucfirst(ltrim($genre));
        }
    }
}


function getPictureName($categorie_id, $prod_id) {
    global $q;

    $picture_name = "";

    $sql = "SELECT pic_name, ext FROM media_images WHERE category = ? AND prod_id = ? LIMIT 1";
    $params = array($categorie_id, $prod_id);
    $result = $q->query($sql, $params);

    $data = $q->getData($result);
    if($data){
        $picture_name = $data['pic_name'] . "." . $data['ext'];
    }

    return $picture_name;
}