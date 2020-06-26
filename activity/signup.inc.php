<?php
	include_once 'config.php';
	session_start();

    $host = "localhost";
    $uname = "root";
    $pwd = "";
    $dbname = "ecollege";
  
    $con = new mysqli($host,$uname,$pwd,$dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      
	//$section = 'SUKMUM';
	$activity = $_POST['activity'];

	if($activity == "Kayak"||$activity == "Swimming"||$activity == "Futsal"){
		//$section = $_POST['section'];
		$section = 'SUKMUM';
	}
	elseif ($activity == "Boria"||$activity == "Nasyid"||$activity == "Dikir Barat"){
		//$section = $_POST['section'];
		$section = 'FESENI';
	}
	elseif ($activity == "BRAVO"||$activity == "KINASCHOOL"||$activity == "Entrepreneurship"){
		//$section = $_POST['section'];
		$section = "Project\'s College";
	}else{}

	$email = $_SESSION['email'];

	
	$sql = "insert into activity (activity, section, email, cur_date) VALUES ('$activity', '$section', '$email', NOW());";
	if ($con->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();

	header("Location: ../activity/Activity-history.php?signup=success");