		<div id="content" class="row" style="margin-top:20px">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-4">
						<h2>Connections</h2>
					</div>
					<div class="col-xs-8">
						<br />
						<button class="btn btn-primary" data-toggle="modal" data-target="#addConnection">
							Add Connection
						</button>
					</div>
				</div>
				<div>&nbsp;</div>
					<hr class="chatcolours">						
						<?php

							$key=array_keys($_GET);
   							
   							if ($key[0] == "e1")
   							{
   								echo "<script type='text/javascript'>alert('User Doesn\'t Exist');</script>";
   							}
   							if ($key[0] == "e2")
   							{
   								echo "<script type='text/javascript'>alert('Connection Already Exists');</script>";
   							}
   							if ($key[0] == "e3")
   							{
   								echo "<script type='text/javascript'>alert('You Can\'t Connect To Yourself');</script>";
   							}

							include ('CGI-BIN/connect.php');
							$user = $_SESSION['user'];

							$timestamp = date('Y-m-d H:i:s');
							$sql = "UPDATE users SET last_active = '$timestamp' WHERE username = '$user'";
							$result = $dbh->prepare($sql);
							$result->execute();

							$sql = "SELECT * FROM connections WHERE (user_2 = '".$user."') AND pending = '1'";
							$result = $dbh->prepare($sql);
							$result->execute();

							foreach ($result as $row) {

								if ($row['user_1'] == $user)
								{
									$contact = $row['user_2'];
								}
								else
								{
									$contact = $row['user_1'];
								}

								$sql = "SELECT * FROM users WHERE username = '".$contact."' LIMIT 1";
								$result = $dbh->prepare($sql);
								$result->execute();

								foreach ($result as $row)
								{
									$id = $row['id'];
									$head = $row['head'];
									if (strtotime($row['last_active']) > time()-600)
									{
										$online = true;
									}
									else
									{
										$online = false;
									}
								}




								echo "<div id='".$id."' class='contact'><img class='head' src='img/head-".$head.".png' alt='head' /> ".$contact;
								
								echo "<div class='request'><button class='btn btn-primary' onClick='acceptConnection(".$id.");'>
										Accept
										</button> ";
								echo "<button class='btn btn-primary' onClick='declineConnection(".$id.");'>
										Decline
										</button></div>";
								echo "</div>";
								
							}

							$sql = "SELECT * FROM connections WHERE (user_1 = '".$user."' OR user_2 = '".$user."') AND pending = '0'";
							$result = $dbh->prepare($sql);
							$result->execute();

							foreach ($result as $row) {

								if ($row['user_1'] == $user)
								{
									$contact = $row['user_2'];
								}
								else
								{
									$contact = $row['user_1'];
								}

								$sql = "SELECT * FROM users WHERE username = '".$contact."' LIMIT 1";
								$result = $dbh->prepare($sql);
								$result->execute();

								foreach ($result as $row)
								{
									$id = $row['id'];
									$head = $row['head'];
									if (strtotime($row['last_active']) > time()-600)
									{
										$online = true;
									}
									else
									{
										$online = false;
									}
								}

								if ($online == false)
								{
									$offline_users = $offline_users."<div id='".$id."' class='contact'><img class='head' src='img/head-".$head.".png' alt='head' /> ".$contact."<div class='offline'>&nbsp;</div></div>";
								}
								else if ($online == true) { ?>
									<form id="<?php echo $id;?>-form" action="chat.php" target="_blank" method="post">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
									</form>
								<?php

									$sql = "SELECT * FROM messages WHERE from_user = '".$id."' AND to_user = '".$_SESSION['id']."' LIMIT 1";
									$result = $dbh->prepare($sql);
									$result->execute();
									$count = $result->rowCount();


									echo "<div id='".$id."' class='contact connect'><img class='head' src='img/head-".$head.".png' alt='head' /> ".$contact;
									if ($count > 0) echo " - <img src='../img/message-waiting.png' alt='message waiting' height='20' width='20' /> Message Waiting";
									echo "<div class='online'>&nbsp;</div>";
									echo "</div>";
								}
							}
							echo $offline_users;
						?>

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
						<form role="form" action="CGI-BIN/add-connection.php" method="post">
							<fieldset>
								<h2>Enter Username</h2>
								<hr class="chatcolours">
								<div class="form-group">
									<input type="username" name="username" id="username" class="form-control input-lg" placeholder="Username">
								</div>									
								<div class="notice">									
									<div class="alert alert-danger">
										<a class="close" data-dismiss="alert" href="#">×</a>
										<span class="error"></span>
									</div>								
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
									window.onload = setupRefresh;

									function setupRefresh() {
									  setTimeout("refreshPage();", 20000);
									}
									function refreshPage() {
									   window.location = "/";
									}
								</script>