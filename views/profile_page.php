<?php
    require_once '../control/profile-page-controller.php';
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title>Profile Page</title>
        
        <link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
  		<link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="..<?php echo $website; ?>js/bootstrap.min.js"></script>

	</head>

	<body>
    <?php
        require_page("utils/navbar.php");
        
    ?>

    <div style="background-color:#1C1616;">
    <br>
    <div><h3 class=" text-center text-light"> <?php echo "Welcome, " . $user_name . ". This is your profile page!";?></div>

    <br>
        
    <div class="container" style="background-color:#4C4646;">
        <div class="text-center">
            <div class="col-md-6 offset-md-3" class="text-center">

                    <div class="text-center">
                        <br>
                        <?php
                        $dir_path = "../images/profilePics/";
                        $extensions_array = array('jpg','png','jpeg');
                        
                        if(is_dir($dir_path)) {
                            $files = scandir($dir_path);
                            // var_dump($files);
                            
                            for($i = 0; $i < count($files); $i++) {
                                if(strpos($files[$i], $user_name) !== false) {
                                    // get file extension
                                    $file = pathinfo($files[$i]);
                                    $extension = $file['extension'];
                                    
                                    $full_path = "";

                                    // check file extension
                                    if(in_array($extension, $extensions_array)) {
                                    // show image
                                    $full_path = $website . substr($dir_path, 3) . $files[$i];
                                    
                                    }
                                    else {
                                        $full_path = $website . substr($dir_path, 3) . "default.jpg";
                                    }
                                    echo "<figure><img class='rounded' src='$full_path' style='width:100px;height:100px;'></figure><br>";
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="text-center">
                        <div>
                            <h4><?php echo 'Your username: ' . $user_name . '<br>'; ?></h4>
                        </div>

                        <div>
                            <h4><?php echo 'Your email: ' . $user_email . '<br>';?></h4>
                        </div>

                        <div>
                            <h4><?php echo 'Your gender: ' . $user_gender . '<br>';?></h4>
                        </div>

                        <div>
                            <h4><?php echo 'Your activity <br>';?></h4>
                            <h6><?php echo 'Number of rated posts: <br>'?><h6>
                            <h6><?php echo 'Number of comments: <br>'?><h6>
                        </div>
                    </div>

                    <br><br>
            
                        
            </div><!--.col-md-6-->
        </div> <!-- .row -->
    </div><!-- .content-->
    <style>
    p{
        color:white;
    }
    </style>        
    <?php
        require_page("utils/footer.php");
    ?>
</div>
</body>

</html>
