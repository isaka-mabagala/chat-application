<?php

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

//get user details
$select = "SELECT * FROM users WHERE id= '$receiver'";
$details = $db->query($select);
$row = $details->fetch_assoc();

if(empty($row['avatar'])){
	$image = 'avatar.png';
}
else{
	$image = 'uploads/'.$row['avatar'];
}

$timestamp = $row['real_time'];
$time = $lastSeen->_time($timestamp);

$active = '';
if($time == 'online'){
	$active = 'user_active';
}
	
?>

<div class="header text-fffafa">
	<div class="mt-4 mb-3">
		<span class="go-back c-pointer p-1"><i class="fas fa-arrow-left"></i></span>
		<span class="font-weight-bold ml-3"> User info </span>
	</div>
</div>
<div class="bg-white">
	<div class="w-100 text-center">
		<img class="avatar avatar-lg mt-4 mb-3" src="../images/<?php echo $image; ?>" alt="user" />
	</div>
	<div class="w-100 ml-4 mt-4 pb-4 d-flex flex-column">
		<span class="font-weight-bold mb-2"><?php echo ucfirst($row['name']); ?></span>
		<span id="last-seen" class="text-929fa6"></span>
	</div>
</div>
<div class="bg-white">
	<div class="d-flex flex-column w-100 ml-4 mt-3 pb-4 pt-4">
		<span class="text-128c7e mb-2"> Description </span>
		<span class="font-weight-bold"><?php echo ucfirst($row['description']); ?></span>
	</div>
</div>
<div class="bg-white">
	<div class="d-flex flex-column w-100 ml-4 mt-3 pb-4 pt-4">
		<span class="mb-2"><i class="fas fa-ban text-128c7e"></i>
			<span class="font-weight-bold"> Block User </span>
		</span>
	</div>
</div>
