<head>
<link href="css/dc_elite_buttons.css" rel="stylesheet" type="text/css" />
<link href="css/dc_buttons_transp.css" rel="stylesheet" type="text/css" />
<link href="css/search.css" rel="stylesheet" type="text/css" />
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
    <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<?php

//using projectclass.php everywhere. Customize to add projects

session_start();
//login module using session variable
if ($_SESSION['userauth'] == "true") {


//logout action
$logoutaction = "default";
if (isset($_POST['Logout'])) {
	$logoutaction = $_POST['Logout'];
}
if ($logoutaction == "Logout") {
		require_once('logout.php');
}
$timestamp = date("Y-m-d H:i:s");
// var_dump($timestamp);
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
      <a href="import.php" class="dc_3d_button black"> Import CSV </a>
      <input class="button" type="text" style="margin-top: 10px;"placeholder="Search.." onkeyup="showResult(this.value)">

			<!-- <div align="right" style="padding-right: 40px; size: 100px;">
				<form  method="GET">
					<input class="effect-7" type="text" size="30" onkeyup="showResult(this.value)"  />
				</form>
			</div> -->
			<!-- this is the future search: https://www.w3schools.com/php/php_ajax_livesearch.asp -->
		</div>
	</form>
  <form>
       <div class="search" id="livesearch" ></div>
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

if (isset($_POST['AddSection'])) {
	$editaction = $_POST['AddSection'];
	require_once('php/projectclass.php');
	$testObject = new testcases();
	$testObject->editSection();
	// var_dump($_POST); die();
}
?>
</form>
<form name="case2" class="form-signin" method="POST">
<?php
if (!empty($_POST['Add']) && $_POST['Add'] == "Save") {

//error message echo  '<script type="text/javascript">swal("Success!", "Authenticated, please wait...", "success");</script>';
//checks if input empty and writes to DB
	@$projectname = $_POST['Testcase_Name'];


	if (!empty($_POST['Testcase_Name'])) {
    $mainID = $_SESSION['posted_main_id'];
		$testObject->writeRecord($projectname, $mainID);
	} else {
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
	header("refresh:1; url=details.php");


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
$link = mysqli_connect("127.0.0.1", "root", "", "johnny");
//this bit is for pagination. add when possible
if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
} else {
		$pageno = 1;
}
$no_of_records_per_page = 7;
$offset = ($pageno-1) * $no_of_records_per_page;
$mainID = $_SESSION['posted_main_id'];
$link = mysqli_connect("127.0.0.1", "root", "", "johnny");
$total_pages_sql = "SELECT COUNT(*) FROM `project` WHERE NOT mainID = 0 AND mainID ='$mainID'";
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
<?php
//echoes the </table> tag and the </div>
 // $testObject->endTable();
 //CUSTOMIZE TO VIEW LIST OF projects
 //CUSTOMIZE TO ADD SUBSECTIONS
 //CUSTOMIZE TO ADD PROJECTS (1 LEVEL UP FROM CURRENT PROJECTS)
} else {
	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
	header("refresh:1; url=index.php");
	$_SESSION['userauth'] = "false";

}
// var_dump($_SESSION);
?>
<body>
