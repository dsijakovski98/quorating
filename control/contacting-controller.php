<?php

    if(!isset($_POST['contact_submit'])){
        header("Location: /quorating/index.php");
        exit();
    }
    
    require_once '../utils/include.php';
    require_page("utils/send_mail.php");

    $name = ucfirst(htmlentities($_POST['name']));
    $from = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $body = htmlentities($_POST['body']);

    // TODO: Input verification

    $mail_sent = send_mail($website_mail, $subject, $body, $from, $name);

    if($mail_sent) {
        // Show successfull sent mail
        echo "<script>alert('Your message has been heard loud and clear! E-mail sent sucessfully!')</script>";
    }
    else {
        // Show unsuccessfull sent mail
        echo "<script>alert('Oops! There was some kind of an error while sending your message. Please try again.')</script>";
    }
    
    // Revert to homepage
    echo "<script>window.open('". $website ."index.php','_self')</script>";
    