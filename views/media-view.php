<?php

session_start();

require_once '../utils/include.php';

if(!isset($_POST['submit-media'])){
    $path = $website . "index.php";
    header("Location: " . $path);
    exit();
}

$categorie = $_POST['categorie'];
$id = $_POST['media_id'];
$table = $_POST['table_name'];


require_once("../control/media-view-control.php");
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title><?php echo ucfirst($table) . " Review | Review"; ?></title>
        <?php
            require_page("utils/bootstrap_scripts.php");
            require_page("utils/bootstrap.php");
        ?>
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
    <div class="container">
       
        <div class="content" >
			<div class="row">

            <div class="col-md-6">
					<figure class="movie-poster"><img src="<?php echo $website; ?>images/thumb-3.jpg" alt="#"></figure>
                </div>
                
				<div class="col-md-6">

                    <h3 class="movie-title"><?php echo $media['name'] . '<br>'; ?></h3>
                    
					<div class="movie-summary">
						<p><?php echo $media['description'] . '<br>';?></p>
                    </div>
                    
					<ul class="movie-meta">
						<li><?php echo 'Genre: ' . ucfirst($media['genre']) . '<br>';?></li>
					</ul>

					<ul class="starring">
                        <?php
                        $creator = "";
                        switch($categorie_name) {
                            case 'Book':
                                $creator = "Author";
                            break;

                            case 'Movie':
                                $creator = "Director";
                            break;

                            case 'Game':
                                $creator = "Developer";
                        }
                        ?>
						<li><?php echo $creator . ': ' . $media['creator'] . '<br>'; ?></li>
                    </ul>
                    
                    <ul>
                    <li><strong>Rating: </strong> 
							<div class="star-rating" title="Rated 4.00 out of 5" style="display:inline-block;"><span style="width:80%"><strong class="rating"> <?php echo $media['score']; ?></strong> out of 5</span></div></li>
                    </ul>
                    <table>
                    
                    <tr>
                    <div align="center" class="bg-dark" padding: 100px; color:black;>
                        <i class="far fa-lightbulb" data-index="0"></i>
                        <i class="far fa-lightbulb" data-index="1"></i>
                        <i class="far fa-lightbulb" data-index="2"></i>
                        <i class="far fa-lightbulb" data-index="3"></i>
                        <i class="far fa-lightbulb" data-index="4"></i>
                    </tr>
                    <br>
                    
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
        </div> 
        
		<?php
        	require_page("utils/footer.php");
        ?>
        
	</body>

</html>
