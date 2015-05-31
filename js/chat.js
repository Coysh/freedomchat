function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}

$(function() { //shorthand document.ready function
    $('#send').on('submit', function(e) {
        e.preventDefault();  //prevent form from submitting
		var to_user = $('#to_user').val();
		
		var key = $(".key").val();
		var message = $(".message").val();
		var encrypted = CryptoJS.TripleDES.encrypt(message, key);
		
		$.ajax({
			type: "POST",
			url: "CGI-BIN/send-message.php",
			data: 'to_user='+to_user+'&message='+encrypted,
			success: function(response) {
				//console.log(response);
				if (response == "success") {
					$("#chat-container ul").append('<li class="right clearfix"><span class="chat-img pull-right"><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="chat-header"><strong class="pull-right primary-font">Me</strong></div><p style="float: right;">'+message+'</p></div></li>');
				}
				
				$('.message').val('');
				
				//Scroll to bottom
				var chatContainer = $('#chat-container');
				var height = chatContainer[0].scrollHeight;
				chatContainer.scrollTop(height);
			}
		});
		
    });
});

//Poll for messages
function getMessages(to_user,from_user,user_name) {
	var key = $('.key').val();
	if (key != '') {
		$.ajax({
			type: "POST",
			url: "CGI-BIN/get-message.php",
			data: 'to_user='+to_user+'&from_user='+from_user,
			success: function(response) {
				var encrypted  = response;
				var decrypted = CryptoJS.TripleDES.decrypt(encrypted, key);
				var message = decrypted.toString(CryptoJS.enc.Utf8);
				if (message != '') {
					$("#chat-container ul").append('<li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />		</span><div class="chat-body clearfix"><div class="chat-header"><strong class="primary-font">'+user_name+'</strong></div><p>'+message+'</p></div></li>');
				}
				
				//Scroll to bottom
				var chatContainer = $('#chat-container');
				var height = chatContainer[0].scrollHeight;
				chatContainer.scrollTop(height);
			}
		});
	}
}