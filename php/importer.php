<?php
	// If you need to parse XLS files, include php-excel-reader
  class import {
    function importer($path) {
      require('php/excel_reader2.php');

    	require('php/SpreadsheetReader.php');
      @$path = $_SESSION['filename'];
    	$Reader = new SpreadsheetReader($path);
    	foreach ($Reader as $Row)
    	{
    		print_r($Row);
    	}
    }
}
?>
