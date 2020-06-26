<?php

session_start();
include "config.php";
include_once "Common.php";

if (isset($_POST['cancelBtn'])){
    $recordIds = $_POST['recordsCheckBox'];
    $common = new Common();

    $conn=mysqli_connect('localhost','root', '','ecollege');

    if(!$conn){
      echo 'connection error' . mysqli_connect_error();
    }
    $recordIds = $_POST['recordsCheckBox'];
    $common = new Common();

    $idd =   $recordIds[0];

    $sql = "SELECT * FROM activity WHERE id = '$idd' ";

    $result = mysqli_query($conn, $sql);

    $applications = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);


    if($applications['status'] == 'Rejected'){
    echo '<script>alert("You can not update a Rejected application !")</script>';
    echo '<script>window.location.href="activity-history.php";</script>';
    }else{

foreach ( $recordIds as $id ) {
        $delete = $common->deleteRecordById($connection,$id);
    }
    if ($delete) {
        echo '<script>alert("You apply has cancel!")</script>';
        echo '<script>window.location.href="activity-history.php";</script>';
    }}
}



if (isset($_POST['deleteBtn'])){

  $conn=mysqli_connect('localhost','root', '','ecollege');

  if(!$conn){
    echo 'connection error' . mysqli_connect_error();
  }
  $recordIds = $_POST['recordsCheckBox'];
  $common = new Common();

  $idd =   $recordIds[0];
$idd =   $_SESSION['idd'] = $idd   ;
  $sql = "SELECT * FROM activity WHERE id = '$idd' ";

  $result = mysqli_query($conn, $sql);

  $applications = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);


echo $applications['status'];

if( $applications['status'] == 'Pending'){
    echo '<script>alert("You can not delete an Pending application !")</script>';
    echo '<script>window.location.href="activity-history.php";</script>';
}
else{
 foreach ( $recordIds as $id ) {
        $delete = $common->deleteRecordById($connection,$id);
    }
    if ($delete) {
        echo '<script>alert("Record deleted successfully !")</script>';
        echo '<script>window.location.href="activity-history.php";</script>';
    }
}

}



?>
