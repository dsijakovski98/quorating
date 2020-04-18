<?php 
session_start();

include("../model/queries.php"); 

if(isset($_POST['change'])) {
    
    $user = $_SESSION['user_name'];
    $old_pass = htmlentities($_POST['old_pass']);
    $pass1 = htmlentities($_POST['pass1']);
    $pass2 = htmlentities($_POST['pass2']);
    
    $q = new Queries();
    $sql = "SELECT user_pass FROM users WHERE user_name = ?";
    $params = array($user);
    $result = $q->query($sql, $params);

    $data = $result->fetch();
    $hashedPass = $data['user_pass'];

    $oldPasswordCheck = password_verify($old_pass, $hashedPass);
    // echo $oldPasswordCheck;
    // exit();

    if($oldPasswordCheck != 1){
        header("Location: ../views/change_password.php?error=old");
        exit();
    }

    if($pass1 != $pass2){
        header("Location: ../views/change_password.php?error=mismatch");
        exit();
    }
    
    if(strlen($pass1) < 8 OR strlen($pass2) < 8) {
        header("Location: ../views/change_password.php?error=short");
        exit();
    }

    if($pass1 == $pass2) {

        $newPass = password_hash($pass1, PASSWORD_DEFAULT);

        $sql="UPDATE users SET user_pass='$newPass' WHERE user_name = ?";
        $params = array($user);
        $result = $q->query($sql, $params);
        session_unset();
        session_destroy();

        echo"
            <script>alert('Go ahead and sign in!')</script>
            <script>window.open('../signin.php','_self')</script>
        ";
    }
}
?>


