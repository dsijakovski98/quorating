<?php
	require_once 'utils/include.php';
	require_page("control/authentication_controller.php");

	if(isset($_SESSION['user_name'])){
		header("Location: index.php");
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New Account</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $website; ?>css/signup.css">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="<?php echo $website; ?>js/bootstrap.min.js"></script>

	
</head>
<body>

	<?php
		require_page("utils/navbar.php");
	?>

	<div class="signup-form">
		<form action="<?php echo $website; ?>signin.php" method="post">
			<div class="form-header bg-dark">
				<h2>Sign Up</h2>
				<p style="color:#fff;">Fill out this form and start rating your favourite movies, books & games!</p>
			</div>

			<!-- PHP: ERROR MESSAGES FOR INVALID SIGN UP -->
			<?php
				if(isset($_GET['error'])){
					$errorMessage = "";
					$error = $_GET['error'];

					switch($error){
						case 'pwd':
							$errorMessage .= "Password must be at least 8 characters!";
							break;
						case 'email':
							$errorMessage .= "Invalid e-mail address!";
							break;
						case 'uniqUser':
							$errorMessage .= "Username already exists!";
							break;
						case 'uniqMail':
							$errorMessage .= "E-mail address is already registered!";
							break;
					}
					echo '<p class="text-danger text-center" style="margin:0;">'. $errorMessage .'</p>';
				}
			?>

			<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="user_name" placeholder="someone123" autocomplete="off" required>
			</div>
			<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
			</div>
			<div class="form-group">
			<label>Email Address</label>
			<input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
			<label>Gender</label>
			<select class="form-control" name="user_gender" required>
				<option disabled="">Select Gender</option>
				<option>Male</option>
				<option>Female</option>
				<option>Other</option>
			</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg bg-dark" name="sign_up">Sign up</button>
			</div>
		</form>
		<div class="text-center small" style="color:#674288">Already have an account?<a href="<?php echo $website; ?>signin.php" style="color:#111;"> Sign in here</a></div>
	</div>

	<style>
		p {
			color:#000;
		}
	</style>
	<?php
		require_page("utils/footer.php");
	?>
</body>
</html>