<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		require_once 'utils/bootstrap.php';
	?>
	<!-- <link rel="stylesheet" type="text/css" href="css/signin.css"> -->
</head>
<body>
<?php
	include_once 'utils/navbar.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<h2>Contact</h2>
			<ul style="margin-left:-20px;">
				<li>
					<span>QuoRating</span>
				</li>
				<li>
					<a href="tel:1590912831">+389/70-352-918</a>
				</li>
				<li>
					<a href="mailto:contact@companyname.com">quorating@gmail.com</a>
				</li>
			</ul>

			<form method="post" action="send_mail.php">
				<div class="form-group">
					<label>Username</label>
						<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required="required">
				</div>    

				<div class="form-group">
					<label>To:</label>
						<input type="text" class="form-control" placeholder="E-mail" name="email" autocomplete="off" required="required">
				</div>

				<div class="form-group">
					<label>Subject</label>
						<input type="text" class="form-control" placeholder="Subject" name="subject" autocomplete="off">
				</div>    

				<div class="form-group">
					<label>Message</label>   
						<textarea type="text" class="form-control" placeholder="Tell us anything..." name="Message" autocomplete="off" required="required"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div> <!-- .container -->
		<!-- Default snippet for navigation -->
<?php
	require_once 'utils/footer.php';
	require_once 'utils/bootstrap_scripts.php';
?>	
</body>
</html>