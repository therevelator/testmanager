<head>
<!-- <link href="css/dc_elite_buttons.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="css/dc_buttons_transp.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="css/index.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="http://cdn.dcodes.net/2/3d_buttons/css/dc_3d_buttons.css" />
<script src="js/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/sweetalert.css" />

<link type="text/css" rel="stylesheet" href="css/admin.css" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

</head>
<?php
session_start();
?>
<form name="case" class="form-signin" method="POST">
  <div align="center">
    <a href="main.php" class="dc_3d_button black"> Home </a>
    <a href="front.php" class="dc_3d_button black"> Projects </a>
    <a href="project.php" class="dc_3d_button black"> TestCases </a>
    <a href="testcases.php" class="dc_3d_button black"> Details </a>
    <input class="dc_3d_button green" type="submit" name="Add" value="Add">
    <a href="logout.php" class="dc_3d_button black"> Logout </a>
  </div>
</form>

<div class="window">
  <div class="titlebar">
    <div class="buttons">
      <div class="close">
        <a class="closebutton" href="#"><span><strong>x</strong></span></a>
        <!-- close button link -->
      </div>
      <div class="minimize">
        <a class="minimizebutton" href="#"><span><strong>&ndash;</strong></span></a>
        <!-- minimize button link -->
      </div>
      <div class="zoom">
        <a class="zoombutton" href="#"><span><strong>+</strong></span></a>
        <!-- zoom button link -->
      </div>
    </div>
    Welcome to the DashBoard
    <!-- window title -->
  </div>
  <div class="content">
    <h3>Test?</h3>
    <p>Testing this window. Work in Progress...<p>
      <form action="php/uploader.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">

</form>
<?php
$file = $_SESSION['filename'];
//got the uploaded file name, now let's try to read it ($_SESSION['filename'])
//find an .xls and .xlsx parser that works in php
?>
  </div>
</div>
