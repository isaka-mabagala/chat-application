<?php
include '../functions.php';

if(isset($_SESSION['receiver'])){
	$receiver = $_SESSION['receiver'];
	$sender = $_SESSION['user'];
}

//read message
$chat_id1 = $sender.$receiver;
$chat_id2 = $receiver.$sender;

$state = "SELECT * FROM unread_msg WHERE chat_id= '$chat_id1' OR chat_id= '$chat_id2' ";
$select = $db->query($state);
$row = $select->fetch_assoc();
$chat_id = $row['chat_id'];

$state = "SELECT * FROM unread_msg WHERE chat_id= '$chat_id' AND user_id= '$receiver' ";
$select = $db->query($state);
$row = $select->fetch_assoc();
$id = $row['id'];

$state = "UPDATE unread_msg SET unread= '0' WHERE id= '$id'";
$update = $db->query($state);

//user last seen
$select = "SELECT * FROM users WHERE id= '$receiver'";
$details = $db->query($select);
$row = $details->fetch_assoc();

$timestamp = $row['real_time'];
$time = $lastSeen->_time($timestamp);

$active = '';
if($time == 'online'){
	$active = 'user_active';
}

echo $time;
	
?>

