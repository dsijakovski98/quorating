<?php
	require_once 'utils/include.php';
	require_page("control/authentication_controller.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login to your account</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $website; ?>css/signin.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="<?php echo $website; ?>js/bootstrap.min.js"></script>
</head>
<body>

<?php
	require_page("utils/navbar.php");
?>

<div class="signin-form">
    <form action="<?php echo $website; ?>index.php" method="post">
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
        <div class="small">Forgot password? <a href="<?php echo $website; ?>views/forgot_password.php" style="color:#111;">Click Here</a></div><br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg bg-dark" name="sign_in">Sign in</button>
		</div>

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

    </form>
	<div class="text-center small">Don't have an account? <a href="<?php echo $website; ?>signup.php" style="color:#111;">Create one</a></div>
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