<?php
    require_once '../PHPMailer/PHPMailerAutoload.php';

    function send_mail(string $to, string $subject, string$body, $from = "", $name = "User", $multiple_users = 0){
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
    






   

