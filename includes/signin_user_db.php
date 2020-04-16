<?php 
session_start();

include("../model/connection.php"); 

	if(isset($_POST['sign_in'])){
		$uid = htmlentities($_POST['email']);
		$pass = htmlentities($_POST['pass']);


		// Get the user from the 'users' table VIA email
		$select_user = "SELECT * FROM users WHERE user_email = ? OR user_name = ?";
		$statement = $pdo->prepare($select_user);
		$statement->execute([$uid, $uid]);

		$check_user = $statement->rowCount();
		$result = $statement->fetch();
		$user_password = $result['user_pass'];
		// Check if password is correct
		$pwd = password_verify($pass, $user_password);

		if($check_user == 1 && $pwd == 1) {
			// $_SESSION['user_email'] = $email;
			header("Location: ../index.php");
		}
		else if($check_user == 1) { // Password incorrect
			header("Location: ../signin.php?error=pwd");
			exit();
		}
		else { // User/email incorrect
			header("Location: ../signin.php?error=user");
			exit();
		}
	}
	?>