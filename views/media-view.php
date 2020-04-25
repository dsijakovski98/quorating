<?php

session_start();

require_once '../utils/include.php';
require_page('model/connection.php');
require_page('utils/comments.php');

date_default_timezone_set('Europe/Copenhagen');


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
                    <figure><img class="img-fluid rounded" src="<?php echo $website; ?>images/popcorn.jpg" alt="#" width="550px;"></figure>
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
                        <li class="h5"><strong>Rating: 
                            <div class="star-rating" style="display:inline-block;"><span style="width:80%"><?php echo $media['score']; ?>/5</strong></span></div></li>
                    </ul>
                    <?php if(isset($_SESSION['user_name'], $_SESSION['v']) && $_SESSION['v'] == 1): ?>
                    <table>
                        <tr>
                            <div align="center" class="bg-dark rounded" style="padding:10px; color:black; width:150px; margin-left:20px; user-select:none;">
                                <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="0"></i>
                                <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="1"></i>
                                <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="2"></i>
                                <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="3"></i>
                                <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="4"></i>
                            </div>
                        </tr>
                        <br>
                        
                    </table>
                    
                    <!-- COMMENTS SECTION -->
                    <div class="col-md-6 ">

                        <!-- COMMENTS FORM -->
                        <form method='POST' action="<?php echo $website; ?>control/comments-controller.php">
                            <h4>Post a comment:</h4>
                            <input type='hidden' name='user_id' value="<?php echo $_SESSION['user_id'];?>">
                            <input type='hidden' name='categorie_id' value="<?php echo $categorie_id; ?>">
                            <input type='hidden' name='product_id' value="<?php echo $product_id; ?>">
                            <input type='hidden' name='date_added' value="<?php echo date('Y-m-d H:i:s');?>">
                            <textarea name='COMMENT'cols='50' rows='4'></textarea><br>
                            <button class='btn btn-primary btn-sm pull-right' name='submit-comment'>Comment</button>
                        </form>
                        <br>
                        <!-- Display total number of comments on this post  -->
                        <h2><span id="comments_count">0</span> Comment(s)</h2>
                        <hr>

                        <!-- DISPLAYING ALL COMMENTS -->
                        <?php getComments(); ?>
                    </div><!--col-md-6-->
                    <br>
                    <br>

                    <?php endif; ?>
                </div>

                <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
                <script src="<?php echo $website; ?>js/bulbs.js"></script>
            </div><!--Row--> 
        </div><!--Content--> 
    </div><!--Container-->


    <?php
        require_page("utils/footer.php");
    ?>    
    </body>

</html>
