<?php 

include 'header.php';
// Define variables and initialize with empty values
$category = $type = $details = $location = "";
$category_err = $type_err = $details_err = $location_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate category
    if(empty($_POST["category"])){
        $category_err = "Please select the category";     
    }else{
        $category =$_POST["category"];
    }

    // Validate type
    if(empty($_POST["rep_type"])){
        $type_err = "Please select type of issue";     
    }else{
        $type =$_POST["rep_type"];
    }
    // Validate details
    if(empty($_POST["details"])){
        $details_err = "Please fill in the details";     
    }else{
        $details =$_POST["details"];
    }

    // Validate location
    if(empty($_POST["location"])){
        $location_err = "Please fill in the location";     
    }else{
        $location =$_POST["location"];
    }

    if(empty($category_err) && empty($type_err) && empty($details_err)&& empty($location_err)){
        include 'config.php';
            if (isset($_POST['reportcheck'])) {
            #require 'config.php';
            $host = "localhost";
            $uname = "root";
            $pwd = "";
            $dbname = "ecollege";
        
            $con = new mysqli($host,$uname,$pwd,$dbname);
        
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
                }
                echo "Database Connected successfully <br><br>";
        
                #set timezone to Kuala Lumpur in database  
            date_default_timezone_set('Asia/Kuala_Lumpur');
            
            #create random reportID
            $reportID = rand(10000000,99999999);
        
            #fetch matric number from user to make it as a primary key
            session_start();
            $matric=mysqli_query($con,"select matric from user_info where email = '{$_SESSION["email"]}'" );
            while($row = mysqli_fetch_array($matric)){
            $matricNo = $row['matric'];}
            $email = $_SESSION['email'];
            $category = $_POST['category'];
            $rep_type = $_POST['rep_type'];
            $details = $_POST['details'];
            $location = $_POST['location'];
            $category = $_POST['category'];
            $date = date("Y-m-d h:i:sa");
        
            $sql = "INSERT INTO lodgereport(reportID, matric, category, rep_type, details, rep_location,dateLodged, email) VALUES ('$reportID','$matricNo','$category', '$rep_type', '$details', '$location', '$date', '$email')";
            
            #insert data into db test, all columns need to be filled
            #$sql ="INSERT INTO test(category) VALUES ('$category')";
            if ($con->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            
            $con->close();
            header("Location: report-list.php");
            exit();
            }
            elseif(isset($_POST['cancel_report'])){
                header("Location: report-list.php");
            }}
}
?>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <p></p>
    <?php
    include 'config.php';
    ?>
    <div class="container rounded border-dark" style="background-color:#F5F5F5 ;">
        <p></p>
        <h3 class="text-center"><b>New Issue</b></h3>
        <p></p>
        <form>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">
                Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" readonly value=<?php
                    $fullname="";
                    $name=mysqli_query($con,"select fullname from user_info where email = '{$_SESSION['email']}'" );
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
                    $name=mysqli_query($con,"select matric from user_info where email = '{$_SESSION["email"]}'" );
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
                    $college=mysqli_query($con,"select r_college from user_info where email = '{$_SESSION["email"]}'" );
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
                    $phone=mysqli_query($con,"select phone from user_info where email = '{$_SESSION["email"]}'" );
                    while ($row = mysqli_fetch_array($phone)) {
                        echo $row['phone'];
                    }
                ?>>
                </div>
            </div>
            </form>
            <form action="report-new.php" method="post">
            <div class="form-group row">
                <label for="inputIssueCategory" class="col-sm-2 col-form-label
                <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>
                ">Issue Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category" value="<?php echo $category; ?>">
                        <option value="" disabled <?php if($category==""){echo "selected";} ?>>Select your issue category</option>
                        <option value="bedroom" <?php if($category=="bedroom"){echo "selected";} ?>>Bedroom</option>
                        <option value="cafeteria" <?php if($category=="cafeteria"){echo "selected";} ?>>Cafeteria</option>
                        <option value="toilet" <?php if($category=="toilet"){echo "selected";} ?>>Toilet</option>
                        <option value="corridor" <?php if($category=="corridor"){echo "selected";} ?>>Corridor</option>
                        <option value="lift" <?php if($category=="lift"){echo "selected";} ?>>Lift</option>
                        <option value="comittee room" <?php if($category=="comittee room"){echo "selected";} ?>>Comittee Room</option>
                      </select>
                      <span class="help-block"><?php echo $category_err; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputIssueType" class="col-sm-2 col-form-label
                <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>
                ">Issue Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="rep_type" value="<?php echo $type; ?>">
                        <option value="" disabled <?php if($type==""){echo "selected";} ?>>Select your issue type</option>
                        <option value="no-wifi" <?php if($type=="no-wifi"){echo "selected";} ?>>No wifi</option>
                        <option value="water-leaking" <?php if($type=="water-leaking"){echo "selected";} ?>>Water Leaking</option>
                        <option value="broken" <?php if($type=="broken"){echo "selected";} ?>>Broken Things</option>
                        <option value="aircond-prob" <?php if($type=="aircond-prob"){echo "selected";} ?>>Aircond-Problem</option>
                      </select>
                    <span class="help-block"><?php echo $type_err; ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDetails" class="col-sm-2 col-form-label
                <?php echo (!empty($details_err)) ? 'has-error' : ''; ?>
                ">Details</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describe the issue" value="<?php echo $details; ?>" name="details"></textarea>
                    <span class="help-block"><?php echo $details_err; ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-sm-2" for="inputLocation">Issue Location</label>
                <div class="col-sm-10
                <?php echo (!empty($details_err)) ? 'has-error' : ''; ?>
                ">
                    <input type="text" class="form-control" id="issue-location" placeholder="Enter the location" name="location" value="<?php echo $location; ?>">
                    <span class="help-block"><?php echo $location_err; ?></span>
                </div>
            </div>
            <br>
            <div class="text-center">
                <a class="block">
                    <button type="submit" name="reportcheck" class="btn btn-success">Submit</button>
                    <button href="reportlist.php" name="cancel_report" class="btn btn-danger">Cancel</button>
                </a>
            </div>
            <p><br><br></p>
        </form>
    </div>
</body>
<?php
include_once 'footer.php';
?>
</html>