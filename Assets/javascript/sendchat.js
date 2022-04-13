$(function() {
	$('#message').click(function() {
		document.newMessage.message.value = "";
	});
	
	$('#send').click(function(){
		var username = $('#username').val();
		var message = $('#message').val();
		var recipient = $('#recipient').val();
		
		if (message == "" || message == "Bericht" || recipient == "" || recipient == "--Verzend bericht naar--") {
			return false;
		}
		
		var dataString = 'username=' + username + '&message=' + message + '&recipient=' + recipient;
		
		$.ajax({
			type: "POST",
			url: "send_save_chat.php",
			data: dataString,
			success: function() {
				document.newMessage.textb.value = "";
			}
		});
	});
});