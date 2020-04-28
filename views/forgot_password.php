<?php
    require_once '../utils/include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot your password</title>
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
    <form action="<?php echo $website; ?>control/reset_password.php" method="post">
		<div class="form-header bg-dark">
			<h3>Forgot your password?</h3>
			<p style="color:#fff;">Reset it here</p>
		</div>
        <!-- PHP: STATUS MESSAGE FOR PASSWORD RESET -->
        <?php
			if(isset($_GET['status'])) {
				$status = $_GET['status'];
				$message = "";
				
				if($status === "email") {
					$message .= "E-mail address doesn't exist!";
					echo '<div class="alert alert-danger"><li class="text-danger text-center" style="margin:0;">' . $message . '</li></div>';
				}
				else if($status === "success") {
					$message = "Password reset link sent! Check your e-mail.";
					echo '<div class="alert alert-success"><li class="text-success text-center" style="margin:0;">' . $message . '</li></div>';
				}
			}
		?>
        <p class="text-center font-weight-bold" style="color:#343a40;">Type in your e-mail address and we will send you a link to reset your password.</p>
        <div class="form-group">
			<label>Email</label>
        	<input type="email" class="form-control" placeholder="Type e-mail here..." name="email" autocomplete="off" required="required">
        </div>        
        <br>
			<button type="submit" class="btn btn-primary btn-block btn-lg bg-dark" name="reset-pwd-submit">Reset password</button>
		</div>
    </form>

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