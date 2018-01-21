<?php


class db
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
    $sql="SELECT id, casename, steps, expected, createdby FROM users ORDER BY id";
    $result=mysqli_query($link,$sql);

    while ($row = mysqli_fetch_assoc($result))
    // Fetch one and one row
   { $ID = $row['id'];
     echo '
       <tr>
         <th  scope="row">' . $ID .  '</th>
         <td style="width: 180px">' ; echo $row['casename'] ; echo'</td>
         <td>' ; echo $row['steps'] ; echo'</td>
         <td>' ; echo $row['expected'] ; echo'</td>
         <td>' ; echo $row['createdby'] ; echo'</td>';
         echo '<td><input class="dc_3d_button green" type="submit" name="Add" id="'; echo $row['id']; echo '" value="Add">
           <input class="dc_3d_button orange" type="submit" name="Done" id="'; echo $row['id']; echo '" value="Done">
                <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['id']; echo '">
                <input  type="hidden" id="Delete" value="'; echo $row['id']; echo '">
              </td>
          ';

   }
}
   function editTable () {
     echo '
     <tr>
       <th scope="row">' ; echo @$id ; echo '</th>
       <td><input id="example1div" type="text" name="Project" value=""></td>
       <td><input id="example1div" type="text" name="Steps"></td>
       <td><input id="example1div" type="text" name="Expected"></td>
       <td>' ; echo @$created ; echo'</td>';
       echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
         <input class="dc_3d_button red" type="submit" name="Add"  value="Save"></td>';


    }

    function writeRecord ($project, $steps, $expected) {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="INSERT INTO users (casename, steps, expected) VALUES ('$casename', '$steps', '$expected')";
      $result=mysqli_query($link,$sql);
      echo  '<script type="text/javascript">swal("Success!", "Record added, please wait...", "success");</script>';
    }

    function deleteRecord () {
      $deleteId = $_POST['Delete'];
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="SELECT id, casename, steps, expected, createdby FROM users ORDER BY id";
      $result=mysqli_query($link,$sql);
      var_dump($_POST);
      $sql1="DELETE FROM users WHERE id = '$deleteId'";
      $result=mysqli_query($link,$sql1);
      echo  '<script type="text/javascript">swal("Success!", "Record deleted", "success");</script>';
    }

    function renderProjectView() {
      echo "<br><br><br>";
      echo '
    <div align="center">
      <table class="dc_table_s7" summary="Sample Table" style="width:90%;">
        <thead>
            <tr>
              <th style="width: 80px" scope="col">ID</th>
              <th style="width: 80px" scope="col">Project</th>
              <th style="width: 320px" scope="col">Steps</th>
              <th scope="col">Expected Result</th>
              <th scope="col">Created By</th>
              <th style="width: 280px;" scope="col">Action</th>
            </tr>
          </thead>
        <tbody>
      </div>
      <tr>
        <th  scope="row">' . $ID .  '</th>
        <td style="width: 180px">' ; echo $row['casename'] ; echo'</td>
        <td>' ; echo $row['steps'] ; echo'</td>
        <td>' ; echo $row['expected'] ; echo'</td>
        <td>' ; echo $row['createdby'] ; echo'</td>';
        echo '<td><input class="dc_3d_button green" type="submit" name="Add" id="'; echo $row['id']; echo '" value="Add">
          <input class="dc_3d_button orange" type="submit" name="Done" id="'; echo $row['id']; echo '" value="Done">
               <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['id']; echo '">
               <input  type="hidden" id="Delete" value="'; echo $row['id']; echo '">
             </td>
         ';
    }

    function close () {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      mysqli_close($link);
    }
}

?>
