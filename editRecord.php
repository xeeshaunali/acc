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

    <h2 class="text-center text-success fw-bolder">Edit Record File Status </h2>
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
        $query = "SELECT * FROM ctccc WHERE id = $id";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Original Status of Case from Database:: " . $row['status'];
    ?>
            <!-- Edit Form -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <form action="save.php" method="POST" class="mb-1">
<div class="row">

          <div class="col-md-12"> <input hidden="hidden" type="text" name="id" value="<?php echo $row['id']; ?>"> </div>
          

          <div class="col-md-3">
          <label for="status" class="form-label fw-bold text-success">Record Case Status</label>
          <select id="status" name="status" class="form-select text-center shadow rounded" >   

            <option id="DistrictTransffer" value="DistrictTransffer" <?php echo ($row['status'] == 'DistrictTransffer') ? 'selected' : ''; ?>>District Transffer</option>

            <option id="LyingWithRecord" value="LyingWithRecord" <?php echo ($row['status'] == 'LyingWithRecord') ? 'selected' : ''; ?>>Lying With Record</option>

            <option id="LyingWithClerk" value="LyingWithClerk" <?php echo ($row['status'] == 'LyingWithClerk') ? 'selected' : ''; ?>>Lying With Clerk</option>

            <option id="LyingWithOneWindow" value="LyingWithOneWindow" <?php echo ($row['status'] == 'LyingWithOneWindow') ? 'selected' : ''; ?>>Lying With One Window</option>
            <option id="RemandBack" value="RemandBack" <?php echo ($row['status'] == 'RemandBack') ? 'selected' : ''; ?>>Remand Back</option>
          </select>
          </div> 
          
          <div class="col-md-3">
          <label for="courtname" class="form-label fw-bold text-success" >Court Name</label>
          <select id="courtname" name="courtname" class="form-select text-center shadow rounded" >   

            <option id="DJ" value="DJ" <?php echo ($row['courtname'] == 'DJ') ? 'selected' : ''; ?>>DJ</option>

            <option id="ADJ-I" value="ADJ-I" <?php echo ($row['courtname'] == 'ADJ-I') ? 'selected' : ''; ?>>ADJ-I</option>

            <option id="ADJ-II" value="ADJ-II" <?php echo ($row['courtname'] == 'ADJ-II') ? 'selected' : ''; ?>>ADJ-II</option>

            <option id="ADJ-S" value="ADJ-S" <?php echo ($row['courtname'] == 'ADJ-S') ? 'selected' : ''; ?>>ADJ-S</option>
            <option id="SENIOR-I" value="SENIOR-I" <?php echo ($row['courtname'] == 'SENIOR-I') ? 'selected' : ''; ?>>Senior-I-Kotri</option>
          </select>
          </div>
          
          
          
          <div class="col-md-3">
          <label for="shelf" class="form-label fw-bold text-success">Shelf</label>
          <select id="shelf" name="shelf" class="form-select text-center shadow rounded" >   

            <option id="A" value="A" <?php echo ($row['shelf'] == 'A') ? 'selected' : ''; ?>>A</option>

            <option id="B" value="B" <?php echo ($row['shelf'] == 'B') ? 'selected' : ''; ?>>B</option>

            <option id="C" value="C" <?php echo ($row['shelf'] == 'C') ? 'selected' : ''; ?>>C</option>

            <option id="D" value="D" <?php echo ($row['shelf'] == 'D') ? 'selected' : ''; ?>>D</option>
            <option id="E" value="E" <?php echo ($row['shelf'] == 'E') ? 'selected' : ''; ?>>E</option>
            
            <option id="F" value="F" <?php echo ($row['shelf'] == 'F') ? 'selected' : ''; ?>>F</option>

            <option id="G" value="G" <?php echo ($row['shelf'] == 'G') ? 'selected' : ''; ?>>G</option>

            <option id="H" value="H" <?php echo ($row['shelf'] == 'H') ? 'selected' : ''; ?>>H</option>

            <option id="I" value="I" <?php echo ($row['shelf'] == 'I') ? 'selected' : ''; ?>>I</option>
            <option id="J" value="J" <?php echo ($row['shelf'] == 'J') ? 'selected' : ''; ?>>J</option>
            
          </select>
          </div>
          
          
          
           <div class="col-md-3">
              <label for="remarks" class="form-label fw-bold text-success">Remarks</label>
              <input type="text" class="form-control text-center shadow rounded" name="remarks" id="remarks" value="<?php echo $row['remarks']; ?>">
          </div>
          
          <div class="col-md-3">
              <label for="file" class="form-label fw-bold text-success">File No</label>
              <input type="text" class="form-control text-center shadow rounded" name="file" id="file" value="<?php echo $row['file']; ?>">
          </div>
          
          <div class="col-md-3">
              <label for="bundle" class="form-label fw-bold text-success">Bundle No</label>
              <input type="text" class="form-control text-center shadow rounded" name="bundle" id="bundle" value="<?php echo $row['bundle']; ?>">
          </div>
          
          <div class="col-md-3">
              <label for="underSection" class="form-label fw-bold text-success">Under Section</label>
              <input type="text" class="form-control text-center shadow rounded" name="underSection" id="underSection" value="<?php echo $row['underSection']; ?>">
          </div>
          
          
          
          

            
          
          
          
          
          

 

          
<!-- Add other fields as needed -->
<div class="row text-center">
    <div class="col-md-12 col-sm-12"><button type="submit" class="btn btn-danger btn-sm mt-3 mb-2 text-center fw-bold">Update Record</button></div>
</div>
            
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


