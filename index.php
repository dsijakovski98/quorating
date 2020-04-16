<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        include_once 'utils/bootstrap.php';
    ?>
  <title>QuoRating - Rate stuff</title>
</head>

<body>
<?php
    include_once 'utils/navbar.php';
?>

<!-- LAYOUT -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Rate your favorite movies from home</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
            <a class="text-light" href="#"><h2>Movies</h2></a>
            <br>
            <img class="img-fluid thumbnail" src="images/popcorn.jpg" alt="">
        </div>
        <div class="col-md-4 col-sm-12 Dcontent bg-light text-center">
        <a class="text-dark" href="#"><h2>Books</h2></a>
        <br>
            <img class="img-fluid thumbnail" src="images/books.jpg" alt="">
        </div>
        <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
        <a class="text-light" href="#"><h2>Games</h2></a>
        <br>
            <img class="img-fluid thumbnail" src="images/video-games.jpg" alt="">
        </div>
    </div>
</div>

<div class="container">
    <hr style="background:black;">
    <footer class="text-right">
       <?php echo "<p>&copy;". date("Y") ."  QuoRating, Inc.</p>"; ?>
    </footer>
</div>

<?php
    include_once 'utils/bootstrap_scripts.php';
?>
</body>
</html>