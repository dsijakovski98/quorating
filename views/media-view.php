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
                    <?php if(isset($_SESSION['user_name'], $_SESSION['v']) && $_SESSION['v'] == 1): ?>
                    <table>
                        <tr>
                            <form id="ratings-form" action="<?php echo $website; ?>control/rating-control.php" method="POST">
                                <input type='hidden' name='user_id' value="<?php echo $_SESSION['user_id'];?>">
                                <input type='hidden' name='categorie_id' value="<?php echo $categorie_id; ?>">
                                <input type='hidden' name='prod_id' value="<?php echo $product_id; ?>">
                                <input type='hidden' name='r_date' value="<?php echo date('Y-m-d H:i:s');?>">
                                <input type='hidden' id="rating-score" name='rating' value="0">
                            </form>
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
                            <textarea name='COMMENT'cols='50' rows='4' value="<?php echo $comment;?>"></textarea><br>
                            <button type="submit" class="btn btn-primary btn-lg bg-dark" name="submit-comment">Comment</button>
                        </form>
                        <br>
                        <!-- Display total number of comments on this post  -->
                    </div><!--col-md-6-->
                    </div>
                    <?php 
                        endif;
                        $comments = getComments($categorie_id, $product_id); 
                    ?>

                </div>
                <div class="row" style="margin-top:20px;">
                <div class="container">
                        <h2 class="text-left"><?php echo count($comments); ?> Comment(s)</h2>
                        <br>
                </div>
                <!-- DISPLAYING ALL COMMENTS -->
                <?php if($comments):
                        foreach($comments as $comment): ?>
                <div class="row">
                        <div class="card" style="width:40rem; margin-bottom:10px">
                            <div class="card-body">
                                <img class="float-left rounded" src="<?php echo $website . "images/ProfilePics/" . $comment['user_name'] . '.' . $comment['extension']; ?>" width="60" style="margin-right:20px;">
                                <h5 class="card-title"><?php echo $comment['user_name']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['date_added']; ?></h6>
                                <p class="card-text"><?php echo $comment['comment']; ?></p>
                                <?php if(isset($_SESSION['user_name']) && $comment['user_name'] == $_SESSION['user_name']): ?>
                                <form action="<?php echo $website;?>control/comments-controller.php" method="POST">
                                    <input type="hidden" name='user_id' value="<?php echo $comment['user_id'];?>">
                                    <input type="hidden" name="categorie_id" value="<?php echo $comment['categorie_id'];?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $comment['prod_id'];?>">
                                    <input type="hidden" name="comment" value="<?php echo $comment['comment'];?>">
                                    <input type="hidden" name="date" value="<?php echo $comment['date_added']; ?>">
                                    <button type="submit" name="delete-comment">Delete</button>
                                </form>
                                <form method="POST">    
                                    <input type="hidden" name='user_id' value="<?php echo $comment['user_id'];?>">
                                    <input type="hidden" name="categorie_id" value="<?php echo $comment['categorie_id'];?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $comment['prod_id'];?>">
                                    <input type="hidden" name="comment" value="<?php echo $comment['comment'];?>">
                                    <input type="hidden" name="date" value="<?php echo $comment['date_added']; ?>">
                                    <button type = "submit" data-toggle = "modal" data-target = "#myModal">Edit</button>
                                    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
                                    aria-labelledby = "myModalLabel" aria-hidden = "true">
                                    <div class = "modal-dialog">
                                        <div class = "modal-content">
                                            
                                            <div class = "modal-header">
                                                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                                                </button>
                                                
                                                <h4 class = "modal-title" id = "myModalLabel">
                                                Edit comment
                                                </h4>
                                            </div>
                                            
                                            <div class = "modal-body">
                                            <textarea rows="4" cols="50"<?php var_dump($comments);?></textarea>
                                            </div>
                                            
                                            <div class = "modal-footer">
                                                <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                                Close
                                                </button>
                                                
                                                <button type = "button" class = "btn btn-primary" name="submit-changes">
                                                Submit changes
                                                </button>
                                            </div>
                                            
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    
                                    </div><!-- /.modal -->
                                                                        
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
                <?php endforeach; 
                        endif;?>
            </div>
                <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
                <script src="<?php echo $website; ?>js/bulbs.js?<?php echo mt_rand();?>"></script>
             
        </div><!--Content--> 
    </div><!--Container-->


    <?php
        require_page("utils/footer.php");
    ?>    
    </body>

</html>
