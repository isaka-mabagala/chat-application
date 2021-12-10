<?php 
include '../functions.php';

$user_id = $_SESSION['user'];

//description update
if(isset($_POST['updt_desc'])){
	$desc = $_POST['updt_desc'];
	
	if(!preg_match("/[a-z]/i", $desc)){
		header('location: ../chat?p=profile-update');
		exit;
	}
	
	$update = "UPDATE users SET description= '$desc' WHERE id= '$user_id'";
	$query = $db->query($update);
	
	header('location: ../chat?p=profile-update');
	exit;
}

//password update
if(isset($_POST['updt_pass'])){
	$current_pass = md5($_POST['updt_pass']);
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	
	$state = "SELECT password FROM users WHERE id= '$user_id'";
	$query = $db->query($state);
	$row = $query->fetch_assoc();
	$user_pass = $row['password'];
	
	if($current_pass != $user_pass){
		
		header('location: login');
		exit;
	}
	
	if($pass1 !== $pass2){
		header('location: ../chat?p=profile-update');
		exit;
	}
	
	$pass = md5($pass2);
	
	$update = "UPDATE users SET password= '$pass' WHERE id= '$user_id'";
	$query = $db->query($update);
	
	header('location: ../chat?p=profile-update');
	exit;
}

//user name update
if(isset($_POST['updt_user'])){
	$name = strtolower($_POST['updt_user']);
	
	$select = "SELECT name FROM users WHERE NOT id= '$user_id'";
	$query = $db->query($select);
	
	while($row = $query->fetch_assoc()){
		if($row['name'] == $name){
			
			header('location: ../chat?p=profile-update');
			exit;
		}
	}
	
	$update = "UPDATE users SET name= '$name' WHERE id= '$user_id'";
	$query = $db->query($update);
	
	header('location: ../chat?p=profile-update');
	exit;
}

?>