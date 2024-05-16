<?php
include "dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    //$remarks = $_POST['remarks'];                    
    $suretyreturned = isset($_POST['suretyreturned']) ? $_POST['suretyreturned'] : NULL;

    // Prepare the SQL statement
    $query = "UPDATE acc SET status = '$status'";

    // Check if suretyreturned is provided
    if ($suretyreturned !== NULL) {
        // Check if suretyreturned is a valid date
        if (strtotime($suretyreturned) !== false) {
            // If suretyreturned is a valid date, include it in the query
            $query .= ", suretyreturned = '$suretyreturned'";
        } else {
            // If suretyreturned is not a valid date, set it to NULL in the query
            $query .= ", suretyreturned = NULL";
        }
    } else {
        // If suretyreturned is not provided, set it to NULL in the query
        $query .= ", suretyreturned = NULL";
    }

    $query .= " WHERE id = $id";

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