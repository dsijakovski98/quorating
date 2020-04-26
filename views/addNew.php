<!DOCTYPE html>
<?php
  require_once '../utils/include.php';

  require_page("utils/navbar.php");
   
?>

<html>
<head>
  <title>Add New Stuff</title>
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
    <form action=" " method="post" enctype="multipart/form-data">
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
                <b>Picture:</b>
              </td>
              <td>
              <i class="fa fa-user" style="margin-right:5px;" aria-hidden="true"></i> 
              <input type="file" name="Pic" value="Upload Picture">
              </td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Creator</td>
              <td>
              <input class="form-control" name="creator" required="required"/> 
              </td>
            </tr>
            
            <tr>
              <td style="font-weight: bold;">Category</td>
              <td>
              <select class="form-control" name="category">
                <option>Movie</option>
                <option>Book</option>
                <option>Game</option>
              </select>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Date</td>
              <td>
              <input type="date" class="form-control" name="date" required="required"/>
              </td>
            </tr>

            <tr align="center">
              <td colspan="6">
              <input class="btn btn-info" style="width: 250px;" type="submit" name="add" value="ADD"/>
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
