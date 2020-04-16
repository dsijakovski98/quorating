<?php 
require_once '../model/userqueries.php';
// include_once ("../utils/validate.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = htmlentities($_POST['user_name']);
  $user_email = htmlentities($_POST['user_email']);
  $user_pass = htmlentities($_POST['user_pass']);
  $user_gender = htmlentities($_POST['user_gender']);
  
  // Epmty fields [x]

  // Password length >= 8
  if (strlen($user_pass) < 8) 
  {
    header("Location: ../signup.php?error=pwd");
    exit();
  } // E-mail validation
  else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signin.php?error=email");
  }
  else {
    // Check for unique username


    // Check for unique email


    // Hash password
    $hashedPwd = password_hash($user_pass, PASSWORD_DEFAULT);

    $userQ = new UserQueries();
    
    $sql = "INSERT INTO users (user_name, user_pass, user_email, user_gender) VALUES (?, ?, ?, ?)";
    $params = array($user_name, $hashedPwd, $user_email, $user_gender);
    $result = $userQ->query($sql, $params);

    if($result)
    {
      echo "<script>alert('Congratulations $user_name, your account has been created sucessfully!')</script>";
      echo "<script>window.open('../index.php?signup=success','_self')</script>";
    }
    else
    {
      echo "<script>alert('Registration failed, try again!')</script>";
      echo "<script>window.open('signup.php')</script>";
    }
    }
  }
?>