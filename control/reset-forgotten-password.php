<?php

require_once '../model/queries.php';
require_once '../utils/include.php';
require_once '../model/constants.php';

if(!isset($_POST['pwd-reset-submit'])) {
    $path = $website . "index.php";
    header("Location: " . $path);
    exit();
}

$selector = $_POST['selector'];
$validator = $_POST['validator'];
$pwd1 = htmlentities($_POST['pass1']);
$pwd2 = htmlentities($_POST['pass2']);

$error = "";

if(strlen($pwd1) < PASSWORD_MAX_LENGTH) {
    $error = "short";
}
else if( $pwd1 !== $pwd2 ) {
    $error = "mismatch";
}

if(!empty($error)){
    $path = $website . "views/reset_password-view.php?error=" . $error;
    header("Location: " . $path);
    exit();
}

$q = new Queries();

$currentDate = date("U");

$sql = "SELECT * FROM pwdReset WHERE selector = ? AND expiresDate >= ?";
$params = array($selector, $currentDate);

$result = $q->query($sql, $params);

if($result) {
    $data = $q->getData($result);

    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $data['token']);

    if($tokenCheck == false) {
        $error = "resubmit";
        $path = $website . "views/reset_password-view.php?error=" . $error;
        header("Location: " . $path);
        exit();
    }
    else {

        $tokenEmail = $data['resetEmail'];
        $newPassword = password_hash($pwd1, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET user_pass = ? WHERE user_email = ?";
        $params = array($newPassword, $tokenEmail);

        $result = $q->query($sql, $params);

        if($result) {
            // Successfull password update
            echo "<script>alert('Your password has been successfully reset! Go ahead and log in!')</script>";
        }
        else {
            // Error upon reseting password
            echo "<script>alert('Oops! There was a problem reseting your password.')</script>";
        }
        echo "<script>window.open('". $website ."index.php','_self')</script>";
    }
}
else {
    echo "Error!";
}






