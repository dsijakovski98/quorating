<?php

    require_once '../utils/include.php';
    require_page("utils/commentsRatings.php");

    if(!isset($_POST['submit-comment'])) {   
        header("Location: /quorating/index.php");
        exit();
    }


    $user_id = $_POST['user_id'];
    $categorie_id = $_POST['categorie_id'];
    $product_id = $_POST['product_id'];
    $comment = $_POST['COMMENT'];
    $date_added = $_POST['date_added'];

    //echo $user_id . "<br>";
    //echo $categorie_id . "<br>";
    //echo $product_id . "<br>";
    //echo $comment . "<br>";
    //echo $date_added . "<br>";

    setComments($user_id,$categorie_id,$product_id,$comment,$date_added);    

    if(isset($_POST['submit-comment'])) {   
        header("Location: /quorating/index.php");
        exit();
    }

