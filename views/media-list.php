<?php

	session_start();

    if(!isset($_GET['c'])){
        header("Location: /index.php");
        exit();
    }
		$categorie = $_GET['c'];
		require '../utils/include.php';
		require_once '../control/media-list-control.php';
		
		$media_name = lcfirst(substr($media, 0, -1));
		$media_name .= 's';
		// echo $media_type;


?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title><?php echo "$media Review | Review"; ?></title>
        <link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">

	</head>

	<body>
    <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
			$path .= $website;
			$path .= "utils/navbar.php";
			require_once($path);
    ?>


	<div style="background-color: #1C1616;">

		<br>
		<!-- GENRES -->
		<?php if(isset($_SESSION['user_name'], $_SESSION['verified']) && $_SESSION['verified'] > 0): ?>
		<div class="row" style="margin:0px;">
			<div class="col-md-2 text-center" style="margin:0px; margin-left:8px;">
				<button type="submit" class="btn btn-primary btn-lg bg-dark" name="add" style="margin:-5px;"><a href="addNew.php?c=<?php echo $categorie; ?>">Add new <?php echo $media_name; ?></a></button>
			</div>
		</div>
		<?php endif; ?>
		<div class="col-md-2 bg-dark rounded text-center float-left" style="margin-top:20px; margin-left:10px; height:100%;">
		
		<h2 class="text-center text-info font-weight-bold" style="margin-top:8px; margin-bottom:15px; text-decoration:underline; user-select:none;">Genres</h2>

		<a class="btn text-light font-weight-bold" style="font-size:1.6em; margin:5px;" href="<?php echo $website;?>views/media-list.php?c=<?php echo $categorie;?>">All <?php echo $media;?></a>
			<?php
				foreach($genres as $genre):
					$href = $website . "views/media-list.php?c=" . $categorie . "&g=" . $genre;
			?>
			<a class="btn text-light font-weight-bold" style="font-size:1.5em; margin:5px;" href="<?php echo $href; ?>"><?php echo $genre;?></a>
			<br>
			<?php endforeach; ?>
			<br>
			
		</div>
		
		
		<div class="container col-md-11 offset-md-2">
			<?php foreach ($data as $row):

				if($row['confirmed'] == 0) {
					continue;
				}

				// var_dump($row);
				if(isset($_GET['g'])){
					$filter_genre = strtolower($_GET['g']);
					$media_genre = explode(', ', $row['genre']);
					$genre_check = false;
					foreach($media_genre as $genre_) {
						if($filter_genre == strtolower($genre_)){
							$genre_check = true;
						}
					}
					if(!$genre_check){
						continue;
					}
				}
				$picture_name = getPictureName($categorie, $row['id']);
				$picturePath = $website . "images/media/$media_name/$picture_name";
				// echo $picturePath;
				// echo $picture_name;
			?>
			<div class="card" style="margin:1%; width:20rem; display:inline-block; vertical-align:top;">
				<img class="rounded" src="<?php echo $picturePath; ?>" width="100%" height="390px">
				<div class="card-body">
					<h3 class="card-title text-dark" style="height:30px; font-size:4vh;"><?php echo $row['name']; ?></h3>
					<br>
					<p class="card-text text-left text-dark"">
						<?php echo substr($row['description'], 0, 60) . "...";?>
					</p>
					<form action="<?php echo $website; ?>views/media-view.php" method="POST">
					<input type="submit" class="btn btn-primary text-light" name="submit-media" value="Read More">
					<input type="hidden" name="categorie" value="<?php echo $categorie; ?>">
					<input type="hidden" name="media_id" value="<?php echo $row['id'];?>">
					<input type="hidden" name="table_name" value="<?php echo $table_name;?>">
					<input type="hidden" name="submit-media" value="submit">
					</form>
				</div>

			</div>
			<?php endforeach; ?>
		</div>
		<?php
        	require_page("utils/footer.php");
			?>
			</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="<?php echo $website; ?>js/bootstrap.min.js"></script>
	</body>

</html>