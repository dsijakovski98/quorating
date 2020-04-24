<?php

require_once '../utils/include.php';
require_once '../model/get_user.php';
// session_start();

if(!isset($_SESSION['user_name'])) {
    header("Location: /quorating/index.php");
    exit();
}


$user_name = $user_info['user_name'];
$user_email = $user_info['user_email'];
$user_gender = $user_info['user_gender'];
//$num_comm = $user_info['num_comm'];
//$num_rated = $user_info['num_rated'];


