<?php

require_once '../utils/include.php';
require_page("utils/commentsRatings.php");

if($_POST['rating'] == 0) {
    header("Location: /quorating/index.php");
    exit();
}

$user_id = $_POST['user_id'];
$categorie_id = $_POST['categorie_id'];
$prod_id = $_POST['prod_id'];
$r_date = $_POST['r_date'];
$rating = $_POST['rating'];

$product = "";

switch($categorie_id) {
    case '1':
        $product = "movie";
        break;
    case '2':
        $product = "book";
        break;
    case '2':
        $product = "game";
        break;
}




$result = setRatings($user_id, $categorie_id, $prod_id, $rating, $r_date);

if($result) {
    // js alert success
    echo "<script>alert('You have successfully rated this " . $product . " a rating of " . $rating . " out of 5')</script>";
}
else {
    // js alert failure
    echo "<script>alert('Failure!!!')</script>";
}

// js redirect
echo "<script>window.open('". $website ."/views/media-list.php?c=" . $categorie_id . "','_self')</script>";

