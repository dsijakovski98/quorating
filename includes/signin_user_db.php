<?php 
session_start();

require_once '../model/userqueries.php'; 

	if(isset($_POST['sign_in'])){
		$uid = htmlentities($_POST['email']);
		$pass = htmlentities($_POST['pass']);


		// Get the user from the 'users' table VIA email
		$userQ = new UserQueries();
		
		$sql = "SELECT * FROM users WHERE user_email = ? OR user_name = ?";
		$params = array($uid, $uid);

		$result = $userQ->query($sql, $params);
		
		$check_user = $result->rowCount();
		$row = $result->fetch();
		$user_password = $row['user_pass'];
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