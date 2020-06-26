<?php
  $host = "localhost";
  $uname = "root";
  $pwd = "";
  $dbname = "ecollege";

  $con = mysqli_connect($host,$uname,$pwd,$dbname);

  if (!$con) {
    die("Unable to connect to Database : ".mysqli_connect_error());
  }
  error_reporting(0);
 ?>
