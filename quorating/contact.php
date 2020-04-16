<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
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
<div id="site-content">
	<header class="site-header">
		<div class="container">
			<a href="index.html" id="branding">
			</a> <!-- #branding -->
	</header>
	<main class="main-content">
		<div class="container">
			<div class="page">
                <div class="content">
					<div class="row">
						<div class="col-md-4">
							<h2>Contact</h2>
								<ul class="contact-detail">
									<li>
										<address><span>QuoRating</span></address>
									</li>
									<li>
										<img src="images/icon-contact-phone.png" alt="">
										<a href="tel:1590912831">+389/70-352-918</a>
									</li>
									<li>
									    <img src="images/icon-contact-message.png" alt="">
										<a href="mailto:contact@companyname.com">dsijakovski69@gmail.com</a>
									</li>
								</ul>
								<div class="form-group">
                                    <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required="required">
                                </div>    
                                <div class="form-group">
                                    <label>Email</label>
                                        <input type="text" class="form-control" placeholder="E-mail" name="email" autocomplete="off" required="required">
								</div>
                                <div class="form-group">
                                    <label>Message</label>   
                                        <textarea type="text" class="form-control" placeholder="message..." name="Message" autocomplete="off" required="required"></textarea>
                                </div> 
                                <div class="form-group">
			                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
		                        </div>
						    </div>
					    </div>
				    </div>
			    </div>
		    </div>
	    </div> <!-- .container -->
	</main>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">About Us</h3>
						<p>Something static</p>
				</div>
			</div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</footer>
</div>
		<!-- Default snippet for navigation -->
<?php
	require 'utils/footer.php';
	include_once 'utils/bootstrap_scripts.php';
?>	
</body>
</html>