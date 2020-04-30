<?php
session_start();

// Log out
if(isset($_GET['logout'])){
  $_SESSION = array();
  session_unset();
  session_destroy();
  header("Location: /quorating/index.php");
  exit();
}

require_once 'utils/include.php';
require_once 'send_mail.php';
require_page("model/queries.php");

$q = new Queries();

// Sign in authentication
if(isset($_POST['sign_in'])) {

    $uid = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);


    // Get the user from the 'users' table VIA email
    $sql = "SELECT * FROM users WHERE user_email = ? OR user_name = ?";
    $params = array($uid, $uid);
    $result = $q->query($sql, $params);

    $user_check = $q->getRowCount($result);
    $row = $q->getData($result);

    $user_password = $row['user_pass'];

    // Check if password is correct
    $password_check = password_verify($pass, $user_password);
    
    if($user_check == 1 && $password_check == 1) {

        // SUCCESSFULL SIGN IN
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_gender'] = $row['user_gender'];
        $_SESSION['verified'] = $row['verified'];
        $_SESSION['user_id'] = $row['id'];
        if($row['admin'] == 1) {
          $_SESSION['admin'] = 1;
        }

        $sql = "SELECT hasPicture, extension FROM images WHERE id = ?";
        $params = array($row['id']);
        $result = $q->query($sql, $params);
        $data = $q->getData($result);

        if($data['hasPicture'] == 1){
            $_SESSION['ext'] = $data['extension'];
        }

        // No need for header because its included in the index page

    }

    else if($check_user == 1) { // Password incorrect
        $path = $website . "signin.php?error=pwd";
        header("Location: " . $path);
        exit();
    }
    else { // User/email incorrect
        $path = $website . "signin.php?error=user";
        header("Location: " . $path);
        exit();
    }
}

// Sign up authentication
if(isset($_POST['sign_up'])) {
  
  $user_name = htmlentities($_POST['user_name']);
  $user_email = htmlentities($_POST['user_email']);
  $user_pass = htmlentities($_POST['user_pass']);
  $user_gender = htmlentities($_POST['user_gender']);
  
  
  // VALIDATION
  
  // Epmty fields [x]
  
  // Password length >= 8
  if (strlen($user_pass) < PASSWORD_MAX_LENGTH) {
    $path = $website . "signup.php?error=pwd";
      header("Location: " . $path);
      exit();
    }
    // E-mail validation
    else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
      $path = $website . "signup.php?error=email";
      header("Location: " . $path);
      exit();
    }
    // E-mail existance verification
    
    // require_once 'classes/verify_mail.php';
    // $mail = new VerifyEmail();
    // $mail->setStreamTimeoutWait(8);
    // $mail->Debug= FALSE; 
    // $mail->Debugoutput= 'html'; 
    // $mail->setEmailFrom($website_mail);

    // if(!$mail->check($user_email)){ 
    //   $path = $website . "signup.php?error=email-verify";
    //   header("Location: " . $path);
    //   exit();
    // }
    else {
      // Check for unique username
      $sql = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
      $params = array($user_name);
      $result = $q->query($sql, $params);

      $row_count = $q->getRowCount($result);
      if($row_count > 0) {
        $path = $website . "signup.php?error=uniqUser";
        header("Location: " . $path);
        exit();
      }
  
      // Check for unique email
      $sql = "SELECT * FROM users WHERE user_email = ? LIMIT 1";
      $params = array($user_email);
      $result = $q->query($sql, $params);

      $row_count = $q->getRowCount($result);
      if($row_count > 0) {
        $path = $website . "signup.php?error=uniqMail";
        header("Location: " . $path);
        exit();
      }
  
  
      // Successfull registration
  
      // Hash password
      $hashedPwd = password_hash($user_pass, PASSWORD_DEFAULT);
      
      // After sign up account is not verified
      $verified_account = 0;
      
      // Create token
      $token = bin2hex(random_bytes(50));
      
      // Default admin rights is 0
      $admin_rights = 0;
      
      $sql = "INSERT INTO users (user_name, user_pass, user_email, user_gender, verified, token, admin)
      VALUES (?, ?, ?, ?, ?, ?, ?)";

      $params = array($user_name, $hashedPwd, $user_email, $user_gender, $verified_account, $token, $admin_rights);
      $result = $q->query($sql, $params);
    
      if($result) {

        sendVerificationMail($user_email, $token);

        $sql = "SELECT id FROM users WHERE user_name = ?";
        $params = array($user_name);
        $result = $q->query($sql, $params);
        $user_info = $q->getData($result);
      
        $user_id = $user_info['id'];

        $sql = 'INSERT INTO images (id, extension, hasPicture) VALUES (?, "jpg", 0)';
        $params = array($user_id);
        $result = $q->query($sql, $params);
      
        if($result) {
          echo "<script>alert('Congratulations $user_name, your account has been created sucessfully!')</script>";
          echo "<script>window.open('". $website ."index.php?signup=success','_self')</script>";
        }
      }
      else {
        echo "<script>alert('Registration failed, try again!')</script>";
        echo "<script>window.open('". $website ."signup.php')</script>";
      }
    }
}


// Verifying user function
function verifyUser($token) {
  $q = new Queries();

  $sql = "SELECT * FROM users WHERE token = ? LIMIT 1";
  $params = array($token);
  $result = $q->query($sql, $params);

  $user = $q->getData($result);
  $rowCount = $q->getRowCount($result);

  if($rowCount > 0) {
    $sql = "UPDATE users SET verified = 1 WHERE token = ?";
    $params = array($token);
    $result = $q->query($sql, $params);

    if($result){
      // Login user with a verified account
      $_SESSION['user_name'] = $user['user_name'];
      $_SESSION['user_email'] = $user['user_email'];
      $_SESSION['user_gender'] = $user['user_gender'];
      $_SESSION['verified'] = $user['verified'];
      $_SESSION['user_id'] = $user['id'];
    }
  }
}