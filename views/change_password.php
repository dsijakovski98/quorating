<?php
	require_once '../utils/include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create new Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $website; ?>css/signin.css">
</head>
<body>
	<div class="col-md-4"></div>
	<div class="signin-form container col-md-4">
		<form action="<?php echo $website; ?>control/password-control.php" method="post">
			<div class="form-header" style="background-color:#251F1F;">
				<h2 class="text-center" style="text-decoration:underline;">Create New Password</h2>
				<br>
			</div>
			<div class="form-group">
				<label>Enter old password</label>
				<input type="password" class="form-control" placeholder="Password" name="old_pass" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Enter new password</label>
				<input type="password" class="form-control" placeholder="Password" name="pass1" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Confirm new password</label>
				<input type="password" class="form-control" placeholder="Confirm Password" name="pass2" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color:#251F1F;" name="change">Change</button>
			</div>
			<?php
				if(isset($_GET['error'])) {
					$error = $_GET['error'];

					switch($error) {
						case 'old':
							echo"
								<div class='alert alert-danger'>
									<strong>Incorrect old password!</strong> 
								</div>
							";
							break;
						case 'mismatch':
							echo"
								<div class='alert alert-danger'>
									<strong>Your new password did't match with each other</strong> 
								</div>
							";
							break;
						case 'short':
							echo"
								<div class='alert alert-danger'>
									<strong>Use at least 8 characters</strong> 
								</div>
							";
							break;
					}
				}
			?>
		</form>
	</div>
</body>
</html>