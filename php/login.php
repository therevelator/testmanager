<?php


class login {

  function userauth ($username, $password) {

    if (!$link = mysqli_connect("127.0.0.1", "root", "", "johnny")) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysqli_select_db($link,"johnny")) {
        echo 'Could not select database';
        exit;
    }

    $link = mysqli_connect("127.0.0.1", "root", "", "johnny");
    $sql="SELECT username FROM  members WHERE username = '$username'";
    $result=mysqli_query($link,$sql);

    $sql2="SELECT password FROM  members WHERE password = '$password'";
    $result2=mysqli_query($link,$sql2);

    if (mysqli_num_rows($result) == 0 || mysqli_num_rows($result2) == 0) {
      echo  '<script type="text/javascript">swal("Unknown User", "Please check username / password combination", "error");</script>';
      $_SESSION["userauth"] = "false";
    }else{
      echo  '<script type="text/javascript">swal("Successful, please wait...", "Getting User Details", "success");</script>';
      header("refresh:2; url=front.php");
      $_SESSION["userauth"] = "true";
    }

    }

}
?>
