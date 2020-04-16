<?php 
session_start();

include("model/connection.php"); 

	if(isset($_POST['sign_in'])){
		$email = htmlentities($_POST['email']);
		$pass = htmlentities($_POST['pass']);

		$select_user = "SELECT * FROM users WHERE user_email = ?";
		$statement = $pdo->prepare($select_user);
		$statement->execute([$email]);
		$check_user = $statement->rowCount();

		$result = $statement->fetch();
		$user_password = $result['user_pass'];
		$pwd = password_verify($pass, $user_password);

		if($check_user == 1 && $pwd == 1){
			$_SESSION['user_email'] = $email;
			header("Location: index.php");
		}
		else if($check_user == 1) {
			header("Location: signin.php?status=wrong_password");
		}
		else{
			header("Location: signin.php?status=try_again");
		}
	}
	?>