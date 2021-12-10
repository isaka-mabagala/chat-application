<?php
include '../functions.php';

if(isset($_SESSION['receiver'])){
	$receiver = $_SESSION['receiver'];
	$sender = $_SESSION['user'];
}

$select = "SELECT * FROM message WHERE chat_id= '$sender$receiver' OR chat_id= '$receiver$sender'";
$messages = $db->query($select);
	
?>

<?php
while($row=$messages->fetch_assoc()){

$class = 'chat-receiver d-flex flex-row';

if($row['from_user'] == $sender){
	$class = 'chat-sender d-flex flex-row-reverse';
}

$timestamp = $row['time'];
$time = $date->printDate('g:i a',$timestamp);
?>
<div class="chat-msg <?php echo $class; ?>">
	<span class="msg d-flex flex-column"><?php echo $row['message']; ?>
		<small><?php echo $time; ?></small>
	</span>
	<small> </small>
</div>

<?php } ?>
