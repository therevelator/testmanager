<?php

// $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
// $sql="SELECT * FROM  testcases ORDER BY ProjectID";
// $result=mysqli_query($link,$sql);
// foreach ($result as $res) {
//   echo "<pre>";
//   print_r ($res);
//   echo "</pre>";
//   global $john = $res;

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
    $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
    $sql="SELECT ProjectID, ProjectName, createdby FROM project ORDER BY ProjectID";
    $result=mysqli_query($link,$sql);
    //set parameters to use later in second foreach
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '
        <tr>
          <td>' ; echo $row["ProjectID"] ; echo'</td>
          <td>' ; echo $row["ProjectName"] ; echo'</td>
          <td>' ; echo $row["createdby"] ; echo'</td>
          <td><input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row["ProjectID"]; echo '">
          <input class="dc_3d_button black" type="submit" name="Details" value="'; echo $row["ProjectID"]; echo '"></td>';
        }
    }
}


   function editTable ()
   {
     echo '
     <tr>
       <th scope="row">' ; echo @$id ; echo '</th>
       <td><input id="example1div" type="text" name="Project Name"></td>
       <td>' ; echo @$created ; echo'</td>';
       echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
         <input class="dc_3d_button red" type="submit" name="Add"  value="Save"></td>';
    }

    function writeRecord ($projectname) {
      $user = $_SESSION['username'];
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="INSERT INTO project (ProjectName, CreatedBy) VALUES ('$projectname', '$user')";
      $result=mysqli_query($link,$sql);
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
              <th style="width: 100px; text-align: center" scope="col">Project Name</th>
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
