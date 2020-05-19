<?php

require_once '../utils/include.php';
require_page("utils/commentsRatings.php");

$tables = array(
    1 => "movies",
    2 => "books",
    3 => "games"
);

if($_POST['rating'] == 0) {
    header("Location: /quorating/index.php");
    exit();
}

$user_id = $_POST['user_id'];
$categorie_id = $_POST['categorie_id'];
$prod_id = $_POST['prod_id'];
$r_date = $_POST['r_date'];
$rating = $_POST['rating'];

$product = "";

switch($categorie_id) {
    case '1':
        $product = "movie";
        break;
    case '2':
        $product = "book";
        break;
    case '2':
        $product = "game";
        break;
}




$result = setRatings($user_id, $categorie_id, $prod_id, $rating, $r_date);

if($result) {
    // js alert success
    echo "<script>alert('You have successfully rated this " . $product . " a rating of " . $rating . " out of 5')</script>";
}
else {
    // js alert failure
    echo "<script>alert('Failure!!!')</script>";
}

// js redirect
?>
        <form action="/quorating/views/media-view.php" method="POST" id="media-view-form">
            <input type="hidden" name="categorie" value="<?php echo $categorie_id; ?>">
			<input type="hidden" name="media_id" value="<?php echo $prod_id;?>">
			<input type="hidden" name="table_name" value="<?php echo $tables[$categorie_id];?>">
            <input type="hidden" name="submit-media" value="submit">
        </form>
        
        <script>
            var form = document.getElementById("media-view-form");
            // console.log(form);
            form.submit();
        </script>

