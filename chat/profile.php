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
<div class="header d-flex pt-4 pb-4 h5">
	<span class="go-back c-pointer"><i class="fas fa-arrow-left"></i></span>
	<div class="font-weight-bold col-10 text-center">
		<span> Profile </span>
	</div>
</div>
<div class="container container-profile mt-4">
	<div class="prfl_img m-auto">
		<div class="avatar">
			<img src="../images/<?php echo $image; ?>" />
		</div>
		<div class="upload-btn">
			<span><i class="fas fa-camera"></i></span>
			<input id="image-upload" type="file" name="image">
		</div>
	</div>
	<div class="details bg-white p-2 mt-4">
		<div class="col-12 mt-4 pb-4">
			<span class="text-128c7e"> Your name </span>
			<div class="d-flex justify-content-between mt-2">
				<span class="font-weight-bold"> <?php echo ucfirst($row['name']); ?> </span>
				<span class="user-edit mt-1 c-pointer" title="Edit"><i class="fas fa-edit"></i></span>
			</div>
			<div class="new-name mt-3">
				<input class="form-control col-sm-5" type="text" name="new-user-name" placeholder="new name">
				<div class="col-sm-5 text-center c-pointer p-2 mt-2" data-update="new-user-name"><i class="fas fa-sync"></i> update </div>
			</div>
		</div>
		<div class="col-12 pb-4">
			<span class="text-128c7e"> Description </span>
			<div class="d-flex justify-content-between mt-3">
				<span class="font-weight-bold"><?php echo ucfirst($row['description']); ?></span>
				<span class="desc-edit c-pointer" title="Edit"><i class="fas fa-edit"></i></span>
			</div>
			<div class="new-desc mt-3">
				<input class="form-control col-sm-5" type="text" name="new-user-desc" placeholder="new description">
				<div class="col-sm-5 text-center c-pointer p-2 mt-2" data-update="new-user-desc"><i class="fas fa-sync"></i> update </div>
			</div>
		</div>
		<div class="col-12 mt-4 pb-4">
			<span class="pass-edit c-pointer"> Change password </span>
			
			<div class="new-pass mt-3">
				<input class="form-control col-sm-5 mt-2" type="password" name="current-user-pass" placeholder="current password">
				<input class="form-control col-sm-5 mt-2" type="password" name="new-user-pass1" placeholder="new password">
				<input class="form-control col-sm-5 mt-2" type="password" name="new-user-pass2" placeholder="confirm">
				<div class="col-sm-5 text-center c-pointer p-2 mt-2" data-update="new-user-pass"><i class="fas fa-sync"></i> update </div>
			</div>
		</div>
	</div>
</div>
