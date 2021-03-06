<?php

session_start();

require_once '../utils/include.php';
require_page('model/connection.php');

date_default_timezone_set('Europe/Copenhagen');
require_page('utils/commentsRatings.php');


if(!isset($_POST['submit-media'])){
    $path = $website . "index.php";
    header("Location: " . $path);
    exit();
}

$categorie_id = $_POST['categorie'];
$product_id = $_POST['media_id'];
$table = $_POST['table_name'];

require_once("../control/media-view-control.php");
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
                    <?php
                        $picture_name = getPictureName($categorie_id, $product_id);
                        $picturePath = $website . "images/media/$table/$picture_name";
                        // echo $picturePath;
                     ?>
                    <figure><img class="rounded" src="<?php echo $picturePath; ?>" alt="#" width="100%;" height="550px;"></figure>
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
                        <!-- PHP TO GET CREATOR NAME -->
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
                        <li class="h5"><strong>Rating: 
                            <div class="star-rating" style="display:inline-block;"><span style="width:80%"><?php echo number_format($media['score'], 1); ?>/5</strong></span></div></li>
                    </ul>

                    <?php if(isset($_SESSION['user_name'], $_SESSION['verified']) && $_SESSION['verified'] > 0):
                        require_once("../utils/rating_bulbs.php");    
                    ?>
                    
                    <!-- COMMENTS -->
                    <div class="col-md-6 ">
                        <!-- FORM TO POST A COMMENT -->
                        <form method='POST' action="<?php echo $website; ?>control/comments-controller.php">
                            <h4>Post a comment:</h4>
                            <input type='hidden' name='user_id' value="<?php echo $_SESSION['user_id'];?>">
                            <input type='hidden' name='categorie_id' value="<?php echo $categorie_id; ?>">
                            <input type='hidden' name='product_id' value="<?php echo $product_id; ?>">
                            <input type='hidden' name='date_added' value="<?php echo date('Y-m-d H:i:s');?>">
                            <textarea name='COMMENT'cols='50' rows='4' value="<?php echo $comment;?>"></textarea><br>
                            <button type="submit" class="btn btn-primary btn-lg bg-dark" name="submit-comment">Comment</button>
                        </form>
                        <br>
                    </div><!--col-md-6-->
                </div><!--col-md-6-->   
                <?php 
                    endif;
                    require_once '../utils/comment_section.php';
                ?>              
            </div><!--Row-->
        </div><!--Content--> 
    </div><!--Container-->

    <?php
        require_page("utils/footer.php");
    ?>
     <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    </body>

</html>
