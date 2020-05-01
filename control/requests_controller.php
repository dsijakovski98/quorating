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
        $sql_ = "SELECT * FROM media_images WHERE category = ? AND prod_id = ?";
        $params_ = array($cat_id, $prod_id);

        $result_ = $q->query($sql_, $params_);
        $data_ = $q->getData($result_);
        
        if($data_['hasPicture'] == 1) {
            $picture_name_ = $data_['pic_name'] . "." . $data_['ext'];
            $pic_location = "images/media/$table_name/$picture_name_";
            unlink($pic_location);
        }
        
        $sql_ = "DELETE FROM media_images WHERE category = ? AND prod_id = ?";
        $result_ = $q->query($sql_, $params_);

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
