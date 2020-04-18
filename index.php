<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
=======
    <?php 
        include_once 'utils/bootstrap.php';
    ?>
>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
  <title>QuoRating - Rate stuff</title>
</head>

<body>
<?php
<<<<<<< HEAD
    include_once 'utils/navbar.php';    
=======
    include_once 'utils/navbar.php';
>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
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
<<<<<<< HEAD
        <div class="col-md-4 Dcontent bg-dark text-center">
            <a class="text-light" href="#"><h2>Movies</h2></a>
            <img src="https://picsum.photos/300" alt="">
        </div>
        <div class="col-md-4 Dcontent bg-light text-center">
        <a class="text-dark" href="#"><h2>Books</h2></a>
            <img src="https://picsum.photos/300" alt="">
        </div>
        <div class="col-md-4 Dcontent bg-dark text-center">
        <a class="text-light" href="#"><h2>Games</h2></a>
            <img src="https://picsum.photos/300" alt="">
=======
        <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
            <a class="text-light" href="views/movies.php"><h2>Movies</h2></a>
            <br>
            <img class="img-fluid thumbnail" src="images/popcorn.jpg" alt="">
        </div>
        <div class="col-md-4 col-sm-12 Dcontent bg-light text-center">
        <a class="text-dark" href="views/books.php"><h2>Books</h2></a>
        <br>
            <img class="img-fluid thumbnail" src="images/books.jpg" alt="">
        </div>
        <div class="col-md-4 col-sm-12 Dcontent bg-dark text-center">
        <a class="text-light" href="views/games.php"><h2>Games</h2></a>
        <br>
            <img class="img-fluid thumbnail" src="images/video-games.jpg" alt="">
>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
        </div>
    </div>
</div>

<<<<<<< HEAD
<div class="container">
    <hr style="background:black;">
    <footer class="text-right">
        <p>&copy; 2020 QuoRating, Inc.</p>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
=======


<?php
    require 'utils/footer.php';
    include_once 'utils/bootstrap_scripts.php';
?>
>>>>>>> cf8c7b31be27b2bf36a59114ad9187ba7bd86518
</body>
</html>