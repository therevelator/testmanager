<?php

/**
 *
 */
class main
{
  function addMainHeader () {
    echo "<br><br><br>";
    echo '
  <div align="center">
    <table class="dc_table_s7" summary="TestCase Table" style="width:60%;">
      <thead>
          <tr>
            <th style="width: 80px; text-align: center" scope="col">ID</th>
            <th style="width: 100px; text-align: center" scope="col">Project Name</th>
            <th style="width: 100px; text-align: center" scope="col">Section</th>
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


}





























 ?>
