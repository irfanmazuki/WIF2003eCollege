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


    <h2 class="text-center">Registration Info</h2>
    <div class="container rounded border-dark" style="background-color:#F5F5F5 ;">
            <h3 class="font-weight-normal">Application</h3>
            <div class="container">
                        <form method="POST" action="accomodationCheck.php">
                            
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
                                        <input class="form-control" type="date" name="checkin">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkoutdate" class="col-sm-2 col-form-label">Date of Check Out</label>
                                <div class="col-sm-4">
                                        <input class="form-control" type="date" name="checkout">
                                    </div>
                            </div>


                            <div class="form-group row">
                                <label for="roomtype" class="col-sm-2 col-form-label">Room Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="roomtype">
                                            <option value="" disabled selected>Room type</option>
                                            <option value="singles">Singles</option>
                                            <option value="double">Double</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="purpose" class="col-sm-2 col-form-label">Purpose</label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" name="purpose" placeholder="Enter your purpose of staying" ></textarea>
                                    </div>
                            </div>
                            <div class="text-center">
                                <a class="block">
                                    <button type="submit" name="accsubmit" class="btn btn-success">Submit</button>
                                    <button href="rules-accomodation.php" name="accreport" class="btn btn-danger">Cancel</button>
                                </a>
                            </div>
                        </form>
            </div>
    </div>
</body>
<footer class="my-5 pt-1 text-muted text-center text-small">
    <p class="mb-1">© 2020 e-College - University of Malaya</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="https://myum.um.edu.my/">MyUM</a></li>
        <li class="list-inline-item"><a href="https://maya.um.edu.my/sitsvision/wrd/siw_lgn">Maya</a></li>
        <li class="list-inline-item"><a href="https://spectrum.um.edu.my/">SpeCTRUM</a></li>
    </ul>
</footer>

</html>
