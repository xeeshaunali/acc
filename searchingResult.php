<?php
include "dbconn.php"; // Include database connection

// Fetching search parameters from the URL
$crimeno = isset($_GET['crimeno']) ? $_GET['crimeno'] : '';
$crimeyear = isset($_GET['crimeyear']) ? $_GET['crimeyear'] : '';
$ps = isset($_GET['ps']) ? $_GET['ps'] : 'all';
$caseno = isset($_GET['caseno']) ? $_GET['caseno'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
$suretyname = isset($_GET['suretyname']) ? $_GET['suretyname'] : '';
$accused = isset($_GET['accused']) ? $_GET['accused'] : '';
$court_name = isset($_GET['courtname']) ? $_GET['courtname'] : 'all';
$status = isset($_GET['status']) ? $_GET['status'] : 'all';

// Build the SQL query based on the selected filters
$sql = "SELECT * FROM acc WHERE 1";

// Add conditions based on the provided filters
if ($ps !== 'all') {
    $sql .= " AND ps = '$ps'";
}

if (!empty($crimeno)) {
    $sql .= " AND crimeno = '$crimeno'";
}

if (!empty($crimeyear)) {
    $sql .= " AND crimeyear = '$crimeyear'";
}

if (!empty($caseno)) {
    $sql .= " AND caseno = '$caseno'";
}

if (!empty($year)) {
    $sql .= " AND year = '$year'";
}

if (!empty($suretyname)) {
    $sql .= " AND suretyname LIKE '%$suretyname%'";
}

if (!empty($accused)) {
    $sql .= " AND accused LIKE '%$accused%'";
}

if ($court_name !== 'all') {
    $sql .= " AND courtname = '$court_name'";
}

if ($status !== 'all') {
    $sql .= " AND status = '$status'";
}

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">   
    <script src="datatable/jquery-3.7.0.js"></script>
    <style>
        body{
            margin: 0 auto;
            padding: 0px;
        }
    </style>
    <style>
        /* Add a CSS rule to hide the button when printing */
        @media print {
            .print-button {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid mt-5">
    <h2 class="mb-4 text-center text-success fw-bolder">e-Record Room</h2>
    <h3 class="mb-4 text-center text-success fw-bolder">
        <?php
        if (isset($_GET['courtname'])) {
            $passedVariable = $_GET['courtname'];
            echo "Record of the: " . $passedVariable;
        } else {
            echo "No variable received.";
        }
        ?>
    </h3>
    <?php
    if ($result && $result->num_rows > 0) {
        ?>
        <table class="table table-striped bordered">
            <thead>
            <tr>
                <!-- Add table headers here based on your database columns -->
                <th>ID</th>                        
                <th>Court<br>Name</th>
                <th>Case<br>Categ</th>
                <th>Case<br>No</th>
                <th>Year</th>
                <th>PartyOne</th>
                <th>PartyTwo</th>
                <th>CrimeNo</th>
                <th>CrimeYear</th>
                <th>P.S</th>
                <th>Surety Accepted</th>
                <th>Surety Returned</th>                                                
                <th>Amount</th>                        
                <th>Status</th>
                <th>Remarks</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <!-- Add table data cells here based on your database columns -->
                    <td><?php echo $row["courtname"];?></td>
                    <td><?php echo $row["casecateg"];?></td>
                    <td><?php echo $row["caseno"];?></td>
                    <td><?php echo $row["year"];?></td>
                    <td><?php echo $row["suretyname"];?></td>
                    <td><?php echo $row["accused"];?></td>
                    <td><?php echo $row["crimeno"];?></td>
                    <td><?php echo $row["crimeyear"];?></td>
                    <td><?php echo $row["ps"];?></td>
                    <td><?php echo $row["suretyaccepted"];?></td>
                    <td><?php echo $row["suretyreturned"];?></td>                            
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["remarks"]; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No records found.";
    }

    $con->close();
    ?>
</div>

<div class="text-center mt-3 fw-bold">
    <div class="print-date">Printed on: <?php date_default_timezone_set('Asia/Karachi'); echo date('Y-m-d H:i:s'); 
    ?><br><br>
     <button class="btn btn-danger btn-lg shadow rounded print-button" onclick="printPage()">PRINT</button>
</div>                        
</div>

<script>
    // Function to print the page
    function printPage() {
        window.print();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
