<?php
include '../functions.php';

$user_id = $_SESSION['user'];

//query
$select = "SELECT chat_id FROM message WHERE from_user= '$user_id' || to_user= '$user_id' GROUP BY chat_id ORDER BY time ASC";
$details = $db->query($select);
	
?>

<?php
	$chat_id = array();
	while($rows = $details->fetch_assoc()){
		$chat_id[] = $rows;
	}
	foreach($chat_id as $chat_id){
		
		//select max chat_id
		$state = "SELECT MAX(id) FROM message WHERE chat_id= '".$chat_id['chat_id']."'";
		$select = $db->query($state);
		$max_id = $select->fetch_assoc();
		
		//select last message
		$state = "SELECT * FROM message WHERE id= ".$max_id['MAX(id)']."";
		$select = $db->query($state);
		$row = $select->fetch_assoc();
		
		//select user
		if($row["from_user"] != $user_id){
			$id = $row["from_user"];
		}
		if($row["to_user"] != $user_id){
			$id = $row["to_user"];
		}
		$state = "SELECT * FROM users WHERE id= '$id'";
		$select = $db->query($state);
		$user = $select->fetch_assoc();
		
		//select unread
		$state = "SELECT unread FROM unread_msg WHERE chat_id= '".$row['chat_id']."' AND user_id= '$id'";
		$select = $db->query($state);
		$unread = $select->fetch_assoc();
		
		$count = '';
		$class = '';
		if($unread['unread'] > 0){
			$count = $unread['unread'];
			$class = 'badge badge-primary';
		}
		
		//variable settings
		if(empty($user['avatar'])){
			$image = 'avatar.png';
		}
		else{
			$image = 'uploads/'.$user['avatar'];
		}
		
		$message = $row["message"];
		
		if(strlen($message) > 18){
			$message = substr($message, 0, 18).'...';
		}
		
		$timestamp = $row['time'];
		$time = $date->chatTime($timestamp);
		
?>
<a id="user_<?php echo $user['id']; ?>" href="?p=sms&u=<?php echo $user['id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
	<div class="avatar small float-left">
		<img src="../images/<?php echo $image; ?>" />
	</div>
	<div class="overflow-hide">
		<div class="d-flex justify-content-between">
			<h6 class="mb-1 font-weight-bold"><?php echo ucfirst($user['name']); ?></h6>
		  <small><?php echo $time; ?></small>
		</div>
		<div class="d-flex justify-content-between">
			<p class="mb-1 text-128c7e"><?php echo $message; ?></p>
			<small class="<?php echo $class; ?>"><?php echo $count; ?></small>
		</div>
	</div>
</a>

<?php } ?>
