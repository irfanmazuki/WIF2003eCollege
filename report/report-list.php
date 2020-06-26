<?php 
include_once 'header.php';
include 'reportfx.php';
?>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <p></p>

    <div class="container">
        <h3><b>MY ISSUES</b></h3>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow bg-success">
                <div class="card-body text-dark">
                    <h2>
                    <?php
                        countIssue(2)
                    ?></h2>
                    <h4>Completed Issue</h4>
                </div>
            </div>
            <div class="card mb-4 box-shadow bg-warning">
                <div class="card-body text-dark">
                    <h2>
                    <?php
                        countIssue(1)
                    ?></h2>
                    </h2>
                    <h4>In-progress Issue</h4>
                </div>
            </div>
            <div class="card mb-4 box-shadow bg-danger">
                <div class="card-body text-dark">
                    <h2>
                    <?php
                        countIssue(0)
                    ?></h2>
                    </h2>
                    <h4>Pending Issue</h4>
                </div>
            </div>
        </div>
    </div>

    <p></p>

    <div class="container rounded border">
        <div>
            <p></p>
            <h5 class="text-secondary">Create new and manage your issue</h5>
        </div>
        <div>
            <a href="report-new.php" class="block">
                <button type="button" class="btn btn-primary">New</button>
            </a>
            <a href="report-delete.php" class="block">
                <button type="button" class="btn btn-danger">Delete</button>
            </a>
        </div>
        <div>
            <p></p>
        </div>
        <div>
        <?php
#TABLE DISPLAY FROM DATABASE
  $host = "localhost";
  $uname = "root";
  $pwd = "";
  $dbname = "ecollege";

  $con = new mysqli($host,$uname,$pwd,$dbname);

  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  session_start();
  $sql = "SELECT * FROM lodgereport WHERE email='".$_SESSION['email']."' ORDER BY dateLodged DESC ";
  $result = mysqli_query($con, $sql);

  echo "<table class='table table-striped'><th>Issue ID</th><th>Category</th><th>Issue Type</th><th>Location</th><th>Rating</th><th>Status</th><th>Lodged Date</th>";
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["reportID"]."</td><td>".$row["category"]."</td><td>".$row["rep_type"]."</td><td>".$row["rep_location"]."</td><td>".createButton($row["rating"],$row["reportID"],$row["status"])."</td><td>".createStatus($row["status"])."</td><td>".$row["dateLodged"]."</td></tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";

$con->close();
?>
        </div>
    </div>
</body>

<?php
include_once 'footer.php';
?>
</html>