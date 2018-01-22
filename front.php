<head>
<link href="css/dc_elite_buttons.css" rel="stylesheet" type="text/css" />
<link href="css/dc_buttons_transp.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdn.dcodes.net/2/3d_buttons/css/dc_3d_buttons.css" />
<script src="js/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/sweetalert.css" />
<link type="text/css" rel="stylesheet" href="css/dc_tables1.css" />
<link type="text/css" rel="stylesheet" href="css/dc_tables2.css" />
</head>
<?php
session_start();
//login module using session variable
if ($_SESSION['userauth'] == "true") {
	echo " ";
}else{
	echo "Please check session variables";
	header('Location: index.php');
}
//logout action
$logoutaction = "default";
if (isset($_POST['Logout'])) {
	$logoutaction = $_POST['Logout'];
}
if ($logoutaction == "Logout") {
		require_once('logout.php');
}
?>
<body>
<form name="case" class="form-signin" method="POST">
	<div align="center">
		<!-- <a href="php/add.php" class="dc_3d_button black"> Logout </a> -->
		<a href="front.php" class="dc_3d_button black"> Home </a>

		<a href="project.php" class="dc_3d_button black"> Project </a>
		<!-- <a href="logout.php" class="dc_3d_button black"> Logout </a>
		<a href="logout.php" class="dc_3d_button black"> Logout </a> -->
		<a href="testcases.php" class="dc_3d_button black"> TestCase </a>

		<input class="dc_3d_button green" type="submit" name="Add" value="Add">

		<a href="logout.php" class="dc_3d_button black"> Logout </a>
	</div>
</body>
<div id="example1div">
<?php
//table header
require_once('php/view.php');
$view = new view();
$view->viewProjects();
//edit body of table, brings up text fields

?>

</div>
