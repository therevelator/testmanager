<?php
if ($_SESSION['userauth'] == "true") {
	echo " ";
}else{
	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
	header('Location: ../index.php');
}
/**
 *
 */
class main
{

	function connect ()
  {
    if (!$link = mysqli_connect("127.0.0.1", "root", "", "johnny")) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysqli_select_db($link,"johnny")) {
        echo 'Could not select database';
        exit;
    }
  }

  function addMainHeader () {
    echo "<br><br><br>";
    echo '
  <div align="center">
    <table class="dc_table_s7" summary="TestCase Table" style="width:60%;">
      <thead>
          <tr>
            <th style="width: 80px; text-align: center" scope="col">ID</th>
            <th style="width: 100px; text-align: center" scope="col">Project Name</th>
            <th style="text-align: center" scope="col">Created By</th>
            <th style="width: 200px;" scope="col">Action</th>
          </tr>
        </thead>
      <tbody>
    </div>';
  }

  function editMainTable () {
    echo '
    <tr>
      <th scope="row">' ; echo @$id ; echo '</th>
      <td><input id="example1div" type="text" name="Project Name"></td>
      <td>' ; echo @$section ; echo'</td>
      <td>' ; echo @$created ; echo'</td>';
      echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
        <input class="dc_3d_button green" type="submit" name="Add"  value="Save"></td>';
  }

  function editMainSection () {
    echo '
    <tr>
      <th scope="row">' ; echo @$id ; echo '</th>
      <td>' ; echo @$projectname ; echo'</td>
      <td><input id="example1div" type="text" name="SectionName"></td>
      <td>' ; echo @$created ; echo'</td>';
      echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
        <input class="dc_3d_button green" type="submit" name="Add"  value="Save"></td>';
  }

	function getTable1 ($posted_details_id = NULL) {
	  if (isset($_GET['pageno'])) {
	      $pageno = $_GET['pageno'];
	  } else {
	      $pageno = 1;
	  }
	  $no_of_records_per_page = 7;
	  $offset = ($pageno-1) * $no_of_records_per_page;
	  $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
	  $total_pages_sql = "SELECT COUNT(*) FROM main";
	  $result = mysqli_query($link,$total_pages_sql);
	  $total_rows = mysqli_fetch_array($result)[0];
	  $total_pages = ceil($total_rows / $no_of_records_per_page);
	  $posted_main_id = $_SESSION['posted_details_id'];
	  $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
	  $sql="SELECT * FROM  main LIMIT $offset, $no_of_records_per_page";
	  $result=mysqli_query($link,$sql);
	  $errornumrows = $result->num_rows;
	  if ($errornumrows != 0) {
	  while ($row = mysqli_fetch_assoc($result))
	 { $ID = $row['mainID'];
	   echo '
	     <tr>
	       <th  scope="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ID .  '</th>
	       <td>' ; echo $row['mainName'] ; echo'</td>
	       <td>' ; echo $row['CreatedBy'] ; echo'</td>';
	      echo'  <td>
	              <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['mainID']; echo '">
	              <input  type="hidden" id="Delete" value="Delete '; echo $row['mainID']; echo '">
								<input class="dc_3d_button black" type="submit" name="Details" value="'; echo $row['mainID']; echo '">
	              <input  type="hidden" id="Details" value="Details '; echo $row['mainID']; echo '">
	            </td>
	        ';
	    }
			}  else {
	  echo  '<script type="text/javascript">swal("Nothing to see here", "Add some test cases", "warning");</script>';
	  // $_SESSION['is_empty'] = "true";
	  }
	}



}





























 ?>
