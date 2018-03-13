<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="import.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
session_start();
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']).
      " has been uploaded";
      $file = fopen($path, "r");
      while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
        var_dump($data); // loop through each line of CSV. Returns array of that line each time so we can hard reference it if we want
        $con=mysqli_connect("localhost","root","","johnny");
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $posted_main_id = $_SESSION['posted_main_id'];
        $use = "use johnny";
        $resultuse=mysqli_query($con,$use);
        $sql="INSERT INTO project (ProjectID, mainID, ProjectName, CreatedBy, Section, issection) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')";

        //$sql="UPDATE project SET ProjectID = '$data[0]', mainID = '$data[1]', ProjectName = '$data[2]', CreatedBy = '$data[3]', Section = '$data[4]', issection = '$data[5]' WHERE mainID = '$posted_main_id'";

        $result=mysqli_query($con,$sql);

        mysqli_close($con);


      set_time_limit(60); // reset timer on loop
      }
      // while(! feof($file))
      //   {
      //   print_r(fgetcsv($file)); echo "<br>";
      //   }
      //
      // fclose($file);
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }



?>
