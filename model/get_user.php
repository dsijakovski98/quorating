<?php
session_start();
$user_info = array();
$user_info['user_name'] = $_SESSION['user_name'];
$user_info['user_email'] = $_SESSION['user_email'];
$user_info['user_gender'] = $_SESSION['user_gender'];
$user_info['user_id'] = $_SESSION['user_id'];