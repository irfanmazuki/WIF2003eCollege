<?php include_once 'header.php';
include_once 'reportfx.php'; ?>
<!DOCTYPE html>
<html lang="en">
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <p></p>
    <div class="container">
        <h3><b>MY REPORT</b></h3>
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
            <h5 class="text-secondary">Delete your issue</h5>
            <a href="report-list.php" class="block">
                <button type="button" class="btn btn-secondary">Back to report list</button>
            </a>
        </div>
        <div>
            <p></p>
        </div>
        <?php
#TABLE DISPLAY FROM DATABASE
  $host = "localhost";
  $uname = "root";
  $pwd = "";
  $dbname = "ecollege";
  error_reporting(0);
  $con = new mysqli($host,$uname,$pwd,$dbname);

  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  $sql = "SELECT * FROM lodgereport WHERE email='".$_SESSION['email']."' ORDER BY dateLodged DESC ";
  $result = mysqli_query($con, $sql);

  echo "<table class='table table-striped'><th>Issue ID</th><th>Category</th><th>Issue Type</th><th>Location</th><th>Rating</th><th>Status</th><th>Lodged Date</th><th>Click to delete</th>";
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["reportID"]."</td><td>".$row["category"]."</td><td>".$row["rep_type"]."</td><td>".$row["rep_location"]."</td><td>".createButton($row["rating"],$row["reportID"],$row["status"])."</td><td>".createStatus($row["status"])."</td><td>".$row["dateLodged"]."</td>".showDeleteBox($row["status"],$row["reportID"])."";
  }
} else {
  echo "0 results";
}
echo "</table>";

$con->close();
?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Report</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <div>Are you sure you want to delete this following report?</div>
                    </div>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Issue ID</th>
                                <th scope="col">Issue Category</th>
                                <th scope="col">Issue Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>X122392</td>
                                <td>Bedroom</td>
                                <td>No wifi</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>X126233</td>
                                <td>Cafeteria</td>
                                <td>Broken Table</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a class="block">
                            <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">Confirm</button>
                            <a href="report-delete.html">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Report</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <div>2 reports deleted</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="report-deleted.html">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location='report-deleted.php'">Close</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
include_once 'footer.php';
?>

</html>