<?php
    // session_start();
    // Find the relative path to the utils folder
    require_once 'utils/include.php';
    
    // Run this function to include any file as if from the root folder
    require_page("control/authentication_controller.php");

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        verifyUser($token);
    }
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">
  <title>QuoRating - Rate stuff</title>
</head>

<body>
<?php
    require_page("utils/navbar.php");    
?>

<!-- LAYOUT -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Rate your favorite movies from home</h3>
            <br>
            <!-- PHP TO CHECK IF ACCOUNT IS VERIFIED -->
            <?php 
                if(isset($_SESSION['verified'])):
                    if($_SESSION['verified'] == 0):
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Please verify your account!</strong> Ratings and comments will be disabled otherwise. An e-mail has been sent to <strong><?php echo $_SESSION['user_email']; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    elseif($_SESSION['verified'] == 1):
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Your account has been verified!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                        endif;
                    endif;
                    ?>
        </div>
    </div>
    <!-- <br> -->
    <div class="row">
        <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
            <a class="text-light" href="<?php echo $website; ?>views/media-list.php?c=1"><h2>Movies</h2></a>
            <br>
            <img class="img-fluid thumbnail" src="<?php echo $website; ?>images/popcorn.jpg" alt="">
            <br>
            <h1></h1>
            <br>
            <h1></h1>
        </div>
        <div class="col-md-4 col-sm-12 Dcontent bg-light text-center">
            <a class="text-dark" href="<?php echo $website; ?>views/media-list.php?c=2"><h2>Books</h2></a>
            <br>
            <img class="img-fluid thumbnail" src="<?php echo $website; ?>images/books.jpg" alt="">
        </div>
            <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
            <a class="text-light" href="<?php echo $website; ?>views/media-list.php?c=3"><h2>Games</h2></a>
            <br>
            <img class="img-fluid thumbnail" src="<?php echo $website; ?>images/video-games.jpg" alt="">
        </div>
    </div>
</div>



<?php
    require_page("/utils/footer.php");
    require_page("/utils/bootstrap_scripts.php");
?>
</body>
</html>