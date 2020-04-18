<?php 
require_once '../model/queries.php';
// include_once ("../utils/validate.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = htmlentities($_POST['user_name']);
  $user_email = htmlentities($_POST['user_email']);
  $user_pass = htmlentities($_POST['user_pass']);
  $user_gender = htmlentities($_POST['user_gender']);
  
  // Epmty fields [x]

  // Password length >= 8
  if (strlen($user_pass) < 8) {
    header("Location: ../signup.php?error=pwd");
    exit();
  }
  // E-mail validation
  else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=email");
    exit();
  }
  else {
    $q = new Queries();

    // Check for unique username
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $params = array($user_name);
    $result = $q->query($sql, $params);
    if($result->rowCount() > 0) {
      header("Location: ../signup.php?error=uniqUser");
      exit();
    }

    // Check for unique email
    $sql = "SELECT * FROM users WHERE user_email = ?";
    $params = array($user_email);
    $result = $q->query($sql, $params);
    if($result->rowCount() > 0) {
      header("Location: ../signup.php?error=uniqMail");
      exit();
    }


    // Successfull registration

    // Hash password
    $hashedPwd = password_hash($user_pass, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users (user_name, user_pass, user_email, user_gender, admin) VALUES (?, ?, ?, ?, 0)";
    $params = array($user_name, $hashedPwd, $user_email, $user_gender);
    $result = $q->query($sql, $params);

    
    

    if($result) {
      $sql = "SELECT id FROM users WHERE user_name = ?";
      $params = array($user_name);
      $result = $q->query($sql, $params);
      $user_info = $result->fetch();
      
      $user_id = $user_info['id'];
      $sql = 'INSERT INTO images (id, extension, hasPicture) VALUES (?, "jpg", 0)';
      $params = array($user_id);
      $result = $q->query($sql, $params);
    
      if($result){
        echo "<script>alert('Congratulations $user_name, your account has been created sucessfully!')</script>";
        echo "<script>window.open('../index.php?signup=success','_self')</script>";
      }
    }
    else {
      echo "<script>alert('Registration failed, try again!')</script>";
      echo "<script>window.open('signup.php')</script>";
    }
  }
}
?>