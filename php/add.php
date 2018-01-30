<?php

if ($_SESSION['userauth'] == "true") {
	echo " ";
}else{?>

	<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>
  <?php
	header('Location: ../index.php');
}

class Table {

function addHeader() {
  echo "<br><br><br>";
  echo '
<div align="center">
  <table class="dc_table_s7" summary="TestCase Table" style="width:60%;">
    <thead>
        <tr>
          <th style="width: 80px" scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
          <th style="width: 320px" scope="col">Steps</th>
          <th scope="col">Expected Result</th>
          <th scope="col">Created By</th>
          <th style="width: 100px;" scope="col">Action</th>
        </tr>
      </thead>
    <tbody>
  </div>';
}

function add($id = NULL, $casename = NULL, $steps = NULL, $expected = NULL, $created = NULL) {
  echo '
  <tr>
    <th scope="row">' ; echo $id ; echo '</th>
    <td><input id="example1div" type="text" name="ID" value=""></td>
    <td><input id="example1div" type="text" name="Steps"></td>
    <td><input id="example1div" type="text" name="Expected"></td>
    <td>' ; echo $created ; echo'</td>';
  // echo '
  //     <tr>
  //       <th  scope="row">' ; echo $id ; echo '</th>
  //       <td style="width: 180px">' ; echo $project ; echo'</td>
  //       <td>' ; echo $steps ; echo'</td>
  //       <td>' ; echo $expected ; echo'</td>
  //       <td>' ; echo $created ; echo'</td>';

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

  // $result=mysqli_query($link,$sql);
  //set parameters to use later in second foreach
  // if ($result->num_rows > 0) {
  // output data of each row
  $total_pages_sql = "SELECT COUNT(*) FROM project";
  $result = mysqli_query($link,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $posted_details_id = $_SESSION['posted_details_id'];
  $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
  $sql="SELECT * FROM  testcases WHERE ProjectID = $posted_details_id LIMIT $offset, $no_of_records_per_page";
  $result=mysqli_query($link,$sql);
  $errornumrows = $result->num_rows;
  if ($errornumrows != 0) {
  while ($row = mysqli_fetch_assoc($result))
 { $ID = $row['id'];
   echo '
     <tr>
       <th  scope="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ID .  '</th>
       <td>' ; echo $row['steps'] ; echo'</td>
       <td>' ; echo $row['expected'] ; echo'</td>
       <td>' ; echo $row['createdby'] ; echo'</td>';
      echo'  <td>
              <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['id']; echo '">
              <input  type="hidden" id="Delete" value="Delete '; echo $row['id']; echo '">
            </td>
        ';
    }
		}  else {
  echo  '<script type="text/javascript">swal("Nothing to see here", "Add some test cases", "warning");</script>';
  // $_SESSION['is_empty'] = "true";
  }
}



function loadDetails ($posted_details_id) {
 $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
 $sql="SELECT * FROM  testcases WHERE ProjectID = $posted_details_id ORDER BY id";
 $result=mysqli_query($link,$sql);
 $errornumrows = $result->num_rows;
 if ($errornumrows != 0) {
 while ($row = mysqli_fetch_assoc($result))
 // Fetch rows one by one
{ $ID = $row['id'];
  echo '
    <tr>
      <th  scope="row"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ID .  '</th>
      <td>' ; echo $row['steps'] ; echo'</td>
      <td>' ; echo $row['expected'] ; echo'</td>
      <td>' ; echo $row['createdby'] ; echo'</td>';

     echo'  <td>
             <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['id']; echo '">
             <input  type="hidden" id="Delete" value="Delete '; echo $row['id']; echo '">
           </td>
       ';

     }

     } else {
       echo  '<script type="text/javascript">swal("Error", "Project empty, redirecting ...", "error");</script>';
       header("refresh:1; url=front.php");
     }
 }

// function buttons () {
//   echo '<td><input class="dc_3d_button green" type="submit" name="Add"  value="Add">
//   <input class="dc_3d_button orange" type="submit" name="Done"  value="Done">
//   <input class="dc_3d_button red" type="submit" name="Add"  value="Delete"></td>
//   </tr>';
// }
function endTable() {
  echo '</tbody>
</table>
</div>
';
}

}



?>
