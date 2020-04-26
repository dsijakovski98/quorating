<?php

    require_once '../utils/include.php';
    require_page("utils/commentsRatings.php");

    if(!isset($_POST['submit-comment'])) {   
        echo "No No No.";
        exit();
    }


    $user_id = $_POST['user_id'];
    $categorie_id = $_POST['categorie_id'];
    $product_id = $_POST['product_id'];
    $comment = $_POST['COMMENT'];
    $date_added = $_POST['date_added'];

    setComments($user_id, $categorie_id, $product_id, $comment, $date_added);    
  
    echo "<script>alert('You have successfully commented!');</script>";
    echo "<script>window.open('/quorating/index.php','_self');</script>";
