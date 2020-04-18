<?php

require_once("queries.php");

session_start();
$uname = $_SESSION['user_name'];
$q = new Queries();
$sql = "SELECT * FROM users WHERE user_name = ?";
$params = array($uname);


$user = $q->query($sql, $params);
$user_info = $user->fetch();