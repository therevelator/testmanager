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
    $sql="SELECT id, project, steps, expected, createdby FROM users ORDER BY id";
    $result=mysqli_query($link,$sql);
    while ($row = mysqli_fetch_assoc($result))
    // Fetch one and one row
   {  echo '
       <tr>
         <th  scope="row">' ; echo $row['id'] ; echo '</th>
         <td style="width: 180px">' ; echo $row['project'] ; echo'</td>
         <td>' ; echo $row['steps'] ; echo'</td>
         <td>' ; echo $row['expected'] ; echo'</td>
         <td>' ; echo $row['createdby'] ; echo'</td>';
         echo '<td><input class="dc_3d_button green" type="submit" name="Add" id="'; echo $row['id']; echo '" value="Add">
           <input class="dc_3d_button orange" type="submit" name="Done" id="'; echo $row['id']; echo '" value="Done">
           <input class="dc_3d_button red" type="submit" name="Add" id="'; echo $row['id']; echo '" value="Delete"></td>';
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
       echo '<td><input class="dc_3d_button green" type="submit" name="Add"  value="Add">
         <input class="dc_3d_button red" type="submit" name="Add" id=" value="Delete"></td>';


    }

    function writeRecord ($project, $steps, $expected) {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      $sql="INSERT INTO users (project, steps, expected) VALUES ('$project', '$steps', '$expected')";
      $result=mysqli_query($link,$sql);
      echo  '<script type="text/javascript">swal("Success!", "Record added, please wait...", "success");</script>';
    }

    function close () {
      $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
      mysqli_close($link);
    }
}

?>
