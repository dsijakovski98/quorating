<?php

if(!isset($_POST['submit-media'])){
    header("Location: ../index.php");
    exit();
}

$categorie = $_POST['categorie'];
$id = $_POST['media_id'];
$table = $_POST['table_name'];

require_once '../control/media-view-control.php';


// Capitalizing the first character of the table name ("movies" -> "Movies")
$categorie_name = ucfirst($table);

// Removing the last character from the name ("Movies -> Movie")
$categorie_name = substr($categorie_name, 0, -1);


echo $categorie_name .' name: ' . $media['name'] . '<br>';
echo '<br>';
echo $categorie_name .' created by: ' . $media['creator'] . '<br>';
echo '<br>';
echo $categorie_name .' genre: ' . $media['genre'] . '<br>';
echo '<br>';
echo $categorie_name .' description: ' . $media['description'] . '<br>';
