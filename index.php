<?php
session_start();
echo '<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="js/alertify.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/sweetalert.css" />';
echo '
<div class="login">
<h1>Login</h1>
  <form method="post">
    <input type="text" name="username" placeholder="Username"  />
      <input type="password" name="password" placeholder="Password"  />
      <input class="btn btn-primary btn-block btn-large" type="submit" name="login" value="Let me in">
  </form>
</div>';



//implement jquery-toastmessage-plugin for notifications!!!
// $username = "default";
// $password = "default";
// if (isset($_POST['username']) && isset($_POST['password'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
// }
//add comment
@$loginaction = $_POST['login'];
if(isset($loginaction)) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  require_once('php/login.php');
  $login = new login();
  $login->userauth($username, $password);
}else {
  $_SESSION['userauth'] = "false";
}
// if ($username == "ion" && $password == "ppp") {
//   $_SESSION['userauth'] = "true";
// 	header("refresh:2; url=front.php");
// 	echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//   $_SESSION['username'] = $username;
// }elseif ($username == "default" && $password == "default") {
//   echo "";
// }else{
//   echo  '<script type="text/javascript">swal("Invalid Username / Password", "Please check the username / password combination", "error");</script>';
//   unset($_SESSION['username']);
// }
var_dump($_SESSION);

?>
