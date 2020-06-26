<?php
  session_start();
 ?>
<html>

<head>
    <title>e-College</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded my-2 my-md-0 mr-auto d-flex flex-column flex-md-row p-3 px-md-4 mb-3 border-bottom shadow-sm">
            <img class="my-0 mr-md-auto" src="https://imgur.com/u9rG8ml.png" height="50" width="140"></img>

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
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Application</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a class="dropdown-item" href="../accomodation/rules-accomodation.php">New Application</a>
                            <a class="dropdown-item" href="../accomodation/edit-accomodation.php">Application History</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../report/report-list.php">Report</a>
                    </li>
                </ul>
                <?php
                  if (isset($_SESSION['email'])) {
                    echo "<a class=\"btn btn-outline-danger\" href=\"logout.php\">Log out</a>";
                  }
                  else {
                    echo "<a class=\"btn btn-outline-success\" href=\"login.php\">Sign in</a>";
                    echo "<a class=\"btn btn-outline-primary\" href=\"register.php\">Sign up</a>";
                  }
                 ?>
            </div>
        </nav>
    </div>

    <style>
        .carousel-caption {
            position: relative;
            left: 0;
            top: 0;
        }
    </style>

    <title>e-College: Home</title>
</head>
