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

if(isset($_SESSION['user_id']))
{
    $user_id=$_POST['user_id'];
    $categorie_id=$_POST['categorie_id'];
    $prod_id=$_POST['prod_id'];
    $rating=$_POST['rating'];
    $r_date=$_POST['r_date'];

    $q = new Queries();
    $sql = "INSERT INTO user_rate 
    (user_id,categorie_id,prod_id,rating,r_date) VALUES
    (:user_id,:categorie_id,:prod_id,:rating,:r_date)";
    $params = array($user_id,$catrgorie_id,$prod_id,$rating,$r_date);
    $result = $q->query($sql, $params);

}


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

                <!-- comments section -->
		        <div class="col-md-6 ">
			        <!-- comment form -->
			        <form class="clearfix" action="#" method="post" id="comment_form">
				        <h4>Post a comment:</h4>
				        <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
				        <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
			        </form>

			        <!-- Display total number of comments on this post  -->
			        <h2><span id="comments_count">0</span> Comment(s)</h2>
			        <hr>
			    
			        <div id="comments-wrapper">
				        <div class="comment clearfix">
						    <img src="#" alt="" class="profile_pic">
					        <div class="comment-details">
						        <span class="comment-name">Melvine</span>
						        <span class="comment-date">Apr 24, 2018</span>
						        <p>This is the first reply to this post on this website.</p>
				            </div>
                        </div>
			        </div><!-- comments wrapper -->
                </div><!--col-md-6-->
                <br><br>
            </div>

            <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
            <script>
                //vo ovoj del ne znam kako da go smenam za da rab so user_id a ne so local storage :(
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

            
		    </div><!--Row--> 
        </div><!--Content--> 
    </div><!--Container-->    
    <!-- Javascripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
        require_page("utils/footer.php");
    ?>
        
    </body>

</html>
