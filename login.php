<?php 
include 'functions.php';
 
if(isset($_SESSION['user'])){
	header('location: chat');
	exit;
}

if(!isset($_SESSION['userName'])){
	$_SESSION['userName'] = '';
	$_SESSION['password'] = '';
	$_SESSION['checked'] = '';
}

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

<div class="container login mt-5 pt-3 pb-3">

	<form  class="col-sm-9 m-auto" action="functions" method="post">
		<div class="form-group text-center mb-5">
			<img class="avatar mt-5 mb-3" src="images/chat.png" alt="chat"/>
			<span class="form-description"> Enter your information to sign in. </span>
		</div>
		<div class="input-group mb-4">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input class="form-control" type="text" name="user" value="<?php echo $_SESSION['userName']; ?>" required >
		</div>
		<div class="input-group mb-4">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-lock"></i></span>
			</div>
			<input class="form-control" type="password" name="pass" value="<?php echo $_SESSION['password']; ?>" required >
		</div>
		<div class="form-group custom-control custom-checkbox">
			<input id="logCheck" class="custom-control-input" type="checkbox" name="remember" <?php echo $_SESSION['checked']; ?> >
			<label class="custom-control-label" for="logCheck"> Remember me ?</label>
		</div>
		<div class="col-12 mb-4">
			<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" name="login" value="SIGN IN" >
			<a class="float-right mt-2" href="register"> new member ? </a>
		</div>
	</form>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>

</body>
</html>