<?php
    include_once "headerAct.php";
?>
<!DOCTYPE html>
<html lang="en">
<body background="campus.jpeg" style="background-repeat:no-repeat; background-size: cover; background-position: center center;">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

        <h3 class="display-4">List of Activity Application History</h3>
    </div>



    <form class="container">
        <form method="POST" action="signup.inc.php"></form>
        <?php include "config.php"; ?>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
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
    </form>




      <form action="delete-script.php" method="post">
        <table class="table" align="center" style="width:90%">
          <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Application ID</th>
                <th scope="col">Activity</th>
                <th scope="col">Application Date & Time</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody class="p-3 mb-2 bg-secondary text-white">


            <?php
        include "config.php";
        include_once "Common.php";
        
        $common = new Common();
        $records = $common->getAllRecords($connection);
        if ($records->num_rows>0){
            $sr = 1;
            while ($record = $records->fetch_object()) {
                $recordId = $record->id;
                $activity = $record->activity;
                $section = $record->section;
                $date = $record->cur_date;
                $status = $record->status;
               ?>
               <tr>
                        <td><input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" value="<?php echo $recordId;?>"></td>
                        <td><?php echo $recordId;?></td>
                        <td><?php echo $activity.", " .$section;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $status;?></td>
                        </tr>
                        <?php
                   $sr++;
               }
           }
           ?>
           </tbody>
       </table>
       <div style="text-align: center">

       <!--input type="submit" name="updateBtn" id="deleteBtn" class="btn btn-primary btn" onclick="return validateForm();" value="Update Application" /-->

       <input type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-danger btn" onclick="return validateForm();" value="Delete" />
       <input type="submit" name="cancelBtn" id="cancelBtn" class="btn btn-secondary btn" onclick="return validateForm();" value="Cancel" />


    </form>

</body>
<?php
    include_once "footer.php";
?>

</html>
