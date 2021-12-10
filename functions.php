<?php 
session_start();
include 'class.inc.php';
include 'db_connect.php';

if(isset($_POST['login'])){
	$user = strtolower($_POST['user']);
	$password = md5($_POST['pass']);
	
	$check = "SELECT * FROM users WHERE name= '$user' AND password= '$password' ";
	$select = $db->query($check);
	$row = $select->fetch_assoc();
	
	if($select->num_rows == 0){
		header('location: login');
		exit;
	}
	
	if(!empty($_POST['remember'])){
		$_SESSION['userName'] = $user;
		$_SESSION['password'] = $_POST['pass'];
		$_SESSION['checked'] = 'checked';
	}
	else{
		$_SESSION['userName'] = '';
		$_SESSION['password'] = '';
		$_SESSION['checked'] = '';
	}
	
	$_SESSION['user'] = $row['id'];
	
	header('location: chat');
	exit;
}
 
if(isset($_POST['register'])){
	$user = strtolower($_POST['user']);
	$pass1 = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$description = 'hey there! I am using online chat';
	$time = time();
	
	if($pass1 !== $pass2){
		header('location: register');
		exit;
	}
	$pass = md5($pass2);
	
	$check = "SELECT * FROM users";
	$select = $db->query($check);
	
	while($row = $select->fetch_array()){
		if($row['name'] == $user){
			header('location: register');
			exit;
		}
	}
	
	$insert = "INSERT INTO users(name, description, password, time) VALUES('$user', '$description', '$pass', '$time')";
	$select = $db->query($insert);
	
	if($select){
		header('location: login');
		exit;
	}
}

?>