<?php
if ($_SESSION['userauth'] == "true") {
	echo " ";
}else{
	echo '<script type="text/javascript">swal("Nope :)", "Not allowed, redirecting to login page...", "error");</script>';
	header('Location: ../index.php');
}
//undo renaming if too many things don't work. rename back to testcases
class testcases1
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
    $sql="SELECT id, casename, steps, expected, createdby, ProjectID FROM testcases ORDER BY id";
    $result=mysqli_query($link,$sql);

    while ($row = mysqli_fetch_assoc($result))
    // Fetch one and one row
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

   function editTable () {
     echo '
     <tr>
       <th scope="row">' ; echo @$id ; echo '</th>
       <td><input id="example1div" type="text" name="Steps"></td>
       <td><input id="example1div" type="text" name="Expected"></td>
       <td>' ; echo @$created ; echo'</td>';
       echo '<td><input class="dc_3d_button orange" type="submit" name="Done" value="Done">
         <input class="dc_3d_button red" type="submit" name="Add"  value="Save"></td>';
    }

    function writeRecord ($steps, $expected, $posted_details_id = NULL) {
      $timestamp = date("Y-m-d H:i:s");
      $posted_details_id = $_SESSION['posted_details_id'];
      $user = $_SESSION['username'];
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="INSERT INTO testcases (steps, expected, createdby, ProjectID, CreatedTimestamp) VALUES ('$steps', '$expected', '$user', '$posted_details_id', '$timestamp')";
      $result=mysqli_query($link,$sql);
      // $sql="INSERT INTO testcases (ProjectID) VALUES ($posted_details_id)";
      // $result=mysqli_query($link,$sql);
      echo  '<script type="text/javascript">swal("Success!", "Record added, please wait...", "success");</script>';
    }

    function deleteRecord () {
      $deleteId = $_POST['Delete'];
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="SELECT id, casename, steps, expected, createdby FROM testcases ORDER BY id";
      $result=mysqli_query($link,$sql);
      // var_dump($_POST);
      $sql1="DELETE FROM testcases WHERE id = '$deleteId'";
      $result=mysqli_query($link,$sql1);
      $error = mysqli_errno($link);
      if (!$error) {
        echo  '<script type="text/javascript">swal("Success!", "Record deleted", "success");</script>';
      } else {
        echo  '<script type="text/javascript">swal("Error", "Project not empty!", "error");</script>';
      }


//     function renderProjectView() {
//       echo '<br><br><br>';
// echo'<div align="center">
//   <table class="dc_table_s9" summary="Sample Table" style="width:80%;">
//     <caption>
//     Project view
//     </caption>
//     <thead>
//       <tr class="odd">
//         <th scope="col">Project Name</th>
//         <th scope="col">Project ID</th>
//         <th scope="col">Created By</th>
//         <th scope="col">...</th>
//       </tr>
//     </thead>
//     <tfoot>
//       <tr>
//         <th scope="row">Total</th>
//         <td colspan="7">x projects, x testcases</td>
//       </tr>
//     </tfoot>
//     <tbody>
//       <tr class="odd">
//         <th scope="row">Burj Khalifa</th>
//         <td>UAE</td>
//         <td>Dubai</td>
//         <td><a href="#">details</a></td>
//       </tr>
//       <tr class="odd">
//         <th scope="row">Clock Tower Hotel</th>
//         <td>Saudi Arabia</td>
//         <td>Mecca</td>
//         <td><a href="#">details</a></td>
//       </tr>
//       <tr class="odd">
//         <th scope="row">Taipei 101</th>
//         <td>Taiwan</td>
//         <td>Taipei</td>
//         <td><a href="#">details</a></td>
//       </tr>
//       <tr class="odd">
//         <th scope="row">Financial Center</th>
//         <td>China</td>
//         <td>Shanghai</td>
//         <td><a href="#">details</a></td>
//       </tr>
//     </tbody>
//   </table>
//   </div>';}
    //   $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
    //   $sql="SELECT id, casename, steps, expected, createdby FROM testcases ORDER BY id";
    //   $result=mysqli_query($link,$sql);
    //   while ($row = mysqli_fetch_assoc($result))
    //   // Fetch one and one row
    //  { $ID = $row['id'];
    //         echo "<br><br><br>";
    //         echo '
    //           <tbody>
    //         </div>
    //         <tr>
    //           <th  scope="row">' . $ID .  '</th>
    //           <td style="width: 180px">' ; echo $row['casename'] ; echo'</td>
    //           <td>' ; echo $row['steps'] ; echo'</td>
    //           <td>' ; echo $row['expected'] ; echo'</td>
    //           <td>' ; echo $row['createdby'] ; echo'</td>';
    //           echo '<td><input class="dc_3d_button green" type="submit" name="Add" id="'; echo $row['id']; echo '" value="Add">
    //             <input class="dc_3d_button orange" type="submit" name="Done" id="'; echo $row['id']; echo '" value="Done">
    //                  <input class="dc_3d_button red" type="submit" name="Delete" value="'; echo $row['id']; echo '">
    //                  <input  type="hidden" id="Delete" value="'; echo $row['id']; echo '">
    //                </td>
    //            ';
    //       }
    // }

    function close () {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      mysqli_close($link);
    }
}
}
?>
