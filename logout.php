<?php


session_start();
$user = $_SESSION['user'];
session_unset();
session_destroy();


include ('CGI-BIN/connect.php');


$timestamp = time()-700;
$timestamp = date("Y-m-d H:i:s", $timestamp);
$sql = "UPDATE users SET last_active = '$timestamp' WHERE username = '$user'";
$result = $dbh->prepare($sql);
$result->execute();

header("Location: /");

?>