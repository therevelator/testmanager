 <?php
/**
 *
 */
class data
{

  function connect()
  {
    $host = "localhost";
    $uname = "root";
    $pass = "";
    $con = mysqli_connect($host, $uname, $pass);
    // Check connection
    if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

    // ...some PHP code

    // Change database to "johnny"
    mysqli_select_db($con,"johnny");
    echo "connected";
  }
  function query($sql) {
    mysqli_query($con,$sql);
  }

}


?>
