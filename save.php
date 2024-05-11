<?php
include "dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];                    
    $suretyreturned = $_POST['suretyreturned'];
    

    $query = "UPDATE acc SET status = '$status', remarks = '$remarks', suretyreturned = '$suretyreturned'  WHERE id = $id";

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
