 <!-- DISPLAYING NUMBER OF COMMENTS -->
 <?php $comments = getComments($categorie_id, $product_id); ?>

<!-- Display total number of comments on this post  -->
<div class="row" style="margin-top:20px;">
    <div class="container">
        <h2 class="text-left"><?php echo count($comments); ?> Comment(s)</h2>
        <br>
    </div>

    <!-- DISPLAYING ALL COMMENTS -->
    <?php 
        if($comments):
            $i = 0;
            foreach($comments as $comment):
                $i++;
    ?>
    <div class="row">
        <div class="card" style="width:40rem; margin-bottom:10px">
            <div class="card-body">
                <img class="float-left rounded" src="<?php echo $website . "images/ProfilePics/" . $comment['user_name'] . '.' . $comment['extension']; ?>" width="65" height="80" style="margin-right:20px;">
                <h5 class="card-title"><?php echo $comment['user_name']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['date_added']; ?></h6>
                <p class="card-text"><?php echo $comment['comment']; ?></p>
                <?php if(isset($_SESSION['user_name']) && $comment['user_name'] == $_SESSION['user_name']): ?>
                <form style="display:inline-block;" action="<?php echo $website;?>control/comments-controller.php" method="POST">
                    <input type="hidden" name='user_id' value="<?php echo $comment['user_id'];?>">
                    <input type="hidden" name="categorie_id" value="<?php echo $comment['categorie_id'];?>">
                    <input type="hidden" name="prod_id" value="<?php echo $comment['prod_id'];?>">
                    <input type="hidden" name="comment" value="<?php echo $comment['comment'];?>">
                    <input type="hidden" name="date" value="<?php echo $comment['date_added']; ?>">
                    <button class="btn btn-danger" type="submit" name="delete-comment">Delete</button>

                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">Edit</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <textarea cols="40" rows="3" name="new_comment"><?php echo $comment['comment'];?></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit-comment">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>                                                            
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; 
    endif;
?>