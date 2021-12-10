$(document).ready(function(){
	
	$(document).on('change', '#image-upload', function(){
		var property = document.getElementById('image-upload').files[0];
		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();
		var image_size = property.size;
		
		if(jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) != -1){
			
			if(image_size < 2000000){
				
				var form_data = new FormData();
				form_data.append("file", property);
				
				
			}
			else{
				alert('Image size is very big');
				window.location.reload();
			}
		}
		else{
			alert('Invalid image file');
			window.location.reload();
		}
		
	});
});