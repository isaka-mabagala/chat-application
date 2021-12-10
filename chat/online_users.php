<?php

$user_id = $_SESSION['user'];

//query
$select = "SELECT * FROM users WHERE NOT id= '$user_id' ORDER BY name ASC";
$details = $db->query($select);
	
?>

<div class="panel-new-chat bg-white h-100 w-100">
	<div class="header">
		<div class="d-flex justify-content-between mt-3">
			<span class="c-pointer p-2 new-chat-btn"><i class="fas fa-arrow-left"></i></span>
			<span class="w-100 text-center font-weight-bold"> New chat </span>
		</div>
	</div>
	<div class="">
<?php
	while($row = $details->fetch_assoc()){
		if(empty($row['avatar'])){
			$image = 'avatar.png';
		}
		else{
			$image = 'uploads/'.$row['avatar'];
		}
		
		$timestamp = $row['real_time'];
		$time = $lastSeen->_time($timestamp);
		
		if($time == 'online'){
			
?>
<a id="user_<?php echo $row['id']; ?>" href="?p=sms&u=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action clearfix">
	<div class="avatar small float-left">
		<img src="../images/<?php echo $image; ?>" />
	</div>
	<div class="mt-3 d-flex justify-content-between">
		<span class="font-weight-bold"><?php echo ucfirst($row['name']); ?></span>
		<span class="mt-2 user_active"></span>
	</div>
</a>
<?php } } ?>
	</div>
</div>
