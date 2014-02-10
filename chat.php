<?php
include 'header.php';
include 'CGI-BIN/connect.php';
$user = $_SESSION['user'];
$user_id = $_SESSION['id'];

$chat_user_id = $_POST['id'];

$sql = "SELECT * FROM users WHERE id = '".$chat_user_id."' LIMIT 1";
$result = $dbh->prepare($sql);
$result->execute();

foreach ($result as $row) {
	$user_name = $row['username'];
}
?>		
	<div class="row" style="margin-top:20px">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<h2>Chat with <?php echo $user_name; ?></h2>
				</div>
			</div>
			<hr class="chatcolours">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body" id="chat-container">
						<ul class="chat">
							
						</ul>
					</div>
					<div class="panel-footer">
						<form action="#" method="post" id="send">
							<div class="row">
								<input type="hidden" id="to_user" value="<?php echo $chat_user_id; ?>" />
								<div class="col-xs-4">
									<input id="btn-input" type="password" class="form-control input-sm key" name="key" placeholder="Please enter secret key..." />
								</div>
								<div class="col-xs-7">
									<input id="btn-input" type="text" class="form-control input-sm message" name="message" placeholder="Type your message here..." />
								</div>
								<div class="col-xs-1">
									<input class="btn btn-warning btn-sm send" id="btn-chat" type="submit" name="submit" value="Send" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<hr class="chatcolours">			
		</div>
	</div>
	<div class="modal fade" id="addConnection" tabindex="-1" role="dialog" aria-labelledby="addConnectionTitle" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addConnectionLabel">Add Connection</h4>
				</div>
				<div class="modal-body">
					<form role="form" action="#" method="post">
						<fieldset>
							<h2>Enter Name</h2>
							<hr class="chatcolours">
							<div class="form-group">
								<input type="username" name="username" id="username" class="form-control input-lg" placeholder="Username">
							</div>
							<hr class="chatcolours">
							<input type="submit" id="addConnectionSubmit" name="add" class="btn btn-lg btn-success btn-block" value="Add">
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div id="response"></div>
	<script type="text/javascript">
	setInterval(function(){
		//To user, From user
		getMessages(<?php echo $user_id; ?>,<?php echo $chat_user_id; ?>,'<?php echo $user_name; ?>')
	},500);
	</script>

<?php
include 'footer.php';
?>