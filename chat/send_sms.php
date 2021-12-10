<?php
include '../functions.php';

if(isset($_POST['message'])){
	$sender = $_SESSION['user'];
	$receiver = $_SESSION['receiver'];
	$message = $_POST['message'];
	$time = time();
	$chat_id = $sender.$receiver;
	
	$check = "SELECT * FROM message WHERE chat_id= '$sender$receiver' OR chat_id= '$receiver$sender'";
	$query = $db->query($check);
	$row_check = $query->fetch_assoc();
	
	if($query->num_rows != 0){
		$chat_id = $row_check['chat_id'];
	}
	
	//send message
	$state = "INSERT INTO message(chat_id, from_user, to_user, message, time) VALUES('$chat_id', '$sender', '$receiver', '$message', '$time')";
	$query = $db->query($state);
	
	//set unread message
	$state = "SELECT * FROM unread_msg WHERE chat_id= '$chat_id' AND user_id= '$sender'";
	$query = $db->query($state);
	$row_check = $query->fetch_assoc();
	
	if($query->num_rows != 0){
		$unread = $row_check['unread'] + 1;
		$state = "UPDATE unread_msg SET unread= '$unread' WHERE chat_id= '$chat_id' AND user_id= '$sender'";
		$update = $db->query($state);
		exit;
	}
	
	$state = "INSERT INTO unread_msg(chat_id, user_id, unread) VALUES('$chat_id', '$sender', '1')";
	$query = $db->query($state);
	exit;
	
}
	
?>
