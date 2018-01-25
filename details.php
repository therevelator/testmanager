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

//LE: NOT using projectclass.php everywhere

session_start();
//login module using session variable
if ($_SESSION['userauth'] == "true") {
	echo " ";

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
			<a href="front.php" class="dc_3d_button black"> Home </a>
			<a href="project.php" class="dc_3d_button black"> Project </a>
			<a href="testcases.php" class="dc_3d_button black"> TestCase </a>
			<input class="dc_3d_button green" type="submit" name="Add" value="Add">
			<a href="logout.php" class="dc_3d_button black"> Logout </a>
		</div>
	</body>
<div id="example1div">
<?php
//table header
var_dump($_SESSION);
$posted_details_id = $_SESSION['posted_details_id'];
require_once('php/add.php');
$testObject = new Table();
$testObject->addHeader();

//edit body of table, brings up text fields

$editaction = "default";
@$add = $_POST['Add'];
if (isset($add)) {
	@$editaction = $_POST['Add'];
	require_once('php/db.php');
	$testcases = new testcases1();
	$testcases->editTable();
}

require_once('php/db.php');
$testcases = new testcases1();
if (!empty($_POST['Add']) && $_POST['Add'] == "Save") {
//error message echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//checks if input empty and writes to DB
	$steps = $_POST['Steps'];
	$expected = $_POST['Expected'];
	if (!empty($_POST['Steps']) && !empty($_POST['Expected'])) {
		$posted_details_id = $_SESSION['posted_details_id'];
		$testcases->writeRecord($steps, $expected, $posted_details_id);
	}else {
		echo '<script type="text/javascript">swal("Nope :)", "All fields are required...", "error");</script>';
	}
}

if (isset($_POST['Delete']) && !empty($_POST["Delete"])) {
	require_once('php/db.php');
	$testcases = new testcases1();
	$testcases->deleteRecord();
}


require_once('php/add.php');
$testcases = new Table();
// $testcases->connect();
$testObject->getTable1($posted_details_id);
}else{
	echo "Please check session variables";
	header('Location: index.php');
}
