<?php
require_once '../utils/include.php';

// Tuka ne moze da se napravi require_page, bidejki ni trebaat promenlivite od get_user
require_once '../model/get_user.php';

require_page("model/queries.php");


if(isset($user_info['user_name'])){   
    
    require_once 'upload-control.php';
    $user_name = $user_info['user_name'];
    $user_email = $user_info['user_email'];
    $user_gender = $user_info['user_gender'];
    $user_id = $user_info['user_id'];

    $new_uname = htmlentities($_POST['u_name']);
    $new_email = htmlentities($_POST['u_email']);
    $new_gender = htmlentities($_POST['u_gender']);

    $updated_uname = "";
    $updated_email = "";
    $updated_gender = "";


    if($user_name !== $new_uname) {
        $updated_uname = $new_uname;
    }
    else {
        $updated_uname = $user_name;
    }

    if($user_email !== $new_email) {
        $updated_email = $new_email;
    }
    else {
        $updated_email = $user_email;
    }

    if($user_gender !== $new_gender) {
        $updated_gender = $new_gender;
    }
    else {
        $updated_gender = $user_gender;
    }

    $q = new Queries();
    $sql = "UPDATE users SET user_name = ?, user_email = ?, user_gender = ? WHERE id = ?";
    $params = array($updated_uname, $updated_email, $updated_gender, $user_id);
    $result = $q->query($sql, $params);

    $_SESSION['user_name'] = $updated_uname;
    $_SESSION['user_email'] = $updated_email;
    $_SESSION['user_gender'] = $updated_gender;
    $_SESSION['user_id'] = $user_id;
    
    echo "
        <script>alert('You have successfully updated your profile information!')</script>
        <script>window.open('../index.php','_self')</script>
    ";
}

else{
    echo "hello";
}


