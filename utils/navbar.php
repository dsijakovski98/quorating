<?php 
// session_start();
require_page("utils/secure_conn.php");
?>

 <!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="<?php echo $website; ?>images/Qlogo.png" width="80">
  <a class="navbar-brand" style="margin-left:10px; user-select:none; color:white;">QuoRating</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $website; ?>index.php">Home <span class="sr-only">(current)</span></a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo $website; ?>views/media-list.php?c=1">Movies</a>
          <a class="dropdown-item" href="<?php echo $website; ?>views/media-list.php?c=2">Books</a>
          <a class="dropdown-item" href="<?php echo $website; ?>views/media-list.php?c=3">Games</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $website; ?>about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $website; ?>contact.php">Contact Us</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $website; ?>signin.php" id="login_reg">Login/Register</a>
       </li>
          <?php 
              // <li class="nav-item">
            if(isset($_SESSION['user_name'])):
              
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
              ?>

              <!-- REQUESTS NOTIFICATIONS -->
              <?php
                if(isset($_SESSION['admin'])) {
                  require_once 'request_modal.php';
                }
              ?>

            <img class="rounded-circle" style="margin-top:5px;" src="<?php echo $website; ?>images/profilePics/<?php echo $picName;?>.<?php echo "$fileExt?" . mt_rand();?>" width="60" height="65">
            
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" style="margin-top:20px;" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, <?php echo $_SESSION['user_name'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo $website; ?>views/profile_page.php">My profile</a>
                <a class="dropdown-item" href="<?php echo $website; ?>views/edit_profile.php">Edit Profile</a>
                <a name="logout" class="dropdown-item" href="<?php echo $website; ?>control/authentication_controller.php?logout=1">
                Logout
                </a>
              </div>
            </li>
            <?php
            endif;
          ?>
       </li>
      </ul>
    </div>
  </div>
</nav>