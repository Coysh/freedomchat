<?php
	session_start();
	include('connect.php');
	include ('functions.php');

	$to_user = $_POST['to_user'];
	$from_user = $_POST['from_user'];
		
	try {
		$sql = "SELECT * FROM messages WHERE to_user = '".$to_user."' AND from_user='".$from_user."' LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();

		foreach ($result as $row) {
			echo str_replace(' ','+',$row['message']);
			$message_id = $row['message_id'];
		}
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	try {
		$sql = "DELETE FROM messages WHERE message_id = '".$message_id."' LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>