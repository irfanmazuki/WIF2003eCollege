<?php
    $host = "localhost";
    $uname = "root";
    $pwd = "";
    $dbname = "ecollege";
  
    $con = new mysqli($host,$uname,$pwd,$dbname);
  
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      echo "Database Connected successfully <br><br>";
    
    #call id from GET
    $id = $_GET['id'];

    mysqli_query($con,"DELETE FROM lodgereport WHERE reportID='".$id."'");
    mysqli_close($con);
    header("Location: report-delete.php");
?>