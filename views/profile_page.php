<?php
    require_once '../control/profile-page-controller.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Quorating - <?php echo $user_name; ?></title>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?php echo $website; ?>js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo $website; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $website; ?>css/styles.css">
</head>

<body>
    <?php
        require_page("utils/navbar.php");
    ?>
    
    <div style="background-color:#1C1616;">
        <!-- <br> -->
        <!-- <div> -->
            <!-- <h3 class=" text-center text-light"> <?php echo "Hey there, " . $user_name . ". This is your profile page!";?> -->
        <!-- </div> -->
        <!-- <br> -->
        <div class="container" style="background-color:#4C4646;">
            <div class="content">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <?php $pic_path = getProfilePic();?> 
                        <div class="profile-pic border border-secondary rounded text-center">
                            <img src="<?php echo $pic_path; ?>" class="rounded text-center" style="margin:10px; width:70%; height:40%;">
                            <h3 class="text-light"><?php echo $user_name;?></h3>
                            <div class="about-me border border-dark rounded" style="margin:15px; padding:7px;">
                                <h6 class="text-left text-secondary">Bio</h6>
                                <p class="text-left text-light">
                                    Just an ordinary person staying at home not being productive.
                                </p>
                            </div>
                            <h6 class="text-muted"><?php echo $user_gender; ?></h6>
                            <h6 class="text-muted">Date od birth</h6>
                            <h6 class="text-muted">City, Country</h6>
                        </div>    
                    </div>

                    <div class="col-md-8 row">

                        <div class="my-posts col-md-7 border border-secondary rounded text-center">
                            <h2 class="text-light">My posts</h2>
                            <hr style="background-color:gray;">
                            
                            <?php
                                $posts = getPosts();
                                if(empty($posts)): ?>

                                <p class="text-light">Sorry, you have no posts yet.</p>

                                <?php else:
                                    foreach($posts as $post):
                            ?>
                            <div class="card" style="margin:auto; width:80%;">
                                <div class="card-body clearfix">
                                    <img src="<?php echo $post['img_destination']; ?>" class="float-right rounded-circle" width="60" height="60" >
                                    <h4 class="card-title text-left"><?php echo $post['name'];?><small> (<?php echo $post['type'];?>)</small></h4>
                                    <p class="card-subtitle text-left text-muted">
                                        <?php echo $post['date_added'];?>
                                    </p>
                                    <hr>
                                    <p class="card-text text-dark text-left">
                                    <?php echo substr($post['description'], 0, 80) . "..."; ?>
                                    </p>
                                    <form action="<?php echo $website;?>views/media-view.php" method="POST">
                                        <input type="hidden" name="categorie" value="<?php echo $post['cat_id']; ?>">
					                    <input type="hidden" name="media_id" value="<?php echo $post['id'];?>">
					                    <input type="hidden" name="table_name" value="<?php echo $post['type'] . 's';?>">
                                        <button type="submit" name="submit-media" class="btn btn-primary">Visit post</button>
                                    </form>
                                </div>
                            </div>
                            <br>

                            <?php 
                                endforeach;
                                endif; 
                            ?>

                        </div>

                        <div class="fave-category col-md-4 text-center" style="margin-left:35px;">
                            <h4 class="text-light" style="margin-top:9px;">Favorite category</h4>
                            <hr style="background-color:gray;">

                            <div class="card" style="margin-left:-10px; width:15rem;">
                                <img class="card-img-top" src="/quorating/images/popcorn.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">#1 Movies</h3>
                                    <br>
                                    <a href="<?php echo $website; ?>views/media-list.php?c=1" class="btn btn-primary">Browse</a>
                                </div>
                            </div>


                        </div>

                    </div>
                
                </div>
                <br>

            </div>
        </div>
    <style>p{color:white;}</style>
    <?php
        require_page("utils/footer.php");
    ?>
    </div>
</body>
</html>









<!-- <div class="text-center">
                <div class="col-md-6 offset-md-3" class="text-center">

                        <div class="text-center">
                            <br>
                            <?php
     //                       $dir_path = "../images/profilePics/";
       //                     $extensions_array = array('jpg','png','jpeg');
                            
         //                   if(is_dir($dir_path)) {
           //                     $files = scandir($dir_path);
                                // var_dump($files);
                                
             //                   for($i = 0; $i < count($files); $i++) {
                //                    if(strpos($files[$i], $user_name) !== false) {
                                      // get file extension
               //                         $file = pathinfo($files[$i]);
                 //                       $extension = $file['extension'];
                                        
                   //                     $full_path = "";

                                        // check file extension
                     //                   if(in_array($extension, $extensions_array)) {
                                        // show image
                       //                 $full_path = $website . substr($dir_path, 3) . $files[$i];
                                        
                              //          }
                               //         else {
                             //               $full_path = $website . substr($dir_path, 3) . "default.jpg";
                            //            }
                           //             echo "<figure><img class='rounded' src='$full_path' style='width:100px;height:100px;'></figure><br>";
                         //           }
                          //      }
                        //    }
                            ?>
                        </div>

                        <div class="text-left">
                            <section><h3>General Info<h3>
                            <div>
                                <h4><?php //echo 'Your username: ' . $user_name . '<br>'; ?></h4>
                            </div>

                            <div>
                                <h4><?php // echo 'Your email: ' . $user_email . '<br>';?></h4>
                            </div>

                            <div>
                                <h4><?php // echo 'Your gender: ' . $user_gender . '<br>';?></h4>
                            </div>

                            <div>
                                <h4><?php // echo 'Your activity <br>';?></h4>
                                <h6><?php // echo 'Number of rated posts: <br>'?><h6>
                                <h6><?php //echo 'Number of comments: <br>'?><h6>
                            </div>
                        </div>
                        </section>

                        <br><br>
                
                            
                </div><!--.col-md-6-->
            <!-- </div> -->
        <!-- </div> -->

