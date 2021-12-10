(function($){
	$(document).ready(function(){
		
		$(".go-back").click(function(){
			window.history.back();
		});
		
		$(".new-chat-btn").click(function(){
			$(".panel-new-chat").toggleClass('view');
		});
		
		//user name update
		$(".user-edit").click(function(){
			$(".new-name").toggleClass('show');
			
			$('[data-update="new-user-name"]').click(function(){
				
				var name = $('[name="new-user-name"]').val();
				$.ajax({
					url : 'chat_data_update',
					method : 'post',
					data : {updt_user:name},
					success : function(){
						window.location.reload();
					}
				});
			});
		});
		
		//user description update
		$(".desc-edit").click(function(){
			$(".new-desc").toggleClass('show');
			
			$('[data-update="new-user-desc"]').click(function(){
				
				var desc = $('[name="new-user-desc"]').val();
				$.ajax({
					url : 'chat_data_update',
					method : 'post',
					data : {updt_desc:desc},
					success : function(){
						window.location.reload();
					}
				});
			});
		});
		
		//user password update
		$(".pass-edit").click(function(){
			$(".new-pass").toggleClass('show');
			
			$('[data-update="new-user-pass"').click(function(){
				
				var pass = $('[name="current-user-pass"]').val();
				var pass1 = $('[name="new-user-pass1"]').val();
				var pass2 = $('[name="new-user-pass2"]').val();
				
				$.ajax({
					url : 'chat_data_update',
					method : 'post',
					data : {updt_pass:pass, pass1:pass1, pass2:pass2},
					success : function(){
						window.location.reload();
					}
				});
			});
		});
		
		//current time script
		var realTime = setInterval(function(){
			$.ajax({
				url: '../real_time',
			});

		},2000);
		
		var current_updates = setInterval(function(){
			
			$("#chat-list").load("chats");
			$("#last-seen").load("last_seen");
			$("#msg-chat").load("msg");
		},500);
		
		$("#msg-send").click(function(){
			
			var message = $("#msg").val();
			
			if($.trim(message) != ''){
				$.ajax({
					
					url: 'send_sms',
					method: 'post',
					data: {message:message},
					success: function(){
						
					}
				});
				
				$("#msg").val("");
			}
		});
		
		
	});
	
	
})(jQuery);

