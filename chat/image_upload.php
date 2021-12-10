<?php
include '../functions.php';

//profile upload
$user_id = $_SESSION['user'];

if($_FILES["file"]["name"] != ''){
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	$newfilename = date('Ymd_His'). '.' . $extension;
	$target = "../images/uploads/".$newfilename;
	
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
		$state = "UPDATE users SET avatar= '$newfilename' WHERE id= '$user_id' ";
		$upload = $db->query($state);
	}
}

?>
