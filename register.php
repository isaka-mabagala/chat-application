<?php 
include 'functions.php';
?>

<!DOCTYPE html>

<html>
<head>
	<title> Online Chat </title>
<meta charset="utf-8" />
<meta name="description" content="Online chat system" />
<meta name="generator" content="Isaka - Website and System developer" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/fontawesome/fontawesome-all.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<div class="container register mt-5 pt-3 pb-3">
	<form  class="col-sm-9 m-auto" action="functions" method="post">
		<div class="form-group text-center mb-5">
			<img class="avatar mt-5 mb-3" src="images/chat.png" alt="chat"/>
			<span class="form-description"> Sign up for free. </span>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="user" placeholder="User name" required >
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="pass" placeholder="Password" required >
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="pass2" placeholder="Confirm password" required >
		</div>
		<div class="col-12 mb-4">
			<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" name="register" value="SIGN UP" >
			<a class="float-right mt-2" href="login"> Alredy member ? </a>
		</div>
	</form>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>

</body>
</html>