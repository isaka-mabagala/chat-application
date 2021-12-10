<?php
include 'chat_data_update.php';

if(!isset($_SESSION['user'])){
	header('location: ../login');
	exit;
}
	
?>

<!DOCTYPE html>

<html>
<head>
	<title> StarWhatsApp </title>
<meta charset="utf-8" />
<meta name="description" content="Online chat system" />
<meta name="generator" content="Isaka - Website and System developer" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/theme.css" />
<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<div class="chat-container">
		<div class="d-flex justify-content-between">
			<div class="side-container">
				<?php include 'nav.php'; ?>
				<?php include 'online_users.php'; ?>
			</div>
			
			<div class="contents container-fluid overflow-y-auto">
				<?php
					if(!isset($_GET['p'])){
						 //code here
					}
					
					if(isset($_GET['p'])){
						$name = $_GET['p'];
						
						$select = "SELECT * FROM pages WHERE name= '$name'";
						$query = $db->query($select);
						$row = $query->fetch_assoc();
						
						include ''.$row['file'].'.php';
					}
				
				?>
			</div>
		</div>
	</div>	
	
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/image_upload.js"></script>
<script src="../js/css.js"></script>

</body>
</html>