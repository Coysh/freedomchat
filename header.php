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
	<link href="/css/chat.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/tripledes.js"></script>
	<script src="/js/script.js"></script>
	<script src="/js/chat.js"></script>
	
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

			if ($user != "") {				
				echo '
				<ul class="nav nav-pills pull-right">
				<li class="active"><a href="logout.php">Log Out</a></li>
				</ul>';
			}
			?>
			<a href="/"><img class="logo" src="img/logo.png" height="50px" alt="Freedom Chat" /></a>
		</div>