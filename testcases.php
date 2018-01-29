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
	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
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
			<a href="main.php" class="dc_3d_button black"> Home </a>
			<a href="front.php" class="dc_3d_button black"> Projects </a>
			<a href="project.php" class="dc_3d_button black"> TestCases </a>
			<a href="testcases.php" class="dc_3d_button black"> Details </a>
			<input class="dc_3d_button green" type="submit" name="Add" value="Add">
			<a href="logout.php" class="dc_3d_button black"> Logout </a>
		</div>
	</form>

<div id="example1div">
	<form name="case6" class="form-signin" method="POST">

<?php
//table header
require_once('php/add.php');
$testObject = new Table();
$testObject->addHeader();
//edit body of table, brings up text fields
$editaction = "default";
if (isset($_POST['Add'])) {
	$editaction = $_POST['Add'];
	require_once('php/db.php');
	$testcases = new testcases1();
	$testcases->editTable();
}

?>
</form>
<form name="case7" class="form-signin" method="POST">

<?php
if (!empty($_POST['Add']) && $_POST['Add'] == "Save") {
//error message echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//checks if input empty and writes to DB
$posted_details_id = $_SESSION['posted_details_id'];
	$steps = $_POST['Steps'];
	$expected = $_POST['Expected'];
	if (!empty($_POST['Steps']) && !empty($_POST['Expected'])) {
		$testcases->writeRecord($steps, $expected, $posted_details_id);
	}else {
		echo '<script type="text/javascript">swal("Nope :)", "All fields are required...", "error");</script>';
	}
}
?>
</form>
<form name="case8" class="form-signin" method="POST">
<?php
//Delete action
if (isset($_POST['Delete']) && !empty($_POST["Delete"])) {
	require_once('php/db.php');
	$testcases = new testcases1();
	$testcases->deleteRecord($error);
	if(isset($error)) {
		echo  '<script type="text/javascript">swal("Error", "Project not empty!", "error");</script>';

	}
}
require_once('php/db.php');
$testcases = new testcases1();
$testcases->connect();
$testcases->getTable();
// $testcases->close();

?>
</form>
</div>
</body>
<?php
 $testObject->endTable();

?>
