<?php
//user logout by pressing a button
@session_start();
$_SESSION["userauth"] = "false";
echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
header("refresh:2; url=index.php");
}
?>
