<?php

if(isset($_GET['p']) == 'sms'){
	//set session
	$_SESSION['receiver'] = $_GET['u'];
}

if(!isset($_GET['p'])){
	unset($_SESSION['receiver']);
}
if(isset($_SESSION['receiver'])){
	$receiver = $_SESSION['receiver'];
	$sender = $_SESSION['user'];
}

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
	
?>

<div class="container chat-box">
	<div class="chat-hdr bg-dark text-white sticky-top d-flex justify-content-between">
		<div class="d-flex">
			<span class="go-back c-pointer ml-2 mt-2 p-2" href="#"><i class="fas fa-arrow-left"></i></span>
			<img class="avatar ml-3" src="../images/<?php echo $image; ?>" alt="user" />
		</div>
		<div class="w-100 ml-4 d-flex flex-column">
			<span class="font-weight-bold"><?php echo ucfirst($row['name']); ?></span>
			<span id="last-seen" class="text-fffafa"> </span>
		</div>
		<div class="w-25 pr-2 d-flex justify-content-end">
		<div class="dropdown">
			<span title="options" class="c-pointer text-white p-2" data-toggle="dropdown"><i class="fas fa-ellipsis-v fa-lg mt-2"></i></span>
			
			<ul class="dropdown-menu dropdown-menu-right">
				<a href="?p=user_info"><li>User info</li></a>
				<a href="#"><li>Clear chat</li></a>
			</ul>
		</div>
		</div>
	</div>
	
	<div id="msg-chat" class="chatlogs overflow-y-auto"> </div>
	
	<div class="chat-form mt-3 ml-2 mr-2 pb-3 pt-3 d-flex justify-content-start">
		<textarea id="msg" class="w-100"> </textarea>
		<button id="msg-send" type="button" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
	</div>
</div>
