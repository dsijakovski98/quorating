<?php
	session_start();
	require_once 'utils/include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
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
<br>
<main class="main-content">
				<div class="container">
					<div class="page">


						<div class="row">
							<div class="col-md-4">
								<figure><img  style="border-radius:50%;" src="<?php echo $website; ?>images/Qlogo.png" alt="figure image"  height="300" width="300"></figure>
							</div>
							<div class="col-md-8">
								<p class="leading">In this unsettling time, we turn to our love of movies, books and games to give us a much needed break. Whether it's new or an old favorite, we hope to make your day a little brighter.</p>
								<p>Sign in or sign up on our page and get in-home access to the best rating page!</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-9">
								<h2 class="section-title">Vision &amp; Misssion</h2>
								<p>We had a vision to create an application that would allow users to rate their favourite movies/books/games and give their opinion about it by creating a profile on our web page.</p>
								<p>Inspired by our professors and their idea for this site, we hope that we have helped many users to decide how to spend their free time by watching the movie, reading a book, or playing a game that are good rated by others.
								While doing this apllication, we learned a lot and we hope that our work will pay off. We hope you enjoyed the application.</p>
							</div>
						</div> <!-- .row -->
						
						<h2 class="section-title">Our Team</h2>
						<div class="row">

							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img class="img rounded-circle" src="<?php echo $website; ?>images/daniel.jpg" alt="" height="100" width="100"></figure>
									<h4 class="team-name">Даниел Шијаковски</h4>
									<small class="team-title">Founder</small>
								</div>
							</div>

							<div class="col-md-3">
								<div class="team">
								<figure class="team-image"><img class="img rounded-circle" src="<?php echo $website; ?>images/tea.jpg" alt="" height="100" width="100"></figure>
									<h4 class="team-name">Теодора Јовческа</h4>
									<small class="team-title">Founder</small>
								</div>
							</div>
							
						</div>
					</div>
				</div> <!-- .container -->
			</main>
			
		</div>
		<!-- Default snippet for navigation -->
		
		<script src="<?php echo $website; ?>js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo $website; ?>js/plugins.js"></script>
		<script src="<?php echo $website; ?>js/app.js"></script>
		<link rel="<?php echo $website; ?>css/style"></script>


<?php
	require_page("utils/footer.php");
	require_page("utils/bootstrap_scripts.php");
?>	
</body>
</html>


