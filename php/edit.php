<?php

class editTable {

// function Header() {
//   echo "<br><br><br>";
//   echo '
// <div align="center">
//   <table class="dc_table_s10" summary="Sample Table" style="width:80%;">
//     <thead>
//         <tr>
//           <th style="width: 80px" scope="col">ID</th>
//           <th style="width: 80px" scope="col">Project</th>
//           <th style="width: 320px" scope="col">Steps</th>
//           <th scope="col">Expected Result</th>
//           <th scope="col">Created By</th>
//           <th style="width: 280px;" scope="col">Action</th>
//         </tr>
//       </thead>
//     <tbody>
//   </div>';
// }

function edit($id = NULL, $project = NULL, $steps = NULL, $expected = NULL, $created = NULL) {
  // echo '
  // <tr>
  //   <th scope="row">' ; echo $id ; echo '</th>
  //   <td><input id="example1div" type="text" name="ID" value=""></td>
  //   <td><input id="example1div" type="text" name="Steps"></td>
  //   <td><input id="example1div" type="text" name="Expected"></td>
  //   <td>' ; echo $created ; echo'</td>';
}

function buttons () {
  echo '<td><input class="dc_3d_button green" type="submit" name="Add"  value="Add">
  <input class="dc_3d_button orange" type="submit" name="Edit"  value="Edit" href="javascript:ReplaceContentInContainer(\'example1div\',\'Whew! You clicked!\')">
  <input class="dc_3d_button red" type="submit" name="Delete"  value="Delete"></td>
  </tr>';
}



}







?>
