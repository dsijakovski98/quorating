<?php
require_once '../model/queries.php';

session_start();

if(isset($_SESSION['user_name'])){   
    $q = new Queries();

    $user = $_SESSION['user_name'];
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $params = array($user);
    $result = $q->query($sql, $params);
    $user_info = $result->fetch();

    $user_name = $user_info['user_name'];
    $user_email = $user_info['user_email'];
    $user_gender = $user_info['user_gender'];
    $user_id = $user_info['id'];

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

    echo "
        <script>alert('You have successfully updated your profile information!')</script>
        <script>window.open('../index.php','_self')</script>
    ";


}
