<?php
session_start();
error_reporting(0);
if($_SESSION['email']==null){
    header('Location: ../index/homepage.php');
}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="validation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded my-2 my-md-0 mr-auto d-flex flex-column flex-md-row p-3 px-md-4 mb-3 border-bottom shadow-sm">
        <a href="../index/homepage.php">
            <img class="my-0 mr-md-auto" src="https://imgur.com/u9rG8ml.png" height="50" width="140"></img></a> 
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activity</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="../activity/Activity-list.php">Apply New Activity</a>
                            <a class="dropdown-item" href="../activity/Activity-history.php">Activity History</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="http://example.com" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Application<span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a class="dropdown-item" href="rules-accomodation.php">New Application</a>
                            <a class="dropdown-item" href="edit-accomodation.php">Application History</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../report/report-list.php">Report</a>
                    </li>
                </ul>
                <?php
                session_start();
                  if (isset($_SESSION["email"])) {
                    echo "<a class=\"btn btn-outline-danger\" href=\"logout.php\">Log out</a>";
                  }
                  else {
                    echo "<a class='btn btn-outline-success' href='login.php'>Sign in</a>";
                  }
                 ?>
            </div>
        </nav>
    </div>

    <title>e-College: Home</title>
</head>