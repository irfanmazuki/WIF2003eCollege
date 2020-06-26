<?php
    include_once "headerAct.php";
?>
<!DOCTYPE html>
<html lang="en">
<body background="campus.jpeg" style="background-repeat:no-repeat; background-size: cover; background-position: center center;">

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <p></p>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Join Interesting College's Activities</h1>
        <p class="lead">There are lot of exciting activities waiting for you!</p>
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

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">SUKMUM</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://imgur.com/4lgl8kU.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Come and join lot of sports games and show your talent!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="Activity-sukmum.php">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </a>
                                </div>
                                <small class="text-muted">Open</small>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">FESENI</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://imgur.com/T5ImdVC.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Unleash your secret talent and beat your passion.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="Activity-feseni.php">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </a>
                                </div>
                                <small class="text-muted">Open</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-center">College's Project</h4>
                        </div>
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://imgur.com/SU8YXQT.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"></img>
                        <div class="card-body">
                            <p class="card-text">Develop your soft skills and engage with the community.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="Activity-project.php">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </a>
                                </div>
                                <small class="text-muted">Open</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>
<?php
    include_once "footer.php";
?>
</html>