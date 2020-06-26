<?php
    include_once "headerAcc.php";
?>
<!DOCTYPE html>
<html lang="en">
<body background="campus.jpeg" style="background-repeat:no-repeat; background-size: cover; background-position: center center;">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <div class="accordion container-fluid" id="accordionExample">

        <h3 class="text-muted">Status</h3>

      <form action="delete-script.php" method="post">
        <table class="table" align="center" style="width:90%">
          <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Application ID</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
                <th scope="col">Aplication Date & Time</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
        include "config.php";
        include_once "Common.php";
        
        $common = new Common();
        $records = $common->getAllRecords($connection);
        if ($records->num_rows>0){
            $sr = 1;
            while ($record = $records->fetch_object()) {
                $recordId = $record->id;
                $checkin = $record->checkin;
                $checkout = $record->checkout;
                $datee = $record->datee;
                $status = $record->status;
               ?>
               <tr>
                        <td><input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" value="<?php echo $recordId;?>"></td>
                        <td><?php echo $recordId;?></td>
                        <td><?php echo $checkin;?></td>
                        <td><?php echo $checkout;?></td>
                        <td><?php echo $datee;?></td>
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

       <input type="submit" name="updateBtn" id="deleteBtn" class="btn btn-primary btn" onclick="return validateForm();" value="Update Application" />
       <input type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-danger btn" onclick="return validateForm();" value="Cancel Application" />


    </form>

</body>
<?php
    include_once "footer.php";
?>

</html>
