<?php

    require_once 'utils/include.php';
    require_page("utils/comments.php");

    if(isset($_POST['submitComment'])){   
        $user_id = $_POST['user_id'];
        $date_added = $_POST['date_added'];
        $COMMENT = $_POST['COMMENT'];
        $prod_id = 1;

        // call set comments       


    }