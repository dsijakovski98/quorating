<?php

if(!isset($_GET['rating'])) {
    header("Location: /quorating/index.php");
    exit();
}

$rating = (int)$_GET['rating'];

echo "Rating: " . $rating;