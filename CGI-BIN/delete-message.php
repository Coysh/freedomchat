<?php
	session_start();
	include('connect.php');
	$message_id = $_POST['message_id'];
	try {
		$sql = "DELETE FROM messages WHERE message_id = '".$message_id."' LIMIT 1";
		$result = $dbh->prepare($sql);
		$result->execute();
		echo "Deleted!";
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>