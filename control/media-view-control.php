<?php

// if(!isset($_POST['submit-media'])){
//     header("Location: ../index.php");
//     exit();
// }

// Here we get the info about the media
require_once '../model/queries.php';
$q = new Queries();
// $table holds the name of the table, from media-view.php
// $product_id holds the id of the movie/book/game (media), also from media-view.php
$sql = "SELECT * FROM $table WHERE id = $product_id";
$params = array();

$result = $q->query($sql, $params);
$media = $result->fetch();



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