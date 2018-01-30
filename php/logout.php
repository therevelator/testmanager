<?php
//user logout by pressing a button
//if (isset($_POST['logout'])) {
session_start();
	session_destroy();
	$_SESSION['userauth'] = "false";
	header( 'Location: localhost/utils/index.php' ) ;
	echo "Logged out";
//}
?>
