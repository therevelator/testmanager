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

//using projectclass.php everywhere. Customize to add projects

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
			<a href="front.php" class="dc_3d_button black"> Home </a>
			<a href="project.php" class="dc_3d_button black"> Project </a>
			<a href="testcases.php" class="dc_3d_button black"> TestCase </a>
			<input class="dc_3d_button green" type="submit" name="Add" value="Add">
			<a href="logout.php" class="dc_3d_button black"> Logout </a>
		</div>
	</form>

<div id="example1div">
<form name="case1" class="form-signin" method="POST">

<?php
//table header
require_once('php/projectclass.php');
$testObject = new testcases();
$testObject->addHeader();
//edit body of table, brings up text fields
$editaction = "default";

if (isset($_POST['Add'])) {
	$editaction = $_POST['Add'];
	require_once('php/projectclass.php');
	$testObject = new testcases();
	$testObject->editTable();
}
?>
</form>
<form name="case2" class="form-signin" method="POST">
<?php
if (!empty($_POST['Add']) && $_POST['Add'] == "Save") {
//error message echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//checks if input empty and writes to DB
	$projectname = $_POST['Project_Name'];

	if (!empty($_POST['Project_Name'])) {
		$testObject->writeRecord($projectname);
	}else {
		echo '<script type="text/javascript">swal("Nope :)", "All fields are required...", "error");</script>';
	}
}
?>
</form>
<form name="case3" class="form-signin" method="POST">
<?php
//Delete action
if (isset($_POST['Delete'])) {
	require_once('php/projectclass.php');
	$testObject = new testcases();
	// var_dump($_SESSION['ID']);
$testObject->deleteRecord();
	//find a way to pass the ID of the project(finally worked as $_POST['Delete']);
}
?>
</form>
<form name="case4" class="form-signin" method="POST">
<?php
if (isset($_POST['Details'])) {
	require_once('php/projectclass.php');
	$testObject = new testcases();
	$posted_details_id = $_POST['Details'];
	$_SESSION['posted_details_id'] = $posted_details_id;
	// var_dump($posted_details_id);die();
	echo  '<script type="text/javascript">swal("Please wait...", "Getting Project Details", "warning");</script>';
	header("refresh:2; url=details.php");


	//var_dump($_POST);


	// var_dump($_SESSION['ID']);
	//$testObject->deleteRecord();
	//find a way to pass the ID of the project(finally worked as $_POST['Delete']);
}
?>
</form>

<?php
//connects to the DB and gets the rows after they were added above
require_once('php/projectclass.php');
$testObject = new testcases();
$testObject->connect();
$testObject->getTable();
$testObject->close();
?>
</div>
</body>
<?php
//echoes the </table> tag and the </div>
 // $testObject->endTable();
?>
