<?php
//user logout by pressing a button
//if (isset($_POST['logout'])) {
session_start();
	$_SESSION['userauth'] = "false";
	header('Location: ../index.php');
	echo "Logged out";
//}
?>
