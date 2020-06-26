<?php
function createButton($rating, $reportID,$status){
    switch($rating){
        case 0:
            #dropdown to choose the rating for the each issue
            if($status=='2'){
            return "<form action=\"ratingcheck.php\" method=\"post\">
            <select name=\"rateme\" id=\"rateme\">
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
              <option value='5'>5</option>
            </select>
            <input type=\"hidden\" name=\"reportID\" id=\"reportID\" value=$reportID>
            <input name=\"submitrating\" type=\"submit\" value=\"OK\">
          </form>";}
          elseif($status=='0' or $status=='1'){
              return "Unavailable";
          }
        case 1:
            return "<span class='fa fa-star checked'></span><span class='fa fa-star '></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
        case 2:
            return "<span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
        case 3:
            return "<span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
        case 4:
            return "<span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star'></span>";
        case 5:
            return "<span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

    }
}
function createStatus($status){
    switch($status){
        case 0:
            return "<button type='button' class='btn btn-danger btn-sm' disabled>Pending</button>";
        case 1:
            return "<button type='button' class='btn btn-warning btn-sm' disabled>In-progress</button>";
        case 2:
            return "<button type='button' class='btn btn-success btn-sm' disabled>Completed</button>";
    }
}

#DISPLAY the number of issues based on their corresponding status
function countIssue($status){
    error_reporting(0);
    $host = "localhost";
    $uname = "root";
    $pwd = "";
    $dbname = "ecollege";
  
    $con = new mysqli($host,$uname,$pwd,$dbname);
  
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

    $sql = "SELECT COUNT(status) FROM lodgereport WHERE email='".$_SESSION['email']."' AND status=$status ORDER BY dateLodged DESC ";
    $result = mysqli_query($con, $sql);
    $issues= reset(mysqli_fetch_array($result));
    echo $issues;
}
#to delete a pending status ONLY
function showDeleteBox($status,$id){
    switch($status){
        case 0:
            return "<td><a href=\"reportDeletion.php?id=".$id."\">Delete</a></td>";
        default:
            return "<td></td>";
    }
}
?>