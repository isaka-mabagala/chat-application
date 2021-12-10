<?php

$select = "SELECT * FROM users WHERE id= '$user_id'";
$details = $db->query($select);
$row = $details->fetch_assoc();

if(empty($row['avatar'])){
	$image = 'avatar.png';
}
else{
	$image = 'uploads/'.$row['avatar'];
}
	
?>

<div id="user" class="container message">
	<div class="header chat-hdr d-flex justify-content-between">
		<div class="avatar small">
			<img src="../images/<?php echo $image; ?>" />
		</div>
		<div>
			<img class="icon c-pointer mr-3 new-chat-btn" src="../images/new chat.png" />
			<span class="dropdown">
				<span class="c-pointer mt-2 p-2" data-toggle="dropdown" title="menu"><i class="fas fa-ellipsis-v fa-lg mt-2"></i></span>
				
				<ul class="dropdown-menu dropdown-menu-right">
					<a href="?p=profile"><li>Profile</li></a>
					<a href="logout"><li>Log out</li></a>
				</ul>
			</span>
		</div>
	</div>
	
	<div id="chat-list" class="bg-white mt-1 chat-list list-group overflow-y-auto"> </div>
	
</div>
