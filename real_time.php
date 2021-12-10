<?php 
include 'functions.php';

if(!isset($_SESSION['user'])){
	header('location: login');
	exit;
}

if(isset($_SESSION['user'])){
	$user_id = $_SESSION['user'];
	
	$now = time();
	$db->query("UPDATE users SET real_time= '$now' WHERE id= '$user_id'");
}

?>