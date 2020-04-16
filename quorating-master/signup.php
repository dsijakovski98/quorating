<!DOCTYPE html>
<html>
<head>
	<title>Create New Account</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include_once 'utils/bootstrap.php'; 
		include_once 'utils/bootstrap_scripts.php';
	?>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
<body>

	<?php
		include_once 'utils/navbar.php';
	?>

	<div class="signup-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Fill out this form and start rating your favourite movies, books & games!</p>
			</div>
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
				<label class="checkbox-inline "><input type="checkbox" class="align-text-top" required> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign up</button>
			</div>
			<?php include("signup_user_db.php"); ?>
		</form>
		<div class="text-center small" style="color:#674288">Already have an account?<a href="signin.php"> Sign in here</a></div>
	</div>

</body>
</html>