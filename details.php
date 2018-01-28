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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<a href="main.php" class="dc_3d_button black"> Home </a>
			<a href="front.php" class="dc_3d_button black"> Projects </a>
			<a href="project.php" class="dc_3d_button black"> TestCases </a>
			<a href="testcases.php" class="dc_3d_button black"> Details </a>
			<input class="dc_3d_button green" type="submit" name="Add" value="Add">
			<a href="logout.php" class="dc_3d_button black"> Logout </a>
		</div>
	</form>
	</body>
<div id="example1div">
<?php
//table header
// var_dump($_SESSION);
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
$link = mysqli_connect("127.0.0.1", "root", "", "johnny");
//this bit is for pagination. add when possible
if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
} else {
		$pageno = 1;
}
$no_of_records_per_page = 7;
$offset = ($pageno-1) * $no_of_records_per_page;
$link = mysqli_connect("127.0.0.1", "root", "", "johnny");

// $result=mysqli_query($link,$sql);
//set parameters to use later in second foreach
// if ($result->num_rows > 0) {
// output data of each row
$total_pages_sql = "SELECT COUNT(*) FROM project";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>

</div>
<div>
<ul class="pagination">
		<li><a href="?pageno=1">First</a></li>
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
				<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
				<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
		</li>
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</div>
</body>
