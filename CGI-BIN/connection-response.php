<?php
	session_start();
	$user = $_SESSION['user'];
	include 'connect.php';

	$key=array_keys($_GET);

	$response = $key[0];
	$user_id = $key[1];

	$sql = "SELECT * FROM users WHERE id = '".$user_id."' LIMIT 1";
	$result = $dbh->prepare($sql);
	$result->execute();

	foreach ($result as $row)
	{
		$user_name = $row['username'];
	}

	if ($response == 1)
	{
		$sql = "UPDATE connections SET pending = '0' WHERE user_1 = '".$user_name."' AND user_2 = '".$user."'";
		$result = $dbh->prepare($sql);
		$result->execute();
	}
	else
	{
		$sql = "DELETE FROM connections WHERE user_1 = '".$user_name."' AND user_2 = '".$user."'";
		$result = $dbh->prepare($sql);
		$result->execute();
	}

?>