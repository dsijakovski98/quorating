<!DOCTYPE html>
<?php
    require_once("../model/queries.php");

    session_start();
    $uname = $_SESSION['user_name'];
    $q = new Queries();
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $params = array($uname);
    $user = $q->query($sql, $params);
    $user_info = $user->fetch();

    if(!isset($uname)){
        header("Location: ../signin.php");
    }
    else { ?>
<html>
<head>
  <title>Account Setting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/.css">
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
  <div class="col-sm-2">
  </div>

  <div class="col-sm-8">
    <form action="../control/profile-control.php" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table-hover">
            <tr align="center">
              <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Change Your Username</td>
              <td>
              <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_info['user_name'];?>"/>
              </td>
            </tr>
            
            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="#"><i class="fa fa-user" aria-hidden="true"></i> Change Your Profile Picture</a></td></tr>

            <tr>
              <td style="font-weight: bold;">Change Your Email</td>
              <td>
              <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_info['user_email'];?>"></td>
            </tr>
            
            <tr>
              <td style="font-weight: bold;">Change Your Gender</td>
              <td>
              <select class="form-control" name="u_gender">
                <option><?php echo $user_info['user_gender'];?></option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
              </td>
            </tr>
            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="../control/change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></td></tr>

            <tr align="center">
              <td colspan="6">
              <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Update"/>
              </td>
            </tr>
          </table>
        </form>

  </div>
  <div class="col-sm-2">
  </div>
</div>
</body>
</html>
<?php } ?>