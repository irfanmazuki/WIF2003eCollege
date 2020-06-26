<?php

if (isset($_POST['accsubmit'])) {
    session_start();

    $host = "localhost";
    $uname = "root";
    $pwd = "";
    $dbname = "ecollege";
  
    $con = new mysqli($host,$uname,$pwd,$dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

     $checkin = $_POST['checkin'];
     $checkout = $_POST['checkout'];
     $roomtype = $_POST['roomtype'];
     $phonea = mysqli_query($con,"select phone from user_info where email = '{$_SESSION["email"]}'" );
     while($row = mysqli_fetch_array($phonea)){
        $phone = $row['phone'];}
     $email = $_SESSION['email'];
     $purpose = $_POST['purpose'];

     $sql = "INSERT INTO aplications(checkin,checkout,phone,email,roomtype,purpose) VALUES ('$checkin','$checkout', '$phone', '$email' , '$roomtype', '$purpose' )";

     if ($con->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
     header('Location: edit-accomodation.php');}
?>