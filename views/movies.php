<?php

require_once '../control/movies-control.php'; // Da dobijam lista so filmovi
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <?php 
        include_once '../utils/bootstrap.php';
        ?>
		<title>Movie Review | Review</title>

		<link rel="stylesheet" href="cssCategories/style.css">
	</head>

	<body>
    <?php
    include_once '../utils/navbar.php';
    ?>
		
		<div id="site-content">
			<main class="main-content">
			<div class="container">
				<div class="movie-list">
				<?php foreach ( $data as $key => value ) :?>
					<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-4.jpg" alt="#"></figure>
								<div class="movie-title"><?php echo '["m_name"]'; ?></a></div>
								<p><?php echo '$row[m_description]';?>></p>
							</div>
						</div>
						
						<div class="pagination">
							<a href="#" class="page-number prev">Prev</a>
							<span class="page-number current">1</span>
							<a href="#" class="page-number">2</a>
							<a href="#" class="page-number next">Next</a>
						</div>
					</div>
				</div>
			</main>
			
		</div>
		


		<script src="cssCategories/js/jquery-1.11.1.min.js"></script>
		<script src="cssCategories/js/plugins.js"></script>
		<script src="cssCategories/js/app.js"></script>
		<?php
        require '../utils/footer.php';
        include_once '../utils/bootstrap_scripts.php';
        ?>

	</body>

</html>