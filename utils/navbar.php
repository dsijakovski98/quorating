<?php 
    session_start();
?>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="images/Qlogo.png" width="80">
  <a class="navbar-brand" style="margin-left:10px;">QuoRating</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Movies</a>
          <a class="dropdown-item" href="#">Books</a>
          <a class="dropdown-item" href="#">Games</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="signin.php" id="login_reg">Login/Register</a>
       </li>
       <li class="nav-item">
          <?php 
            if(isset($_SESSION['user_name'])) {

              echo '<script>document.getElementById("login_reg").style.display = "none";</script>';
              
              $fileExt = "";
              $picName = "default";
              if(isset($_SESSION['ext']) ) {
                // This means that the user uploaded a his/her profile picture
                $fileExt = $_SESSION['ext'];
                $picName = $_SESSION['user_name'];
              }
              else {
                $fileExt = "jpg";
              }
              echo '<img class="rounded" src="images/profilePics/' . $picName . "." . $fileExt . '" width="50">';
              echo '<li class="nav-item" style="margin-bottom:0;">';
              echo '<a class="nav-link"  href="#">Welcome, '. $_SESSION['user_name'] .'</a>';
              echo '</li>';

              echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="views/edit_profile.php">Edit Profile</a>
              <a class="dropdown-item" href="includes/logout.php">Logout</a>
            </div>';
            }
          ?>
          <a class="nav-link" href="signin.php" style="display:none;">username</a>
       </li>
      </ul>
  </div>
  <!-- <img src="images/Qlogo.png" width="80" alt="" srcset=""> -->
  </div>
</nav>