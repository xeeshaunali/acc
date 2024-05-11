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
<?php include 'header.php';?>   

<div class="container-fluid">

    <h2 class="text-center text-success fw-bolder">Edit Surety File Status </h2>
    <!-- Search Edit Form Start -->
    <form action="editRecord.php" method="GET" class="text-center">
        <label for="search">Search by ID:</label>
        <input type="number" name="id" id="search" required class="shadow rounded form-select text-center">
        <button type="submit" class="btn btn-success btn-lg shadow rounded mt-5">Search</button>
    </form>
    <!-- Search Edit Form End -->

    <?php
    // Display the record for editing
    if (isset($_GET['id'])) {

        include "dbconn.php";
        $id = $_GET['id'];
        

        if ($con->connect_error) {
            die('Connection failed: ' . $con->connect_error);
        }

        // Fetch record based on ID
        $query = "SELECT * FROM acc WHERE id = $id";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Original Status of Surety File from Database:: " . $row['status'];
    ?>
            <!-- Edit Form -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <form action="save.php" method="POST" class="mb-1">
<div class="row mb-4">

          <div class="col-md-12"> <input hidden="hidden" type="text" name="id" value="<?php echo $row['id']; ?>"> </div>
          
<!-- Change Surety Status Start -->
          <div class="col-md-6">
          <label for="status" class="form-label fw-bold text-success">Surety File Status</label>
          <select id="status" name="status" class="form-select text-center shadow rounded" >   
            
            <option id="AtAccountsBr" value="AtAccountsBr" <?php echo ($row['status'] == 'AtAccountsBr') ? 'selected' : ''; ?>>With Accounts Branch</option>

            <option id="AtI&SBr" value="AtI&SBr" <?php echo ($row['status'] == 'AtI&SBr') ? 'selected' : ''; ?>>With I & S Branch</option>

            <option id="Returned" value="Returned" <?php echo ($row['status'] == 'Returned') ? 'selected' : ''; ?>>Surety Returned</option>            
          </select>
          </div> 
<!-- Change Surety Status End -->

          
          
<!-- Remarks Start-->
           <div class="col-md-6">
              <label for="remarks" class="form-label fw-bold text-success">Remarks</label>
              <input type="text" class="form-control text-center shadow rounded" name="remarks" id="remarks" value="<?php echo $row['remarks']; ?>">
          </div>
<!-- Remarks End-->   

<!-- Add other fields as needed -->



<!-- Start Update Surety Status Record button -->
<div class="row text-center">
    <div class="col-md-12 col-sm-12"><button type="submit" class="btn btn-danger btn-sm mt-3 mb-2 text-center fw-bold">Update Record</button></div>
</div>
<!-- Start Update Surety Status Record button -->

            
</div>            
</form>
                </div>

              </div>
            </div>
            
    <?php
        } else {
            echo "Record not found.";
        }

        $con->close();
    }
    ?>

<!-- Stops page data submission upon page refresh or submitting empty value START-->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!-- Stops page data submission upon page refresh or submitting empty value END -->


<div class="mt-6"><?php include("footer.php"); ?></div>



</body>
</html>


