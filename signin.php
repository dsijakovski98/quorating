<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login to your account</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include_once 'utils/bootstrap.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>

<?php
	include_once 'utils/navbar.php';
?>

<div class="signin-form">
    <form action="includes/signin_user_db.php" method="post">
		<div class="form-header bg-dark">
			<h2>Sign In</h2>
			<p style="color:#fff;">Login to QuoRate</p>
		</div>
		<div class="form-group">
			<label>Email</label>
        	<input type="text" class="form-control" placeholder="Username/E-mail" name="email" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="pass" autocomplete="off" required="required">
        </div>
        <div class="small">Forgot password? <a href="views/forgot_password.php" style="color:#111;">Click Here</a></div><br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg bg-dark" name="sign_in">Sign in</button>
		</div>
<<<<<<< HEAD
		<?php include("signin_user_db.php"); ?>
=======

		<!-- PHP: ERROR MESSAGES FOR INVALID SIGN IN -->
		<?php
			if(isset($_GET['error'])) {
				$status = $_GET['error'];
				$errorMessage = "Incorrect ";
				
				if($status === "user"){
					$errorMessage .= "Username/E-mail";
				}
				else if($status === "pwd"){
					$errorMessage .= "password";
				}
				$errorMessage .= "! Please try again.";
				echo '<p class="text-danger text-center" style="margin:0;">' . $errorMessage . '</p>';
			}
		?>

>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
    </form>
	<div class="text-center small">Don't have an account? <a href="signup.php" style="color:#111;">Create one</a></div>
</div>

<style>
		p {
			color:#000;
		}
	</style>
<?php
	require 'utils/footer.php';
	include_once 'utils/bootstrap_scripts.php';
?>
</body>
</html>