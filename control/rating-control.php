<?php

require_once '../utils/include.php';
require_page("utils/commentsRatings.php");

if(!isset($_GET['rating'])) {
    header("Location: /quorating/index.php");
    exit();
}

$user_id = $_POST['user_id'];
$categorie_id = $_POST['categorie_id'];
$prod_id = $_POST['prod_id'];
$r_date = $_POST['r_date'];
$rating = (int)$_GET['rating'];

//echo "Rating: " . $rating;

setRatings($user_id,$categorie_id,$prod_id,$rating,$r_date);    

if(isset($_POST['submit-comment'])) {   
    header("Location: /quorating/index.php");
    exit();
}

