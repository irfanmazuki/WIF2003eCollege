<?php
  $host = "localhost";
  $uname = "root";
  $pwd = "";
  $dbname = "ecollege";

  $con = mysqli_connect($host,$uname,$pwd,$dbname);

  if (!$con) {
    die("Unable to connect to Database : ".mysqli_connect_error());
  }
    #retrieve matric from other table
    $reportID = $_POST['reportID'];
    $rating = $_POST['rateme'];

    $sql = "UPDATE lodgereport SET rating=$rating WHERE reportID=$reportID";

    if ($con->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    header("Location: report-list.php");
    exit();
?>