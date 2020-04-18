<?php
    require_once '../control/books-control.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Book Review | Review</title>

		<link rel="stylesheet" href="../css/cssCategories/style.css">
	</head>

	<body>
    <?php
        include_once 'other-navbar.php';
    ?>

	<br>
		<!-- GENRES -->
		<div class="col-md-2 bg-dark rounded text-center" style="margin-top:15px;">
		
		<h2 class="text-center" style="margin-top:8px; user-select:none;">Search by genres</h2>
			<?php foreach($genres as $genre): ?>
			<a class="btn text-light font-weight-bold" style="font-size:1.5em;" href="#"><?php echo $genre;?></a>
			<br>
			<?php endforeach; ?>
			<br>
		</div>

		<div class="container col-md-offset-2">
			<?php foreach ($data as $row): ?>
			<div class="card" style="margin:1%; width:21rem; display:inline-block;">
				<img class="rounded img-fluid" src="../images/popcorn.jpg">
  				<div class="card-body">
    				<h3 class="card-title text-dark"><?php echo $row['b_name']; ?></h3>
    				<p class="card-text text-left text-dark">
						<?php echo substr($row['b_description'], 0, 60) . "...";?>
					</p>
    				<a href="#" class="btn btn-primary">Read More</a>
  				</div>

			</div>
			<?php endforeach; ?>
		</div>
		<?php
        	require '../utils/footer.php';
        	include_once '../utils/bootstrap_scripts.php';
        ?>

	</body>

</html>