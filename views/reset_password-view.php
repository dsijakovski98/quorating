<?php
	require_once '../utils/include.php';

	// Revert to index.php if they are not set or they are not the proper type
	if(!isset($_GET['selector'], $_GET['validator']) || !ctype_xdigit($_GET['selector']) || !ctype_xdigit($_GET['validator'])){
		$path = $website . "index.php";
		header("Location: " . $path);
		exit();
	}

	$selector = $_GET['selector'];
	$validator = $_GET['validator'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset your password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php
		require_page("utils/bootstrap.php");
		require_page("utils/bootstrap_scripts.php");
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo $website; ?>css/signin.css">
</head>
<body>
	<?php
		require_page("utils/navbar.php");
	?>
	<div class="col-md-4"></div>
	<div class="signin-form container col-md-4">
		<form action="<?php echo $website; ?>control/reset-forgotten-password.php" method="post">
			<div class="form-header" style="background-color:#251F1F;">
				<h2 class="text-center" style="text-decoration:underline;">Reset your password</h2>
				<br>
			</div>
			<input type="hidden" name="selector" value="<?php echo $selector; ?>">
			<input type="hidden" name="validator" value="<?php echo $validator; ?>">
			<div class="form-group">
			<!-- PHP: ERROR HANDLING -->
			<?php
				if(isset($_GET['error'])) {
					$error = $_GET['error'];

					switch($error) {
						case 'mismatch':
							echo '
								<div class="alert alert-danger">
									<li class="text-danger text-center">Password mismatch!</li> 
								</div>
							';
							break;
						case 'short':
							echo'
								<div class="alert alert-danger">
									<li class="text-danger text-center">Use at least 8 characters!</li> 
								</div>
							';
							break;
							case 'resubmit':
								echo'
									<div class="alert alert-danger">
										<li class="text-danger text-center">Please resubmit your request!</li> 
									</div>
								';
								break;
					}
				}
			?>
				<label>Enter new password</label>
				<input type="password" class="form-control" placeholder="Password" name="pass1" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Confirm new password</label>
				<input type="password" class="form-control" placeholder="Confirm Password" name="pass2" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color:#251F1F;" name="pwd-reset-submit">Change</button>
			</div>
		</form>
	</div>
</body>
</html>