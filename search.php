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
<!-- Header Start -->
<?php include 'header.php';?>   
<!-- Header End -->


<div class="container mt-5">
    <h2 class="mb-4">Generate Surety Report or Search Surety</h2>
    <form action="searchResult.php" method="GET" id="myForm">
        <div class="row mb-3">

  <!-- Surety Accepted From Date Start -->
  <div class="col-md-3">
    <label for="date" class="form-label">Surety Accepted Start Date</label>
    <input type="date" class="form-control text-center shadow rounded" name="start_date" id="start_date">
  </div>
  <!-- Surety Accepted From Date End -->

  <!-- Surety Accepted End Date Start -->
  <div class="col-md-3">
    <label for="date" class="form-label">Surety Accepted End Date</label>
    <input type="date" class="form-control text-center shadow rounded" name="end_date" id="end_date">
  </div>
  <!-- Surety Accepted End Date End -->

<!-- Case Number Start -->
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Case Number</label>
    <input type="number" class="form-control text-center shadow rounded" id="inputPassword4" name="caseno">
  </div>
  <!-- Case Number End -->

  <!-- Case Year Start -->
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Case Year</label>
    <input type="number" class="form-control text-center shadow rounded" id="inputPassword4" name="year">
  </div>
  <!-- Case Year End -->

<!-- Crime No Start -->
   <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Crime Number</label>
    <input type="number" class="form-control text-center shadow rounded" name="crimeno" id="inputPassword4">
   </div>
<!-- Crime No End -->

<!-- Crime Year Start -->
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Crime Year</label>
    <input type="number" class="form-control text-center shadow rounded" name="crimeyear" id="inputPassword4">
  </div>
  <!-- Crime Year End -->

<!-- Police Station Start -->
   <div class="col-md-3">
    <label for="inputSyaye" class="form-label">Police Station</label>
    <select id="ps" class="form-select text-center shadow rounded" name="ps" >
    <option selected value="all">ALL</option>      
      <option value="Jamshoro">Jamshoro</option>
      <option value="Kotri">Kotri</option>      
      <option value="Railway">Railway</option>
      <option value="Excise & ANF">Excise & ANF</option>
      <option value="Sehwan">Sehwan</option>
      <option value="Looni Kot">Looni Kot</option>      
      <option value="Bhaan Saeedabad">Bhaan Saeedabad</option>
      <option value="Manjhand">Manjhand</option>
      <option value="Nooriabad">Nooriabad</option>
      <option value="Chachar">Chachar</option>
      <option value="Coal Mines">Coal Mines</option>
      <option value="Khanoth">Khanoth</option>
      <option value="Budhapur">Budhapur</option>
      <option value="Thebat">Thebat</option>
      <option value="Rajri">Rajri</option>
      <option value="Naing Sharif">Naing Sharif</option>
      <option value="Amri">Amri</option>
      <option value="Mahi Otho">Mahi Otho</option>
      <option value="Khero Dero">Khero Dero</option>
      <option value="Jhangara">Jhangara</option>
      <option value="Thano Bula Khan">Thano Bula Khan</option>
      <option value="Budhapur">Budhapur</option>
      <option value="other">Other PS</option>
      <option value="NILL">Nill</option>
    </select>
  </div>
  <!-- Police Station End -->

  <!-- Surety Name Start -->
  <div class="col-md-3">
    <label for="inputAddress" class="form-label">Surety Name</label>
    <input type="text" class="form-control text-center shadow rounded" id="inputAddress" name="suretyname">
  </div>
  <!-- Surety Name End -->

  <!-- Accused Name Start -->
  <div class="col-md-3">
    <label for="inputAddress2" class="form-label">Accused Name</label>
    <input type="text" class="form-control text-center shadow rounded" id="inputAddress2" name="accused">
  </div>
  <!-- Accused Name End -->


        <!-- Court Name Start -->            
   <div class="col-md-3">
                <label for="courtname" class="form-label ">Court Name:</label>
                <select name="courtname" id="courtname" class="form-select text-center shadow rounded">
                <option selected value="all">ALL</option>
                <option value="DJ">District & Sessions Court JSO</option>
                <option value="ADJ-I">Additional Court-I, Kotri</option>
                <option value="ADJ-II">Additional Court-II, Kotri</option>
                <option value="ADJ-S">Additional Court, Sehwan</option>
                <!--<option value="SENIOR-I">Senior / Assistant Sessions Court-I, Kotri</option>-->
                <!--<option value="SENIOR-II">Senior / Assistant Sessions Court-II, Kotri</option>-->
                <!--<option value="SENIOR-S">Senior / Assistant Sessions Court, Sehwan</option>-->
                <!--<option value="CJJM-I-K">Civil Court-I, Kotri</option>-->
                <!--<option value="CJJM-II-K">Civil Court-II, Kotri</option>-->
                <!--<option value="CJJM-CONSUMER">Consumer Protection Court</option>-->
                <!--<option value="CJJM-FAMILY">Family Court JSO</option>-->
                <!--<option value="CJJM-I-S">Civil Court-I, Sehwan</option>-->
                <!--<option value="CJJM-II-S">Civil Court-II, Sehwan</option>-->
                <!-- <option value="CJJM-III-TBK">Civil Court-III, Sehwan @ TBK</option> -->
                <!--<option value="CJJM-MANJHAND">Civil Court Manjhand</option>                 -->
                </select>
   </div>
    <!-- Court Name End -->

    <!-- Surety Status Start -->
            <div class="col-md-4">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select text-center shadow rounded">
                <option selected value="all">All</option>
                    <option value="AtAccountsBr">With Accounts Br</option>
                    <option value="AtI&SBr">With I&S Br</option>
                    <option value="Returned">Surety Returned</option>
                </select>
            </div>
        <!-- Surety Status End -->


           

             
        </div>

        <!-- Search Button Start-->
        <div class="row mb-3 text-center">            
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-lg mt-2">Search</button>
            </div>
        </div>
        <!-- Search Button Start-->

        
    </form>
    <!-- Form End -->
</div>

<script>
    // Set the content of the new window
    printWindow.document.body.innerHTML = tableDataString;
</script>

<!-- Stops page data submission upon page refresh or submitting empty value START-->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
<!-- Stops page data submission upon page refresh or submitting empty value END -->


<div><?php include("footer.php"); ?></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-eUHJ3A5Cf7pyRffLZ/Dagx3lfUq76EdW8eN7eUtjhKp5AR6Vr+Qe4izfcSeJfBA" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-eUHJ3A5Cf7pyRffLZ/Dagx3lfUq76EdW8eN7eUtjhKp5AR6Vr+Qe4izfcSeJfBA" crossorigin="anonymous"></script>


</body>
</html>
