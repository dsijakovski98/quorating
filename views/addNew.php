<!DOCTYPE html>
<?php
  require_once '../utils/include.php';

  require_page("utils/navbar.php");

  if(!isset($_GET['c'])){
    $path = $website . "index.php";
    header("Location: " . $path);
    exit();
  }

  $categorie_id = $_GET['c'];
  $media_type = "";
  $creator_type = "";
  switch($categorie_id) {
    case '1':
      $media_type = "movie";
      $creator_type = "Director";
    break;
    case '2':
      $media_type = "book";
      $creator_type = "Author";

      break;
    case '3':
      $media_type = "game";
      $creator_type = "Developer";
      break;
    }
   
?>

<html>
<head>
  <title>Add a new <?php echo $media_type; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<style>
  body{ 
    overflow-x: hidden;
  }
</style>
<body>
<div class="row">
  <div class="col-sm-2"></div>

  <div class="col-sm-8">
    <form action="<?php echo $website; ?>control/addNew-controller.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover">
            <tr align="center">
              <td colspan="6" class="active"><h2>Add something new</h2></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Name</td>
              <td>
              <input class="form-control" type="text" name="name" required="required"/>
              </td>
            </tr>
            
            <tr>
              <td>
                <b>Thumbnail</b>
              </td>
              <td>
              <i class="fa fa-user" style="margin-right:5px;" aria-hidden="true"></i> 
              <input type="file" name="picture" value="Upload Picture">
              </td>
            </tr>

            <tr>
              <td style="font-weight: bold;"><?php echo $creator_type; ?></td>
              <td>
              <input class="form-control" name="creator" required="required"/> 
              </td>
            </tr>
            
            <input type="hidden" name="category" value="<?php echo $categorie_id; ?>">
            <input type="hidden" name="media_type" value="<?php echo $media_type . 's';?>">

            <tr>
              <td style="font-weight: bold;">Genre</td>
              <td>
              <input class="form-control" name="genre" required="required"/> 
              </td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Description</td>
              <td>
              <input class="form-control" name="description" required="required"/> 
              </td>
            </tr>

           <input type="hidden" name="date_added" value="<?php echo date('Y-m-d H:i:s'); ?>">

            <tr align="center">
              <td colspan="6">
              <button type="submit" class="btn btn-info" name="add" style="width: 250px;" style="margin:-5px;">Add new <?php echo $media_type; ?></button>
              </td>
            </tr>
          </table>
        </form>

  <div class="col-sm-2"></div>
</div>

<?php

require_page("utils/footer.php");
?>
</body>
</html>
