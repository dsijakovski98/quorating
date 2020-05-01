<?php

if(isset($_POST['post_val'])) {
    $q = new Queries();
    
    $prod_id = htmlentities($_POST['prod_id']);
    $cat_id = htmlentities($_POST['cat_id']);
    $table_name = htmlentities($_POST['table_name']);

    $action = htmlentities($_POST['post_val']);
    
    $message = "";
    $sql = "";
    // if accept
    if($action == "accept") {
        $sql = "UPDATE {$table_name} SET confirmed = 1 WHERE id = ?";
        $message = "Entry added to {$table_name} list!";
    }
    // if deny
    else if($action == "deny") {
        $sql = "DELETE FROM {$table_name} WHERE id = ?";
        $message = "Request denied.";

        // TOMMOROR ADD: DELETE THE UPLOADED PHOTO!!!!!!!!!
    }
    else {
        echo $action;
    }
    $params = array($prod_id);
    $result = $q->query($sql, $params);

    if(!empty($sql)) {   
        $sql = "DELETE FROM media_requests WHERE cat_id = ? AND prod_id = ?";
        $params = array($cat_id, $prod_id);
        
        $result = $q->query($sql, $params);
    }

    header("Location: /quorating/index.php");
}
