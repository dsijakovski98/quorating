<?php

if(!isset($_POST['reset-pwd-submit'])){
    header("Location: ../index.php");
    exit();
}

require_once '../model/queries.php';
require_once '../utils/include.php';

$q = new Queries();

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = "http://localhost/quorating/views/reset_password-view.php?selector=" . $selector . "&validator=" . bin2hex($token);

$expiresDate = date("U") + 1800;

$userEmail = htmlentities($_POST['email']);

// E-mail existance verification

// require_page("classes/verify_mail.php");
// $mail = new VerifyEmail();
// $mail->setStreamTimeoutWait(8);
// $mail->Debug= FALSE; 
// $mail->Debugoutput= 'html'; 
// $mail->setEmailFrom($website_mail);

// if(!$mail->check($user_email)){ 
//   $path = $website . "views/forgot_password.php?status=email";
//   header("Location: " . $path);
//   exit();
// }


$sql = "DELETE FROM pwdReset WHERE resetEmail = ?";
$params = array($userEmail);

$result = $q->query($sql, $params);

$hashedToken = password_hash($token, PASSWORD_DEFAULT);

$sql = "INSERT INTO pwdReset (resetEmail, selector, token, expiresDate) VALUES (?, ?, ?, ?)";
$params = array($userEmail, $selector, $hashedToken, $expiresDate);

$result = $q->query($sql, $params);

if($result){
    require_page("send_mail.php");

    $to = $userEmail;

    $subject = "QuoRating - Reset your password";

    $body = '<p>Hello there, it seems that you have forgotten your password. No worries, it happens to the best of us! <br>
        Click the link below and we will help you reset your password!</p>
        <a href="' . $url . '">Reset your password</a>';

    send_mail($to, $subject, $body);

    $path = $website . "views/forgot_password.php?status=success";
    header("Location: " . $path);
    exit();
}