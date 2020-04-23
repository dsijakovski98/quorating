<?php

// if(!isset($_POST['submit-media'])){
//     header("Location: ../index.php");
//     exit();
// }

// Here we get the info about the media
require_once '../model/queries.php';
$q = new Queries();
// $table holds the name of the table, from media-view.php
// $id holds the id of the movie/book/game (media), also from media-view.php
$sql = "SELECT * FROM $table WHERE id = $id";
$params = array();

$result = $q->query($sql, $params);
$media = $result->fetch();



