<?php
	include('connect.php');

	$user = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword)
	{
		$sql = "SELECT * FROM users WHERE username = '".$user."' LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();
		$count = $result->rowCount();

		if ($count > 0)
		{
			header("Location: ../index.php?error=2");
		}
		else
		{
			//$options = {'cost' => 12};
			$epass = sha1($password);

			$sql = "INSERT INTO users VALUES ('', '$user', '$epass')";
			$result = $dbh->prepare($sql);
			$result->execute();

			session_start();
			$_SESSION['user'] = $user;

			header("Location: ../messages.php");

		}

	}
	else
	{
		header("Location: ../index.php?error=1");
	}


?>