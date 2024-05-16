<?php
session_start();
if(!isset($_SESSION['uid'])) {
    header('location:login.php');
    exit(); // stop execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">   
    <script src="datatable/jquery-3.7.0.js"></script>
    <style>
        body{
            margin: 0 auto;
            padding: 0px;
        }
        .print-date {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
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
    
    <title>E-Surety || CTC</title>
</head>
<body>

<?php
// Your database connection code here
include "dbconn.php";

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$crimeno = isset($_GET['crimeno']) ? $_GET['crimeno'] :'';
$crimeyear = isset($_GET['crimeyear']) ? $_GET['crimeyear'] :'';
$ps = isset($_GET['ps']) ? $_GET['ps'] : 'all';
$caseno = isset($_GET['caseno']) ? $_GET['caseno'] :'';
$year = isset($_GET['year']) ? $_GET['year'] :'';
$suretyname = isset($_GET['suretyname']) ? $_GET['suretyname'] :'';
$cnic = isset($_GET['cnic']) ? $_GET['cnic'] :'';
$accused = isset($_GET['accused']) ? $_GET['accused'] :'';
$court_name = isset($_GET['courtname']) ? $_GET['courtname'] : 'all';
$status = isset($_GET['status']) ? $_GET['status'] : 'all';
$underSection = isset($_GET['underSection']) ? $_GET['underSection'] : '';


// Build the SQL query based on the selected filters
$sql = "SELECT * FROM acc WHERE 1";

// Add conditions based on the provided filters
if (!empty($start_date) && !empty($end_date)) {
    $sql .= " AND suretyaccepted BETWEEN '$start_date' AND '$end_date'";    
}


// Filter by Police Station
if ($ps !== 'all') {
    $sql .= " AND ps = '$ps'";
}

// Filter by Crime Number
if (!empty($crimeno)) {
    $sql .= " AND crimeno = '$crimeno'";
}

// Filter by Crime Year
if (!empty($crimeyear)) {
    $sql .= " AND crimeyear = '$crimeyear'";
}

// Filter by Case Number
if (!empty($caseno)) {
    $sql .= " AND caseno = '$caseno'";
}

// Filter by Case Year
if (!empty($year)) {
    $sql .= " AND year = '$year'";
}


// Filter by Surety Name
if (!empty($suretyname)) {
    $sql .= " AND suretyname like '%$suretyname%'";
}


// Filter by CNIC Number
if (!empty($cnic)) {
    $sql .= " AND cnic = '$cnic'";
}


// Filter by Accused
if (!empty($accused)) {
    $sql .= " AND accused like '%$accused%'";
}




// Filter by Court Name
if ($court_name !== 'all') {
    $sql .= " AND courtname = '$court_name'";
}

// Filter by Status
if ($status !== 'all') {
    $sql .= " AND status = '$status'";
}


// Filter by UnderSection
if (!empty($underSection)) {
    $sql .= " AND underSection like '%$underSection%'";
}

// Add the ORDER BY clause
$sql .= " ORDER BY file ASC";


$result = $con->query($sql);
?>

<div class="container-fluid mt-5">
    <h2 class="mb-4 text-center text-success fw-bolder">SURETY DETAILS DETAILS / E-SURETY</h2>
    <div class="row text-center">
        <h1 class="text-center">
            District & Sessions Court Jamshoro<br>
            <script>
                var dj = '<?php echo isset($court_name) ?$court_name : "Undefined"; ?>';

                //document.write(dj);
                // TO WRITE HEADING OF COURT ON PRINT PAGE ON SEARCHRESULT.PHP  
                if(dj == "DJ"){
                    document.write("DISTRICT & SESSIONS COURT JAMSHORO");        
                } 
                else if (dj == "ADJ-I"){
                    document.write("ADDITIONAL DISTRICT & SESSIONS COURT-I KOTRI");
                }
                // add other court names if needed

            </script>
        </h1>
        <div class="col-md-12">
            <h4 class="">Court Name: <?php echo $court_name;?></h4>
        </div>
    </div>
    
    <?php
     if ($result && $result->num_rows > 0) {
        ?>
        <table class="table  bordered">
            <thead>
            <tr>                     
                <th>ID</th>
                <th>Surety Name</th>
                <th>cnic</th>                        
                <th>Accused</th>                        
                <th>Court<br>Name</th>
                <th>Case<br>Categ</th>
                <th>Case<br>No</th>
                <th>Year</th>
                <th>CrimeNo</th>
                <th>CrimeYear</th>
                <th>P.S</th>
                <th>Under Section</th>
                <th>Surety Accpeted</th>
                <th>Returned</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Details</th>                   
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>                           
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["suretyname"]; ?></td>
                    <td><?php echo $row["cnic"]; ?></td>
                    <td><?php echo $row["accused"]; ?></td>
                    <td><?php echo $row["courtname"]; ?></td>
                    <td><?php echo $row["casecateg"]; ?></td>
                    <td><?php echo $row["caseno"]; ?></td>
                    <td><?php echo $row["year"]; ?></td>
                    <td><?php echo $row["crimeno"]; ?></td>
                    <td><?php echo $row["crimeyear"]; ?></td>
                    <td><?php echo $row["ps"]; ?></td>
                    <td><?php echo $row["underSection"]; ?></td>
                    <td><?php echo $row["suretyaccepted"]; ?></td>
                    <td><?php echo $row["suretyreturned"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["remarks"]; ?></td>                     
                </tr>
                <?php
            }
            mysqli_free_result($result);
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No records found.";
    }
    $con->close();
    ?>
    <div class="text-center"><button class="btn btn-danger btn-lg shadow rounded print-button" onclick="printPage()">PRINT</button></div>
    
</div>

<div class="text-center mt-1 fw-bold mb-5">
    <!-- Display Current Month and year of System -->
    <div class="print-date"><?php // echo date('F Y'); ?><br><br>
    <!-- <button class="btn btn-danger btn-lg shadow rounded print-button" onclick="printPage()">PRINT</button> -->
    </div>                        
</div>

<div><?php include("footer.php"); ?></div>


<script>
    // Function to print the page
    function printPage() {
        var startDate = '<?php echo isset($_GET["start_date"]) ? $_GET["start_date"] : "" ?>';
        var endDate = '<?php echo isset($_GET["end_date"]) ? $_GET["end_date"] : "" ?>';
        
        // Define an array to map month numbers to month names
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        // Check if the dates are not empty
        if(startDate !== '' && endDate !== '') {
            // Extracting month and year from the start date
            var startMonth = parseInt(startDate.split('-')[1]);
            var startYear = startDate.split('-')[0];
            // Extracting month and year from the end date
            var endMonth = parseInt(endDate.split('-')[1]);
            var endYear = endDate.split('-')[0];

            // Creating strings to display the month and year
            var startMonthYear = monthNames[startMonth - 1] + ' ' + startYear;
            var endMonthYear = monthNames[endMonth - 1] + ' ' + endYear;

            // Creating a string to display the month and year range
            var dateStr = "MONTH AND YEAR: " + startMonthYear + " to " + endMonthYear + "<br><br>";
            dateStr += "<?php date_default_timezone_set('Asia/Karachi'); echo date('Y-m-d H:i:s'); ?>";
            document.querySelector('.print-date').innerHTML = dateStr;
        } else {
            // If dates are empty, display a default message
            document.querySelector('.print-date').innerHTML = "Printed on: <?php echo date('F Y'); ?><br><br>";
        }
        window.print();
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-eUHJ3A5Cf7pyRffLZ/Dagx3lfUq76EdW8eN7eUtjhKp5AR6Vr+Qe4izfcSeJfBA" crossorigin="anonymous"></script>
</body>
</html>
