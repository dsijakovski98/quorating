<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
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
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>