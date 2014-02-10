<?php

	include('connect.php');

	$user = $_POST['username'];
	$password = $_POST['password'];

	$epass = sha1($password);

		$sql = "SELECT * FROM users WHERE username = '".$user."' AND password = '".$epass."' LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();
		$count = $result->rowCount();

		if ($count < 1)
		{
			header("Location: ../index.php?error=3");
		}
		else
		{
			session_start();
			$_SESSION['user'] = $user;
			header("Location: ../messages.php");
		}

?>