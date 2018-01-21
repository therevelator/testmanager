<?php
//user logout by pressing a button
//if (isset($_POST['logout'])) {
@session_start();
$_SESSION['userauth'] = "false";
header("url=index.php");
echo  '<script type="text/javascript">swal("Logged Out!", "Logging out of current session, please wait...", "warning");</script>';
//}
?>
