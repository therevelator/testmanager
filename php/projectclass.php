<?php

// $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
// $sql="SELECT * FROM  testcases ORDER BY ProjectID";
// $result=mysqli_query($link,$sql);
// foreach ($result as $res) {
//   echo "<pre>";
//   print_r ($res);
//   echo "</pre>";
//   global $john = $res;
if ($_SESSION['userauth'] == "true") {
	echo " ";
}else{
	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
	header('Location: ../index.php');
}

class testcases
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



  function getTable () {
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
		@$mainID = $_SESSION['posted_main_id'];
    // var_dump($offset);
    $sql="SELECT * FROM project WHERE mainID = $mainID ORDER BY ProjectID LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($res_data)){
      echo '
        <tr>
          <td>' ; echo $row["ProjectID"] ; echo'</td>
          <td>' ; echo $row["ProjectName"] ; echo'</td>
          <td>' ; echo $row["Section"] ; echo'</td>
          <td>' ; echo $row['CreatedBy'] ; echo'</td>
          <td><button class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row["ProjectID"]; echo '">Delete</button>
					<input  type="hidden" id="Delete" value="Delete '; echo $row['ProjectID']; echo '">
          <button class="dc_3d_button black" type="submit" name="Details" value="'; echo $row["ProjectID"]; echo '">Details</button>
					<input  type="hidden" id="Details" value="Details '; echo $row['ProjectID']; echo '"></td>';

    }
    mysqli_close($link);
}


   function editTable ()
   {
     echo '
     <tr>
       <th scope="row">' ; echo @$id ; echo '</th>
       <td><input id="example1div" type="text" name="Testcase Name"></td>
       <td>' ; echo @$section ; echo'</td>
       <td>' ; echo @$created ; echo'</td>';
       echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
         <input class="dc_3d_button green" type="submit" name="Add"  value="Save"></td>';
    }

    function editSection ()
    {
      echo '
      <tr>
        <th scope="row">' ; echo @$id ; echo '</th>
        <td>' ; echo @$projectname ; echo'</td>
        <td><input id="example1div" type="text" name="SectionName"></td>
        <td>' ; echo @$created ; echo'</td>';
        echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
          <input class="dc_3d_button green" type="submit" name="Add"  value="Save"></td>';
     }

    function writeRecord ($projectname = NULL, $mainID) {
      $user = $_SESSION['username'];
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="INSERT INTO project (ProjectName, CreatedBy, mainID) VALUES ('$projectname', '$user', '$mainID')";
      $result=mysqli_query($link,$sql);
			echo mysqli_error($link);
      echo  '<script type="text/javascript">swal("Success!", "Record added, please wait...", "success");</script>';
    }

    function deleteRecord ($error = NULL) {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="SELECT ProjectID, ProjectName, CreatedBy FROM project ORDER BY ProjectID";
      $result=mysqli_query($link,$sql);
      while ($row = mysqli_fetch_assoc($result))
      // Fetch one and one row
     {
      $deleteId = $_POST['Delete']; }
      // var_dump($_POST);
      $sql1="DELETE FROM project WHERE ProjectID = '$deleteId'";
      $result=mysqli_query($link,$sql1);
      $error = mysqli_errno($link);
      if (!$error) {
        echo  '<script type="text/javascript">swal("Success!", "Record deleted", "success");</script>';
      } else {
        echo  '<script type="text/javascript">swal("Error", "Project not empty!", "error");</script>';
      }

  }

    function close () {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      mysqli_close($link);
    }

    function addHeader() {
      echo "<br><br><br>";
      echo '
    <div align="center">
      <table class="dc_table_s7" summary="TestCase Table" style="width:60%;">
        <thead>
            <tr>
              <th style="width: 80px; text-align: center" scope="col">ID</th>
              <th style="width: 100px; text-align: center" scope="col">TestCase Name</th>
              <th style="width: 100px; text-align: center" scope="col">Section</th>
              <th style="text-align: center" scope="col">Created By</th>
              <th style="width: 200px;" scope="col">Action</th>
            </tr>
          </thead>
        <tbody>
      </div>';
    }

    function loadDetails ($posted_details_id, $is_empty = NULL) {
     $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
     $sql="SELECT * FROM  testcases WHERE ProjectID = $posted_details_id ORDER BY ProjectID";
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

         }


     }




    function addTestcaseHeader() {
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


    function editTableAddTestcase ($posted_details_id) {
      echo '
      <tr>
        <th scope="row">' ; echo @$id ; echo '</th>
        <td><input id="example1div" type="text" name="Steps"></td>
        <td><input id="example1div" type="text" name="Expected"></td>
        <td>' ; echo @$created ; echo'</td>';
        echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
          <input class="dc_3d_button red" type="submit" name="Add"  value="Save"></td>';
          $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
          $sql="SELECT * FROM  testcases WHERE ProjectID = $posted_details_id ORDER BY ProjectID";
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
     }

     function writeRecordAddTestcase ($posted_details_id, $steps, $expected) {
       $user = $_SESSION['username'];
       $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
       $sql="INSERT INTO testcases (steps, expected, createdby, ProjectID) VALUES ('$steps', '$expected', '$user', '$posted_details_id')";
       $result=mysqli_query($link,$sql);
       echo  '<script type="text/javascript">swal("Success!", "Record added, please wait...", "success");</script>';
     }

    function endTable()
    {
      echo '</tbody>
    </table>
    </div>
    ';
    }
}
}


?>
