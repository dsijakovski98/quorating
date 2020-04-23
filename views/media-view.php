<?php

require_once '../utils/include.php';

if(!isset($_POST['submit-media'])){
    $path = $website . "index.php";
    header("Location: " . $path);
    exit();
}

$categorie = $_POST['categorie'];
$id = $_POST['media_id'];
$table = $_POST['table_name'];

require_once '../control/media-view-control.php';
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title><?php echo "$table Review | Review"; ?></title>
        
        <link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $website; ?>css/cssCategories/style.css">
  		<link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">

	</head>

	<body>
    <?php
        require_page("utils/navbar.php");
        // Capitalizing the first character of the table name ("movies" -> "Movies")
        $categorie_name = ucfirst($table);
        // Removing the last character from the name ("Movies -> Movie")
        $categorie_name = substr($categorie_name, 0, -1);
    ?>
    <br>
        
        <div class="content">
			<div class="row">

            <div class="col-md-6">
					<figure class="movie-poster"><img src="<?php echo $website; ?>images/thumb-3.jpg" alt="#"></figure>
                </div>
                
				<div class="col-md-6">

                    <h3 class="movie-title"><?php echo $categorie_name .' name: ' . $media['name'] . '<br>'; ?></h3>
                    
					<div class="movie-summary">
						<p><?php echo $categorie_name .' description: ' . $media['description'] . '<br>';?></p>
                    </div>
                    
					<ul class="movie-meta">
						<li><?php echo $categorie_name .' genre: ' . $media['genre'] . '<br>';?></li>
					</ul>

					<ul class="starring">
						<li><?php echo $categorie_name .' created by: ' . $media['creator'] . '<br>'; ?></li>
                    </ul>
                    
                    <ul>
                    <li><strong>Rating:</strong> 
							<div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div></li>
                    </ul>

				</div><!--.col-md-6-->
            </div> <!-- .row -->
            <button class="btn btn-primary btn-block btn-lg bg-dark" style="height:50px;width:200px" name="goBack"><a href="media-list.php">Go Home</button>
        </div><!-- .content-->
        
		<?php
        	require_page("utils/footer.php");
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="..<?php echo $website; ?>js/bootstrap.min.js"></script>
        
	</body>

</html>
