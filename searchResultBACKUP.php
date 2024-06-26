<?php
session_start();
if(isset($_SESSION['uid']))
{

}
else
{
    header('location:login.php');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5uoF0Zl3+kv4o5C/gSA4gEhqU7TWq18LDnZwiabtGUpJ3pi5P3BYWBn2bvy5+J" crossorigin="anonymous">
    <title>Search Results</title>
    <style>
            tr th {
                border:2px solid black !important;
                text-align: center;             
            }
            td {
                border: 2px solid black;
                text-align: center;
                padding-top: 1px !important;
                padding-bottom:3px !important;


            }
    </style>
</head>
<body>

<div class="container-fluid mt-5">
    <h2 class="mb-4 text-center text-success fw-bolder">CASE DETAILS / E-RECORD ROOM</h2>
    <div class="row text-center">
        
                <h1 class="text-center">
                    District & Sessions Court Jamshoro<br>
                    <script>
                    var dj = '<?php echo isset($court_name) ?$court_name : "Undefined";
                    ?>';
                                       
                        
                    //document.write(dj);
                    // TO WRITE HEADING OF COURT ON PRINT PAGE ON SEARCHRESULT.PHP  
                    if(dj == "DJ"){
                        document.write("DISTRICT & SESSIONS COURT JAMSHORO");        
                    } 
                    else if (dj == "ADJ-I"){
                        document.write("ADDITIONAL DISTRICT & SESSIONS COURT-I KOTRI");
                    }
                    else if (dj == "ADJ-II"){
                        document.write("ADDITIONAL DISTRICT & SESSIONS COURT-II KOTRI");
                    }
                    else if (dj == "ADJ-S"){
                        document.write("ADDITIONAL DISTRICT & SESSIONS COURT SEHWAN");
                    }
                    else if (dj == "CJJM-III-TBK"){
                        document.write("CIVIL JUDGE & JUDICIAL MAGISTRATE SEHWAN-III AT THANO BULA KHAN");
                    }
                    else if (dj == "SENIOR-I"){
                        document.write("SENIOR / ASSISTANT SESSIONS COURT-I KOTRI");
                    }
                    else if (dj == "SENIOR-II"){
                        document.write("SENIOR / ASSISTANT SESSIONS COURT-II KOTRI");
                    }
                    else if (dj == "SENIOR-S"){
                        document.write("SENIOR / ASSISTANT SESSIONS COURT SEHWAN");
                    }
                    else if (dj == "CJJM-I-K"){
                        document.write("CIVIL COURT-I KOTRI");
                    }
                    else if (dj == "CJJM-II-K"){
                        document.write("CIVIL COURT-II KOTRI");
                    }
                    else if (dj == "CJJM-CONSUMER"){
                        document.write("CONSUMER PROTECTION COURT JAMSHORO");
                    }
                    else if (dj == "CJJM-FAMILY"){
                        document.write("CJJM / FAMILY COURT JAMSHORO");
                    }
                    else if (dj == "CJJM-I-S"){
                        document.write("CIVIL COURT-I SEHWAN");
                    }
                    else if (dj == "CJJM-II-S"){
                        document.write("CIVIL COURT-II SEHWAN");
                    }
                    else if (dj == "CJJM-MANJHAND"){
                        document.write("CIVIL COURT MANJHAND");
                    }
                    else if (dj == "all"){
                        document.write("DISTRICT & SESSIONS COURT JAMSHORO HQ");
                    }
                </script>
                </h1>
                    

                
                
        <div class="col-md-12">
            <h4 class="">Court Name: <?php echo $court_name;?></h4>
        </div>
        <!-- <div class="col-md-4">
            <h4 class="">Shelf: <?php // echo $shelf;?></h4>
        </div> -->
        <!-- <div class="col-md-4">
            <h4 class="">Bundle No: <?php // echo $bundle;?></h4>
        </div> -->
    </div>
    
    <?php
     if ($result && $result->num_rows > 0) {
        ?>
        <table class="table table-striped bordered">
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
                        <th>Remarks</th>
                        
                       
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
</div>

    <div class="text-center mt-3 fw-bold">
            <div class="print-date">Printed on: <?php date_default_timezone_set('Asia/Karachi'); echo date('Y-m-d H:i:s'); 
            ?><br><br>
             <button class="btn btn-danger btn-lg shadow rounded print-button" onclick="printPage()">PRINT</button>
    </div>
                        
    </div> 


<div><?php include("footer.php"); ?></div>

<script>
    // Function to print the page
    function printPage() {        
        window.print();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-eUHJ3A5Cf7pyRffLZ/Dagx3lfUq76EdW8eN7eUtjhKp5AR6Vr+Qe4izfcSeJfBA" crossorigin="anonymous"></script>
</body>
</html>
