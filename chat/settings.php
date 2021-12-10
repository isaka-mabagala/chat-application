	
<form method="post" action="functions" enctype="multipart/form-data">
	<div class="avatar m-auto">
		<img id="image-view" src="../images/<?php echo $image; ?>" />
	</div>
	<div class="form-group mt-4">
		<div class="upload-btn">
			<button class="form-control btn btn-primary btn-sm"> Choose image </button>
			<input id="image-upload" type="file" name="image" >
		</div>
		<div class="mt-2">
			<input class="btn btn-success btn-sm" type="submit" name="updt-avatar" value="Upload image" >
			<input class="btn btn-success btn-sm" type="submit" name="remv-avatar" value="Remove image" >
		</div>
	</div>
</form>
	