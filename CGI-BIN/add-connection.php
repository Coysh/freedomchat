<?php
	session_start();
	include('connect.php');

	$user_1 = $_SESSION['user'];
	$user_2 = $_POST['username'];

	$user_2 = ucfirst($user_2);
		
	#Check if user connecting too exists
	$sql = "SELECT * FROM users WHERE username=:username LIMIT 1";
	$result = $dbh->prepare($sql);
	$result->execute(array(':username'=>$user_2));
	$count = $result->rowCount();
	if ($count != 1) {
		header("Location: /?e1");
		exit();
	}
		
	if ($user_1 != $user_2) {
		$sql = "SELECT * FROM connections WHERE (user_1 = '".$user_1."' AND user_2 = '".$user_2."') OR (user_1 = '".$user_2."' AND user_2 = '".$user_1."') LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();
		
		#Check if connection already exists
		$count = $result->rowCount();
		if ($count > 0) {
			header("Location: /?e2");
		} else {
			$sql = "INSERT INTO connections VALUES ('', '$user_1', '$user_2', '1')";
			$result = $dbh->prepare($sql);
			$result->execute();

			header("Location: /");
		}
	}
	else
	{	
		#You Can't Send To Yourself
		header("Location: /?e3");
	}


?>