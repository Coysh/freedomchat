<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Freedomchat</title>
	<link rel="icon" href="img/eagle.ico" type="image/x-icon"/>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/css/custom.css" rel="stylesheet">
	<link href="/css/contacts.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

	<div class="container">
		<div class="header">
			<?php
			$user = $_SESSION['user'];

			if ($user != "")
			{ 
				echo '
				<ul class="nav nav-pills pull-right">
				<li class="active"><a href="logout.php">Log Out</a></li>
				</ul>';
			}

			include 'CGI-BIN/connect.php';

			$sql = "SELECT * FROM users WHERE username = '".$_SESSION['user']."' LIMIT 1";
			$result = $dbh->prepare($sql);
			$result->execute();

			foreach ($result as $row)
			{
				$curr_user_id = $row['id'];
			}

			?>
			<a href="/"><img class="logo" src="img/logo.png" height="50px" alt="Freedom Chat" /></a>
		</div>
		
		
				<div class="row" style="margin-top:20px">
			<div class="col-xs-12">
				<div id="myTabContent" class="tab-content">

					
				<?php
					$user_1 = $curr_user_id;

					if ($_POST['id'])
					{
						$_SESSION['hs_id'] = $_POST['id'];
					}

					if ($_SESSION['hs_id'] != "")
					{
						$user_2 = $_SESSION['hs_id'];
					}

					$password = $_POST['password'];

					$sql = "SELECT * FROM handshake WHERE (user_1 = '".$user_1."' AND user_2 = '".$user_2."') OR (user_1 = '".$user_2."' AND user_2 = '".$user_1."') LIMIT 2";
					$result = $dbh->prepare($sql);
					$result->execute();
					
					#Check if connection already exists
					$count = $result->rowCount();


					$sql = "SELECT * FROM handshake WHERE (user_1 = '".$user_1."' AND user_2 = '".$user_2."') LIMIT 1";
					$result = $dbh->prepare($sql);
					$result->execute();
						
					#Check if connection already exists
					$pending = $result->rowCount();

					if ($count == 2)
					{

						$i = 0;
						foreach ($result as $row) {
							$array[$i] = $row['code_1'];
							$i = $i + 1;
						}

						if ($array[0] == $array[1])
						{
							echo "Confirmed";
						}

					}
					else if ($pending == 1)
					{ ?>

						<div class="tab-pane active in" id="login">
						<div class="row">
							<div class="col-xs-4">
								<h2>Waiting For Partner</h2>
							</div>
						</div>
						<div>&nbsp;</div>
							<hr class="chatcolours">
								
								<div class="loader-box">
								&nbsp;
								</div>

								<script type="text/javascript">
									window.onload = setupRefresh;

									function setupRefresh() {
									  setTimeout("refreshPage();", 2000);
									}
									function refreshPage() {
									   window.location = location.href;
									}
								</script>

							<hr class="chatcolours">
					</div>

					<?php }
					else if ($_POST['psubmit'])
					{

						$sql = "SELECT * FROM handshake WHERE (user_1 = '".$user_1."' AND user_2 = '".$user_2."') LIMIT 1";
						$result = $dbh->prepare($sql);
						$result->execute();
						
						#Check if connection already exists
						$count = $result->rowCount();

						if ($count == 1)
						{ ?>

							<div class="tab-pane active in" id="login">
						<div class="row">
							<div class="col-xs-4">
								<h2>Waiting For Partner</h2>
							</div>
						</div>
						<div>&nbsp;</div>
							<hr class="chatcolours">
								
								<div class="loader-box">
								&nbsp;
								</div>

								<script type="text/javascript">
									window.onload = setupRefresh;

									function setupRefresh() {
									  setTimeout("refreshPage();", 2000);
									}
									function refreshPage() {
									   window.location = location.href;
									}
								</script>

							<hr class="chatcolours">
					</div>


						<?php }
						else
						{
							$sql = "INSERT INTO handshake VALUES ('', '".$user_1."', '".$user_2."', '".$password."', '0')";
							$result = $dbh->prepare($sql);
							$result->execute();

							?>

								<div class="tab-pane active in" id="login">
						<div class="row">
							<div class="col-xs-4">
								<h2>Waiting For Partner</h2>
							</div>
						</div>
						<div>&nbsp;</div>
							<hr class="chatcolours">
								
								<div class="loader-box">
								&nbsp;
								</div>

								<script type="text/javascript">
									window.onload = setupRefresh;

									function setupRefresh() {
									  setTimeout("refreshPage();", 2000);
									}
									function refreshPage() {
									   window.location = location.href;
									}
								</script>

							<hr class="chatcolours">
					</div>

					<?php } 

					} else {
					?>


					

						<div class="tab-pane active in" id="login">
						<div class="row">
							<div class="col-xs-4">
								<h2>Enter Chat Password</h2>
							</div>
						</div>
						<div>&nbsp;</div>
							<hr class="chatcolours">
								
								<div id="message-box">

								</div>
								<div id="message-form">
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" />
									<input type="password" name="password" />
									<input name="psubmit" type="submit" value="Send" />
								</form>
								</div>

							<hr class="chatcolours">
					</div>

					<?php } ?>


				</div>				
			</div>
		</div>
		<div id="response"></div>

		<div class="footer">
			<p>A <a href="#" target="_blank">Cardiff University Makespace 2014</a> project by <a href="http://www.timcoysh.co.uk/" target="_blank">Tim Coysh</a>, <a href="http://www.brenz.co.uk/" target="_blank">Brendan Warren</a> and <a href="#" target="_blank">Remi Stevens</a></p>
		</div>

	</div> <!-- /container -->


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>
