<?php
	$dbname = '' #Database Name
	$dbusrname = '' #Database Username
	$dbpass = '' #Database Pass
	
	$dbh = new PDO("mysql:host=localhost;dbname=$dbname", "$dbusrname", "$dbpass");
?>