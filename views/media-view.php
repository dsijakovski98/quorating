<?php

if(!isset($_POST['submit-media'])){
    header("Location: ../index.php");
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1" user-scalable=no>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
		<title><?php echo "$table Review | Review"; ?></title>
		<link rel="stylesheet" href="../css/cssCategories/style.css">
  		<link rel="stylesheet" href="../css/styles.css">

	</head>

	<body>
    <?php
        include_once 'other-navbar.php';
        // Capitalizing the first character of the table name ("movies" -> "Movies")
        $categorie_name = ucfirst($table);
        // Removing the last character from the name ("Movies -> Movie")
        $categorie_name = substr($categorie_name, 0, -1);
    ?>
    <br>
        
        <div class="content" >
			<div class="row">

            <div class="col-md-6" align="center">
					<figure class="movie-poster"><img src="../images/thumb-3.jpg" alt="#"></figure>
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
                    <table>
                    
                    <tr>
                    <div align="center" class="bg-dark" padding: 100px; color:white;>
                        <i class="far fa-lightbulb" data-index="0"></i>
                        <i class="far fa-lightbulb" data-index="1"></i>
                        <i class="far fa-lightbulb" data-index="2"></i>
                        <i class="far fa-lightbulb" data-index="3"></i>
                        <i class="far fa-lightbulb" data-index="4"></i>
                    </tr>
                    <br>
                    <tr>
                    <button class="btn btn-primary btn-block btn-lg bg-dark" style="height:50px;width:200px" name="goBack"><a href="media-list.php">Go Home</button>
                    </tr>
                    
                    </table>
                        <br><br>
                    </div>

                    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
                    <script>
                        var ratedIndex = -1, uID = 0;

                        $(document).ready(function () {
                        resetBulbColors();

                        if (localStorage.getItem('ratedIndex') != null) {
                        setBulbs(parseInt(localStorage.getItem('ratedIndex')));
                        uID = localStorage.getItem('uID');
                        }

                        $('.fa-lightbulb').on('click', function () {
                        ratedIndex = parseInt($(this).data('index'));
                        localStorage.setItem('ratedIndex', ratedIndex);
                        saveToTheDB();
                        });

                        $('.fa-lightbulb').mouseover(function () {
                        resetBulbColors();
                        var currentIndex = parseInt($(this).data('index'));
                        setBulbs(currentIndex);
                        });

                        $('.fa-lightbulb').mouseleave(function () {
                        resetBulbColors();

                        if (ratedIndex != -1)
                        setBulbs(ratedIndex);
                        });
                    });

                    function setBulbs(max) {
                    for (var i=0; i <= max; i++)
                        $('.fa-lightbulb:eq('+i+')').css('color', 'yellow');
                    }

                    function resetBulbColors() {
                    $('.fa-lightbulb').css('color', 'white');
                    }
    </script>
				</div><!--.col-md-6-->
            </div> <!-- .row -->
        </div><!-- .content-->
        
		<?php
        	require '../utils/footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
        <script src="../js/bootstrap.min.js"></script>
        
	</body>

</html>
