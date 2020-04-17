<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create new Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
<div class="col-md-4"></div>
<div class="signin-form container col-md-4">
    <form action="" method="post">
		<div class="form-header">
			<h2 class="text-center">Create New Password</h2>
			<h3 class="text-center">-QuoRating-</h3>
		</div>
		<div class="form-group">
			<label>Enter Password</label>
        	<input type="password" class="form-control" placeholder="Password" name="pass1" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="pass2" autocomplete="off" required="required">
        </div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
		</div>
    </form>


<?php 
session_start();

include("../model/queries.php"); 



	if(isset($_POST['change'])){
		
		$user = $_SESSION['user_name'];
	    $pass1 = $_POST['pass1'];
	    $pass2 = $_POST['pass2'];

	    if($pass1 != $pass2){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Your new password did't match with each other</strong> 
	          </div>
	        ";
	    }
	    if($pass1 < 8 AND $pass2 < 8){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Use at least 8 characters</strong> 
	          </div>
	        ";
	    }
	    if($pass1 == $pass2){
			$q = new Queries();
			$sql="UPDATE users SET user_pass='$pass1' WHERE user_email='$user_name'";
			$params = array($user_name, $pass1, $user_email, $user_gender);
    		$result = $q->query($sql, $params);
            session_destroy();
            echo"
            	<script>alert('Go ahead and signin')</script>
            	<script>window.open('../signin.php','_self')</script>
            ";
        }
	}
?>
</div>
</body>
</html>