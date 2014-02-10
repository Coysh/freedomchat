<?php
	session_start();
	include('connect.php');
	include ('functions.php');

	$user = $_SESSION['user'];

	$to_user = $_POST['to_user'];
	$from_user = $_SESSION['id'];

	$message = checkInput($_POST['message']);

	if ($to_user != $from_user) {
		$sql = "INSERT INTO messages VALUES ('', '$from_user', '$to_user', '$message')";
		$result = $dbh->prepare($sql);
		$result->execute();
	}

	$timestamp = date('Y-m-d H:i:s');
	$sql = "UPDATE users SET 'timestamp' = '$timestamp' WHERE username = '$user'";
	$result = $dbh->prepare($sql);
	$result->execute();
	
	echo "success";

?>