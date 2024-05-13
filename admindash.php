<?php
    include 'header.php';    
?>

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

<?php
include "dbconn.php";

// Your SQL query to get all row count
$sql = "SELECT COUNT(*) as count FROM acc";


// Your SQL query to get row count  Accounts

$sqlAccounts = "SELECT COUNT(*) as count FROM acc WHERE `status` = 'AtAccountsBr'";

// Your SQL query to get row count I&S BR

$sqlIT = "SELECT COUNT(*) as count FROM acc WHERE `status` = 'AtI&SBr'";


// Your SQL query to get row count DistrictTransffer

$sqlReturned = "SELECT COUNT(*) as count FROM acc WHERE `status` = 'Returned'";


//All Rows
$result = $con->query($sql);

//Files In Accounts
$resultAccounts = $con->query($sqlAccounts);

//Files With IT
$resultIT = $con->query($sqlIT);

//Files Returned
$resultReturned = $con->query($sqlReturned);


$rowCount = 0; // Row Count
$rowCountAccounts = 0; // Row Count With Record
$rowCountIT = 0; // Row Count Files With Clerk
$rowCountReturned = 0; // Row Count File District Transffered


if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();   
    $rowCount = $row['count'];    
}

if ($resultAccounts->num_rows > 0) {
    // Fetch the result as an associative array
    $rowAccounts = $resultAccounts->fetch_assoc();   
    $rowCountAccounts = $rowAccounts['count'];    
}

if ($resultIT->num_rows > 0) {
    // Fetch the result as an associative array
    $rowIT = $resultIT->fetch_assoc();   
    $rowCountIT = $rowIT['count'];    
}


if ($resultReturned->num_rows > 0) {
    // Fetch the result as an associative array
    $rowReturned = $resultReturned->fetch_assoc();   
    $rowCountReturned = $rowReturned['count'];    
}

// Close the connection
$con->close();
?>


<div class="container-fluid">    
    <div class="row mx-auto">
                        <!-- ADD Surety Record BUTTON -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="addRecord.php" style="text-decoration:none; color:white;font-weight:bold;" class="btn btn-success shadow rounded" data-aos="fade-left" >Add Surety Record</a>  
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EDIT Surety RECORD BUTTON -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="editRecord.php" style="text-decoration:none; color:white;font-weight:bold;" class="btn btn-success shadow rounded" data-aos="fade-up">Edit Surety Record</a>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GENERATE Surety REPORT BUTTON -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="search.php" style="text-decoration:none; color:white;font-weight:bold;" class="btn btn-success shadow rounded" data-aos="fade-down">Generate Surety Report</a>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PRINT RECEIPP BUTTON -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="receiptPrint.php" style="text-decoration:none; color:white;font-weight:bold;" class="btn btn-success shadow rounded" data-aos="fade-right" >Print Surety Receipt</a>  
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TOTAL TOTAL FILES IN RECORD -->
                    <div class="row mx-auto text-center mb-5">                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary fw-bold text-uppercase mb-1">
                                                Total Sureties IN Record</div>
                                                <a href="allrecord.php" style="color:green !important; text-decoration:none !important;">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $rowCount; ?>
                                                    </div>
                                                </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <!-- TOTAL CTC DELIVERED DISPLAY NUMBER CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success fw-bold text-uppercase mb-1">
                                                Total Sureties I&S-BR</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowCountAccounts; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL CTC PENDING DISPLAY NUMBER CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-danger fw-bold text-uppercase mb-1">Total Sureties Accounts-Br
                                            </div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowCountIT; ?>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- TOTAL CTC PENDING DISPLAY NUMBER CARD -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-danger fw-bold text-uppercase mb-1">Total Surety Returned
                                            </div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowCountReturned; ?>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- END ROW -->    

<!--Start line break -->
<br><br><br><br><br><br><br><br><br><br><br><br>
<!--End line break -->

<!-- footer Start PHP Include -->
<div class="row mx-auto mt-6">
    <div class="col-xl-12 col-md-6 mb-6">
        <?php
        include "footer.php";
        ?>
    </div>
</div>
<!-- footer End PHP Include -->

</body>
</html>

