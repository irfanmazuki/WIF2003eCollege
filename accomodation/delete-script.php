<?php

session_start();
include "config.php";
include_once "Common.php";

if (isset($_POST['deleteBtn'])){
    $recordIds = $_POST['recordsCheckBox'];
    $common = new Common();

    $conn=mysqli_connect('localhost','root', '','ecollege');

    if(!$conn){
      echo 'connection error' . mysqli_connect_error();
    }
    $recordIds = $_POST['recordsCheckBox'];
    $common = new Common();

    $idd =   $recordIds[0];

    $sql = "SELECT * FROM aplications WHERE id = '$idd' ";

    $result = mysqli_query($conn, $sql);

    $applications = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);


    if($applications['status'] == 'Rejected'){
    echo '<script>alert("You can not update a Rejected application !")</script>';
    echo '<script>window.location.href="edit-accomodation.php";</script>';
    }else{

foreach ( $recordIds as $id ) {
        $delete = $common->deleteRecordById($connection,$id);
    }
    if ($delete) {
        echo '<script>alert("Record deleted successfully !")</script>';
        echo '<script>window.location.href="edit-accomodation.php";</script>';
    }}
}







if (isset($_POST['updateBtn'])){

  $conn=mysqli_connect('localhost','root', '','ecollege');

  if(!$conn){
    echo 'connection error' . mysqli_connect_error();
  }
  $recordIds = $_POST['recordsCheckBox'];
  $common = new Common();

  $idd =   $recordIds[0];
$idd =   $_SESSION['idd'] = $idd   ;
  $sql = "SELECT * FROM aplications WHERE id = '$idd' ";

  $result = mysqli_query($conn, $sql);

  $applications = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);


echo $applications['status'];

if( $applications['status'] == 'Approved'){
    echo '<script>alert("You can not update an Approved application !")</script>';
    echo '<script>window.location.href="edit-accomodation.php";</script>';
}elseif($applications['status'] == 'Rejected'){
echo '<script>alert("You can not update n Rejected application !")</script>';
echo '<script>window.location.href="edit-accomodation.php";</script>';
}else{
 echo  '<script>window.location.href="update.php";</script>';
}

}
?>
