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
								<p class="leading">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam.</p>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-9">
								<h2 class="section-title">Vision &amp; Misssion</h2>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>

								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam dignissimos ducimus qui blanditiis praesentium voluptatum atque.</p>
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


