<?php
//user logout by pressing a button
//if (isset($_POST['logout'])) {
@session_start();
$_SESSION['username'] = "false";
header("refresh:2; url=index.php");
echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//}
?>
