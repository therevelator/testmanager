<?php
class Table {

function addHeader() {
  echo "<br><br><br>";
  echo '
<div align="center">
  <table class="dc_table_s7" summary="TestCase Table" style="width:90%;">
    <thead>
        <tr>
          <th style="width: 80px" scope="col">ID</th>
          <th style="width: 80px" scope="col">Name</th>
          <th style="width: 320px" scope="col">Steps</th>
          <th scope="col">Expected Result</th>
          <th scope="col">Created By</th>
          <th style="width: 280px;" scope="col">Action</th>
        </tr>
      </thead>
    <tbody>
  </div>';
}

function add($id = NULL, $project = NULL, $steps = NULL, $expected = NULL, $created = NULL) {
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

function buttons () {
  echo '<td><input class="dc_3d_button green" type="submit" name="Add"  value="Add">
  <input class="dc_3d_button orange" type="submit" name="Done"  value="Done">
  <input class="dc_3d_button red" type="submit" name="Add"  value="Delete"></td>
  </tr>';
}
function endTable() {
  echo '</tbody>
</table>
</div>
';
}

}



?>
