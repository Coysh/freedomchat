		<div class="row" style="margin-top:20px">
			<div class="col-xs-12">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active in" id="login">
						<h2>Connections</h2>
						<div id="add-contact">
							<ul class="nav nav-pills pull-right">
								<li><a href="#">Add Connection</a></li>
							</ul>
						</div>
						<div>&nbsp;</div>
							<hr class="chatcolours">
								
								<?php
									include ('CGI-BIN/connect.php');
									$user = $_SESSION['user'];

									$timestamp = date('Y-m-d H:i:s');
									$sql = "UPDATE users SET last_active = '$timestamp' WHERE username = '$user'";
									$result = $dbh->prepare($sql);
									$result->execute();

									$sql = "SELECT * FROM connections WHERE user_1 = '".$user."' OR user_2 = '".$user."'";
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
											$head = $row['head'];
										}

										echo "<div class='contact'><img class='head' src='img/head-".$head.".png' alt='head' /> ".$contact."</div>";
									}

								?>

							<hr class="chatcolours">
					</div>
				</div>				
			</div>
		</div>
