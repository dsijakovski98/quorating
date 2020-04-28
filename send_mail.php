<?php
    require_once 'PHPMailer/PHPMailerAutoload.php';

    function send_mail(string $to, string $subject, string $body, $from = "", $name = "User", $multiple_users = 0){
        $mail = new PHPMailer();

        $mail ->IsSmtp();
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465; // or 587
        $mail ->IsHTML(true);
        $mail ->Username = "quorating@gmail.com";
        $mail ->Password = "quorating0909";
        if($from == "") {
            $mail ->SetFrom('quorating@gmail.com', 'Admin');
        }
        else {
            $mail ->SetFrom($from, $name);
        }
        $mail ->Subject = $subject;
        $mail ->Body = $body;

        if($multiple_users == 1) {
            foreach($to as $to_mail){
                $mail ->addAddress($to_mail);
            }
        }
        else {
            $mail ->addAddress($to);
        }

        
        return $mail->Send();
    }


    function sendVerificationMail($userEmail, $token) {
        $body = '<!doctype html>

        <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>Verify e-mail address</title>
        </head>
        
        <body>
            <p>Thank you for signing up to our awesome website <b>Quorating</b>! <br> 
                Please verify your e-mail address by clicking on the link below</p>
            <a href="http://localhost/quorating/index.php?token=' . $token . '">Verify e-mail address</a>
        </body>
        </html>';
        $subject = "Verify your e-mail address";
        send_mail($userEmail, $subject, $body);
    }
    






   

