<?php 
session_start();

include("model/connection.php"); 

	if(isset($_POST['sign_in'])){
	
	$email = htmlentities($_POST['email']);
	$pass = htmlentities($_POST['pass']);

	$select_user = "SELECT * FROM users where user_email =:email AND user_pass =:pass";
    $statement=$pdo->prepare($select_user);
    $statement->execute(['user_email' => $email,'user_pass' => $pass]);
    $check_user=$statement->rowCount();

	if($check_user==1){

	$_SESSION['user_email']=$email;
	header("location:index.php");
	}
    
	else {
	echo "

	<div class='alert alert-danger'>
	  <strong>Check your email and password!</strong>
	";
	}
	
	}
	?>