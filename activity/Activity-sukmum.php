<!DOCTYPE html>
<html lang="en">
<?php
    include_once "headerAct.php";
?>
<body background="campus.jpeg" style="background-repeat:no-repeat; background-size: cover; background-position: center center;">


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <p></p>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">SUKMUM</h1>
        <p class="lead">Come and join lot of sports games and show your talent!!</p>
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


<form action="signup.inc.php" method="POST">
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">Swimming</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://www.themiamihurricane.com/wp-content/uploads/2016/01/CLO_Swim-Practice_KA.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Open to all</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" value="Swimming" name="activity">Apply</button></a>
                                </div>
                                <small class="text-muted">Close on 30 August 2020</small>


                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">Kayak</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://4.bp.blogspot.com/-gHmAtW9ZHYM/TZhVBmfu4hI/AAAAAAAAAQ4/l-VJ1YkM94c/s320/DSC01737.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Open to all</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" value="Kayak" name="activity">Apply</button></a>
                                </div>
                                <small class="text-muted">Close on 23 November 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">Futsal</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://arenafutsal.my/wp-content/uploads/2015/06/20150614051537-6-620x420.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Open to all</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" value="Futsal" name="activity">Apply</button></a>
                                </div>
                                <small class="text-muted">Close on 18 October 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</form>
    
<?php
    include_once "footer.php";
?>

</html>