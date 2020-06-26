<?php
session_start();
error_reporting(0);
$email = $_SESSION['email'];
$idd = $_SESSION['idd'];

$conn=mysqli_connect('localhost','root', '','ecollege');

if(!$conn){
  echo 'connection error' . mysqli_connect_error();
}
$sql = "SELECT * FROM aplications WHERE id = '$idd' ";

$result = mysqli_query($conn, $sql);

$applications = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);

 if(isset($_POST['submitChanges']) )
 {
   $checkin = $_POST['checkin'];
   $checkout = $_POST['checkout'];
   $roomtype =  $_POST['roomtype'];
   $phone =  $_POST['phone'];
   $purpose =  $_POST['purpose'];

   $sql = "UPDATE aplications SET checkin = '$checkin' ,checkout = '$checkout',phone = '$phone',email ='$email' ,roomtype = '$roomtype' ,purpose ='$purpose'  WHERE id = '$idd'";

   $conn=mysqli_connect('localhost','root', '','ecollege');

   if(!$conn){
     echo 'connection error' . mysqli_connect_error();
   }
   if ($conn->query($sql) === TRUE) {
unset($_SESSION["idd"]);
echo  '<script>window.location.href="edit-accomodation.php";</script>';


   } else {
     echo "Error updating record: " . $conn->error;
   }

 }
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once "headerAcc.php"
?>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <div class="page-wrapper bg-grey font-robo">
        <div class="accordion container-fluid" id="accordionExample">

            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h4 class="title">Update Information</h4>

                        <form method="POST" action="update.php">
                        <?php include "config.php"; ?>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">
                            Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" readonly value=<?php
                                $fullname="";
                                $name=mysqli_query($connection,"select fullname from user_info where email = '{$_SESSION['email']}'" );
                                while ($row = mysqli_fetch_array($name)) {
                                    $fullname=$fullname.$row['fullname']." ";
                                }
                                echo "'".$fullname."'";
                            ?>>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="inputCollege" class="col-sm-2 col-form-label">Matric Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputMatric" readonly value=<?php
                                    $name=mysqli_query($connection,"select matric from user_info where email = '{$_SESSION["email"]}'" );
                                    while ($row = mysqli_fetch_array($name)) {
                                        echo $row['matric'];
                                    }
                                ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputCollege" class="col-sm-2 col-form-label">Residential College</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" readonly value=
                                    <?php
                                    $colleges="";
                                    $college=mysqli_query($connection,"select r_college from user_info where email = '{$_SESSION["email"]}'" );
                                    while ($row = mysqli_fetch_array($college)) {
                                        $colleges=$colleges.$row['r_college']." ";
                                    }
                                    echo "'".$colleges."'";
                                ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputContact" class="col-sm-2 col-form-label">Contact Number </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" readonly value=<?php
                                    $phone=mysqli_query($connection,"select phone from user_info where email = '{$_SESSION["email"]}'" );
                                    while ($row = mysqli_fetch_array($phone)) {
                                        echo $row['phone'];
                                    }
                                ?>>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="checkindate" class="col-sm-2 col-form-label">Date of Check In</label>
                                <div class="col-sm-4">
                                        <input class="form-control" type="date" name="checkin"  value="<?php echo $applications['checkin'] ?>" >
                                    </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="checkoutdate" class="col-sm-2 col-form-label">Date of Check Out</label>
                                <div class="col-sm-4">
                                        <input class="form-control" type="date" name="checkout" value="<?php echo $applications['checkout'] ?>" >
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="roomtype" class="col-sm-2 col-form-label">Room Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="roomtype" >
                                            <option value="singles" <?php if($applications['roomtype']=="singles"){
                                                echo "selected";
                                            }?>>Singles</option>
                                            <option value="double" <?php if($applications['roomtype']=="double"){
                                                echo "selected";
                                            }?>>Double</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="purpose" class="col-sm-2 col-form-label">Purpose</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" name="purpose" value="<?php echo $applications['purpose']; ?>" ></textarea >
                                    </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" name ="submitChanges" value="Save Changes" class="btn btn-primary">
                        </form>
                    </div>

</body>
<?php
include_once "footer.php";
?>

</html>
