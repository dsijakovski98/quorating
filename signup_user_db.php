<?php 
include ("model/connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_pass = $_POST['user_pass'];
  $user_gender = $_POST['user_gender'];
  
  // TODO: Add more validation
  // TODO: Connect to email
  // TODO: Error handling with remembered input

  if($user_name == '')
  {
      echo "<script>alert('We can not verify your name')</script>";
  }
  else if (strlen($user_pass) < 8) 
  {
      echo "<script>alert('Password should be minimum 8 characters!')</script>";
      exit();
  }


  else {

      $pass = password_hash($user_pass, PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (user_name, user_pass, user_email, user_gender)
              VALUES (:user_name, :user_pass, :user_email,:user_gender)";

      $stmt = $pdo->prepare($sql);
      
      $stmt->execute(['user_name' => $user_name, 'user_pass' => $pass, 'user_email' => $user_email,'user_gender'=>$user_gender]);

      if($sql)
	    {
		    echo "<script>alert('Congratulations $user_name, your account has been created sucessfully!')</script>";
		    echo "<script>window.open('signin.php','_self')</script>";
	    }
	    else
	    {
		    echo "<script>alert('Registration failed, try again!')</script>";
		    echo "<script>window.open('signup.php')</script>";
	    }
      $user_name = "";
      $user_pass = "";
      $user_email = "";
	    $user_gender="";
    }
  }
?>