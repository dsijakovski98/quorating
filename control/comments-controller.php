<?php

    require_once '../utils/include.php';
    require_page("utils/commentsRatings.php");

    $tables = array(
        1 => "movies",
        2 => "books",
        3 => "games"
    );

    if(isset($_POST['submit-comment'])) { 

        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['product_id'];
        $comment = $_POST['COMMENT'];
        $date_added = $_POST['date_added'];

        setComments($user_id, $categorie_id, $product_id, $comment, $date_added);
        
        $result = sendCommentMail($user_id, $categorie_id, $product_id, $comment, $date_added);
        
        echo "<script>alert('You have successfully commented!');</script>";
        // Add mechanism to stay on page
        ?>
        <form action="/quorating/views/media-view.php" method="POST" id="media-view-form">
            <input type="hidden" name="categorie" value="<?php echo $categorie_id; ?>">
			<input type="hidden" name="media_id" value="<?php echo $product_id;?>">
			<input type="hidden" name="table_name" value="<?php echo $tables[$categorie_id];?>">
            <input type="hidden" name="submit-media" value="submit">
        </form>
        
        <script>
            var form = document.getElementById("media-view-form");
            console.log(form);
            form.submit();
        </script>
        <?php
    }


    if(isset($_POST['delete-comment'])) {   
        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['prod_id'];
        $comment = $_POST['comment'];
        $date_added = $_POST['date'];

        // echo "User id: " . $user_id . "<br>";
        $date = date_create($date_added);
        // echo "timestamp: " . date_format($date,"Y-m-d H:i:s") . "<br>";

        $actual_date = date_format($date, "Y-m-d H:i:s");
        
        // exit();

        $result = deleteComments($user_id, $actual_date);
    
        if($result){
            echo "<script>alert('You have deleted the comment!');</script>";
        }
        else {
            echo "There has been an error while deleting the comment";
        }
        // Add mechanism to stay on page
        ?>
        <form action="/quorating/views/media-view.php" method="POST" id="media-view-form">
            <input type="hidden" name="categorie" value="<?php echo $categorie_id; ?>">
			<input type="hidden" name="media_id" value="<?php echo $product_id;?>">
			<input type="hidden" name="table_name" value="<?php echo $tables[$categorie_id];?>">
            <input type="hidden" name="submit-media" value="submit">
        </form>
        
        <script>
            var form = document.getElementById("media-view-form");
            console.log(form);
            form.submit();
        </script>
        <?php
    }

    if(isset($_POST['edit-comment'])) {  
         
        $user_id = $_POST['user_id'];
        $categorie_id = $_POST['categorie_id'];
        $product_id = $_POST['prod_id'];
        $comment = $_POST['new_comment'];
        $date_added = $_POST['date'];


        $format = "Y-m-d H:i:s";

        $date = date_create($date_added);
        $original_date = date_format($date, $format);

        $new_date = date($format);

        $result = editComments($user_id, $categorie_id, $product_id, $comment, $original_date, $new_date);
    
        if($result){
            echo "<script>alert('You have edited the comment!');</script>";
        }
        else {
            echo "There has been an error while editing the comment";
        }// Add mechanism to stay on page
        ?>
        <form action="/quorating/views/media-view.php" method="POST" id="media-view-form">
            <input type="hidden" name="categorie" value="<?php echo $categorie_id; ?>">
			<input type="hidden" name="media_id" value="<?php echo $product_id;?>">
			<input type="hidden" name="table_name" value="<?php echo $tables[$categorie_id];?>">
            <input type="hidden" name="submit-media" value="submit">
        </form>
        
        <script>
            var form = document.getElementById("media-view-form");
            console.log(form);
            form.submit();
        </script>

        <?php
    }


