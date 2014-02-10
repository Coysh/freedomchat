<?php 
include 'header.php';
	$user = $_SESSION['user'];

	if ($user != "") {
		$page = 'connections.php';
		include ('pages/connections.php');
	}

	if (!$page) {
		include('pages/home.php');
	}
include 'footer.php';
?>

