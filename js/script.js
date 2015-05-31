$('.face-grid input:radio').addClass('head_hidden');
$('.face-grid label').click(function() {
	$('label').addClass('head-not-selected');
	$(this).removeClass('head-not-selected');
	$('label').removeClass('head-selected');
	$(this).addClass('head-selected');
});

function checkPassword() {
    var password = $("input#password").val();
    var confirmPassword = $("input#cpassword").val();
	
	console.log('password:'+password+' cpassword:'+confirmPassword);
    if (password != confirmPassword) {
		$(".notice").show();
	} else {
		$(".notice").hide();
	}
}
$("input#cpassword").keyup(checkPassword);

function errorAddConnection(msg) {	
	$('.notice').show();
	$('.notice').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">×</a><span class="error">'+msg+'</span></div>');	
}

$("#addConnectionSubmit").click(function() {
	var username = $("input#username").val();
	if (username == "") {
		$(".error").html('Enter a name');
		return false;
	}
	$.ajax({
		type: "POST",
		url: "CGI-BIN/add-connection.php",
		data: 'username='+username,
		success: function(response) {
			console.log(response);
			if (response == "true") {
				$(".notice").hide();
				$('#addConnection').modal('hide');
				location.reload();
			} else if (response == "Error1") {
				errorAddConnection('User does not exist');
			} else if (response == "Error2") {
				errorAddConnection('Connection already exists');
			} else if (response == "Error3") {
				errorAddConnection('You can\'t connect with yourself');
			} else {
				errorAddConnection('An error occurred'+response);
			}
		}
	});
	return false;
});

function acceptConnection(id) {
	$('#'+id).remove();
	$("#response").load('../CGI-BIN/connection-response.php?1&'+id, function() {
	location.reload();
	});
}

function declineConnection(id) {
	$("#response").load('../CGI-BIN/connection-response.php?0&'+id);
	$('#'+id).remove();
}

$(document).ready(function() {
   $(".connect").click(function(event) {
		var user_id = event.target.id;
		$('form#'+user_id+'-form').submit();
    });
	
	$('.connect').popover({
		title: 'Connect With',
		trigger: 'hover',
		placement: 'top',
		html: false,
		content: 'Click to connect'
	});
});