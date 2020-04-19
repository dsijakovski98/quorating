<?php

    if(!isset($_GET['c'])){
        header("Location: ../index.php");
        exit();
    }
        $categorie = $_GET['c'];
        include '../control/media-list-control.php';
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
		<title><?php echo "$media Review | Review"; ?></title>
		<link rel="stylesheet" href="../css/cssCategories/style.css">
  		<link rel="stylesheet" href="../css/styles.css">

	</head>

	<body>
    <?php
        include_once 'other-navbar.php';
    ?>

	<br>
		<!-- GENRES -->
		<div class="col-md-2 bg-dark rounded text-center" style="margin-top:15px;">
		
		<h2 class="text-center text-info" style="margin-top:8px; user-select:none; text-decoration:underline;">Search by genres</h2>
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
    				<h3 class="card-title text-dark"><?php echo $row['name']; ?></h3>
    				<p class="card-text text-left text-dark">
						<?php echo substr($row['description'], 0, 60) . "...";?>
					</p>
					<form action="media-view.php" method="POST">
    				<input type="submit" class="btn-primary text-light" name="submit-media" value="Read More">
					<input type="hidden" name="categorie" value="<?php echo $categorie; ?>">
                    <input type="hidden" name="media_id" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="table_name" value="<?php echo $table_name;?>">
					</form>
  				</div>

			</div>
			<?php endforeach; ?>
		</div>
		<?php
        	require '../utils/footer.php';
        ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
		<script src="../js/bootstrap.min.js"></script>
	</body>

</html>