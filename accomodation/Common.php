<?php
class Common
{
    public function getAllRecords($connection) {
        error_reporting(0);
        $query = "SELECT * FROM aplications WHERE email = '{$_SESSION["email"]}'";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
    public function deleteRecordById($connection,$id) {
        $query = "DELETE FROM aplications WHERE id='$id'";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }
}
