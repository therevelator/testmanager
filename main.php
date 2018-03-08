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
<link type="text/css" rel="stylesheet" href="css/livesearch.css" />
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

  <!-- <div id="livesearch"></div> -->

	<form name="case" class="form-signin" method="POST">
		<div align="center">
      <a href="main.php" class="dc_3d_button black"> Home </a>
			<a href="front.php" class="dc_3d_button black"> Projects </a>
			<a href="project.php" class="dc_3d_button black"> TestCases </a>
			<a href="testcases.php" class="dc_3d_button black"> Details </a>
			<input class="dc_3d_button green" type="submit" name="Add" value="Add">
			<a href="logout.php" class="dc_3d_button black"> Logout </a>
      <div class="search" id="livesearch" style="position:absolute;z-index:10; top:45px;left:21.5%; background: rgba(102,97,97,1);border: 1px solid #b7b7b7;border-radius: 13px; box-sizing: content-box;"></div>

		</div>
	</form>

<div id="example1div">
  <div class="search">
    <form>
      <!-- <input  type="text" size="30" onkeyup="showResult(this.value)"> -->
      <input class="enjoy-css" placeholder="Search Projects" onkeyup="showResult(this.value)">
    </form>
  </div>
<form name="case1" class="form-signin" method="POST">

<?php
//table header
require_once('php/mainclass.php');
$testObject = new main();
$testObject->addMainHeader();
//edit body of table, brings up text fields
$editaction = "default";

if (isset($_POST['Add'])) {
	$editaction = $_POST['Add'];
	require_once('php/mainclass.php');
	$testObject = new main();
	$testObject->editMainTable();
}

if (isset($_POST['AddSection'])) {
	$editaction = $_POST['AddSection'];
	require_once('php/mainclass.php');
	$testObject = new main();
	$testObject->editMainSection();
//continue adding main functions in mainclass.php and adding them here

}
?>
</form>


<div>

<form name="case2" class="form-signin" method="POST">
<?php
if (!empty($_POST['Add']) && $_POST['Add'] == "Save") {

//checks if input empty and writes to DB
	@$mainName = $_POST['Project_Name'];
	if (!empty($_POST['Project_Name'])) {
		$testObject->writeRecord($mainName);
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
	require_once('php/mainclass.php');
	$testObject = new main();
	// var_dump($_SESSION['ID']);
$testObject->deleteRecord();
	//find a way to pass the ID of the project(finally worked as $_POST['Delete']);
}
?>
</form>
<form name="case4" class="form-signin" method="POST">
<?php
if (isset($_POST['Details'])) {
	require_once('php/mainclass.php');
	$testObject = new main();

	$posted_main_id = $_POST['Details'];
	$_SESSION['posted_main_id'] = $posted_main_id;
  // var_dump($_POST);
	echo  '<script type="text/javascript">swal("Please wait...", "Getting Project Details", "warning");</script>';
	header("refresh:1; url=front.php");
}

?>
</form>


<?php
//connects to the DB and gets the rows after they were added above
require_once('php/mainclass.php');
$testObject = new main();
$testObject->connect();
@$posted_main_id = $_SESSION['posted_main_id'];
$testObject->getTable1($posted_main_id);
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
// }else{
// 	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
// 	header('Location: index.php');
// }
//echoes the </table> tag and the </div>
 // $testObject->endTable();
 //CUSTOMIZE TO VIEW LIST OF projects
 //CUSTOMIZE TO ADD SUBSECTIONS
 //CUSTOMIZE TO ADD PROJECTS (1 LEVEL UP FROM CURRENT PROJECTS)
// var_dump($_SESSION);
?>
