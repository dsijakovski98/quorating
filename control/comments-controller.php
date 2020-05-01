<?php

    require_once '../utils/include.php';
    require_page("utils/commentsRatings.php");

    if(isset($_POST['submit-comment'])) { 

        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['product_id'];
        $comment = $_POST['COMMENT'];
        $date_added = $_POST['date_added'];

        setComments($user_id, $categorie_id, $product_id, $comment, $date_added);    
    
        echo "<script>alert('You have successfully commented!');</script>";
        echo "<script>window.open('/quorating/index.php','_self');</script>";
    }


    if(isset($_POST['delete-comment'])) {   
        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['prod_id'];
        $comment = $_POST['comment'];
        $date_added = $_POST['date'];

        // echo "User id: " . $user_id . "<br>";
        $date = date_create($date_added);
        // echo "timestamp: " . date_format($date,"Y-m-d H:i:s") . "<br>";

        $actual_date = date_format($date, "Y-m-d H:i:s");
        
        // exit();

        $result = deleteComments($user_id, $actual_date);
    
        if($result){
            echo "<script>alert('You have deleted the comment!');</script>";
        }
        else {
            echo "There has been an error while deleting the comment";
        }
        echo "<script>window.open('/quorating/index.php','_self');</script>";
    }

    if(isset($_POST['edit-comment'])) {  
         
        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['prod_id'];
        $comment = $_POST['new_comment'];
        $date_added = $_POST['date'];


        $format = "Y-m-d H:i:s";

        $date = date_create($date_added);
        $original_date = date_format($date, $format);

        $new_date = date($format);

        $result = editComments($user_id, $categorie_id, $product_id, $comment, $original_date, $new_date);
    
        if($result){
            echo "<script>alert('You have edited the comment!');</script>";
        }
        else {
            echo "There has been an error while editing the comment";
        }
        echo "<script>window.open('/quorating/views/media-list.php?c=" . $categorie_id . "','_self')</script>";
    }


