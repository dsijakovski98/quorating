<?php
	require_once 'utils/include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		require_page("utils/bootstrap.php");
	?>
</head>
<body>
<?php
	require_page("utils/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<h2>Contact</h2>
			<ul style="margin-left:-20px;">
				<li>
					<span><u>QuoRating</u> - ул. "Руѓер Бошковиќ" бр. 18</span>
				</li>
				<li>
					<a href="tel:1590912831">+389/70-352-918</a>
					|
					<a href="tel:1590912831">+389/70-372-921</a>
				</li>
				<li>
					<a href="mailto:contact@companyname.com">quorating@gmail.com</a>
				</li>
			</ul>

			<form method="post" action="<?php echo $website; ?>control/contacting-controller.php">
				<div class="form-group">
					<label>Name</label>
						<input type="text" class="form-control" placeholder="Enter your name..." name="name" autocomplete="off" required="required">
					</div>    

				<div class="form-group">
					<label>From:</label>
						<input type="email" class="form-control" placeholder="E-mail..." name="email" autocomplete="off" required="required">
				</div>

				<div class="form-group">
					<label>Subject</label>
						<input type="text" class="form-control" placeholder="Subject" name="subject" autocomplete="off">
				</div>    

				<div class="form-group">
					<label>Message</label>   
						<textarea type="text" class="form-control" placeholder="Tell us anything..." name="body" autocomplete="off" required="required"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-lg" name="contact_submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div> <!-- .container -->
<?php
	require_page("utils/footer.php");
	require_page("utils/bootstrap_scripts.php");
?>	
</body>
</html>