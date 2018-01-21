<head>
<link href="css/dc_elite_buttons.css" rel="stylesheet" type="text/css" />
<link href="css/dc_buttons_transp.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdn.dcodes.net/2/3d_buttons/css/dc_3d_buttons.css" />
<script src="js/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/sweetalert.css" />
<link type="text/css" rel="stylesheet" href="css/dc_tables1.css" />



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
		<a href="php/add.php" class="dc_3d_button black"> Logout </a>
		<a href="logout.php" class="dc_3d_button black"> Logout </a>
		<a href="logout.php" class="dc_3d_button black"> Logout </a>
		<a href="logout.php" class="dc_3d_button black"> Logout </a>
		<a href="logout.php" class="dc_3d_button black"> Logout </a>
		<input class="dc_3d_button black" type="submit" name="table" value="Test Case">
		<input class="dc_3d_button black" type="submit" name="Logout"  value="Logout">
	</div>
</body>


<div id="example1div">
	<!-- pana aici e bine -->
<?php
require_once('php/add.php');
$testObject = new Table();
$testObject->addHeader();?>


<?php



$editaction = "default";
if (isset($_POST['Add'])) {
	$editaction = $_POST['Add'];
	require_once('php/db.php');
	$db = new db();
	$db->editTable();
}

// $project = "";
// $steps = "";
// $expected = "";

if (!empty($_POST['Add']) && $_POST['Add'] == "Submit Query") {
	$project = $_POST['Project'];
	$steps = $_POST['Steps'];
	$expected = $_POST['Expected'];
	$db->writeRecord($project, $steps, $expected);
}
// $addaction = "default";
// $a = 1;
// $b = 2;
// $c = 3;
// $d = 4;
// $e = 5;
// $testObject->add($a, $b, $c, $d, $e);
// $testObject->buttons();
// if ($addaction == "Add") {
// 	$a = 1;
// 	$b = 2;
// 	$c = 3;
// 	$d = 4;
// 	$e = 5;
// 	$testObject->add($a, $b, $c, $d, $e);
//
// }
//adds an editable row?!?
$edit = "default";

// if (isset($_POST['Done'])) {
// 	$edit = "Done";
// 	require_once('php/edit.php');
// 	 $id = "q"; $project = "w"; $steps = "e"; $expected = "r"; $created = "t";
// 	 $editaction = new editTable();
// 	 $editaction->edit($id, $project, $steps, $expected, $created);
//
// }
//sql Insert
// include('php/dbconnect.php');
// $db = new data();
// $db->connect();

// $a = "a";
// $b = "b";
// $c = "c";
// $d = "d";
// $e = "e";
// $sql = "INSERT INTO `users` (`id`, `project`, `steps`, `expected`, `createdby`) VALUES ($a, $b, $c, $d, $e)";
//  mysqli_query($link, $sql);
// $result = mysqli_query($link,"INSERT INTO users (id, project, steps, expected, createdby)
// VALUES ('a','b', 'c', 'd', 'e')");
//
// if (!$result) {
//     echo "DB Error, could not query the database\n";
//     echo 'MySQL Error: ' . mysqli_error($link);
//     exit;
// }
require_once('php/db.php');
$db = new db();
$db->connect();
$db->getTable();
$db->close();
// $db->query($sql);
?>

</div>
<?php
var_dump($_POST);
 $testObject->endTable();
// require_once('php/edit.php');
// $id = "q"; $project = "w"; $steps = "e"; $expected = "r"; $created = "t";
// $editaction = new editTable();
// $editaction->edit($id, $project, $steps, $expected, $created);
echo '';

?>
