<?php

/**This class is aimed at controlling the views of the entire system.
 * It renders the table structure and provides placeholders, eventually :)
 */
//db connect for the global purpose
 if (!$link = mysqli_connect("127.0.0.1", "root", "", "johnny")) {
     echo 'Could not connect to mysql';
     exit;
 }

 if (!mysqli_select_db($link,"johnny")) {
     echo 'Could not select database';
     exit;
}

class view
{

  function viewProjects ()
  {

    $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
    $sql="SELECT ProjectID, ProjectName, createdby FROM users ORDER BY ProjectID DESC";
    $result=mysqli_query($link,$sql);
    echo '
    <div align="center">
      <table class="dc_tables2_0" cellspacing="0" summary="DT features" style="width:60%;">
      <tr>
        <th>Projects</th>
        <th>Created By</th>
        <th>Details</th>
      </tr>';
    while ($row = mysqli_fetch_assoc($result))
    // Fetch one and one row
    {
     echo '<tr>
       <td>' ; echo $row['ProjectName'] ; echo'</td>
       <td>' ; echo $row['createdby'] ; echo'</td>
       <td>' ; echo $row['ProjectID'] ; echo'</td>
     </tr>';

    }

    echo "<br><br><br>";



  }
}





?>
