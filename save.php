<?php
include "dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $file = $_POST['file'];
    $bundle = $_POST['bundle'];
    $shelf = $_POST['shelf'];
    $courtname = $_POST['courtname'];
    $underSection = $_POST['underSection'];
    

    $query = "UPDATE ctccc SET status = '$status', remarks = '$remarks', file='$file', bundle='$bundle', shelf='$shelf', courtname='$courtname', underSection='$underSection'  WHERE id = $id";

    if ($con->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
} else {
    echo "Invalid request";
}
?>
