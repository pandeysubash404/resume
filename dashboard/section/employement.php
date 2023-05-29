<?php
 
$id="";
$positions=$company_names=$citysss=$start_datess=$end_datess="";
$operationInProgress=false;
if(isset($_GET["id"]) || isset($_GET["updateId"])){
  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
  $results = mysqli_query($con, "SELECT * FROM employment WHERE id='$id'") or die;
  if($results->num_rows>0){
  $row = mysqli_fetch_array($results);
$id= $row['id'];
$company_names = $row['company_name'];
$positions = $row['job_title'];
$citysss = $row['city'];
$start_datess = $row['start_date'];
$end_datess =$row['end_date'];
  }
}
?>



<?php
// Retrieve data from the form educational
if(isset($_POST['employment'])){
$position= mysqli_real_escape_string($con,isset($_POST['position']) ? $_POST['position'] : '');
$employer = mysqli_real_escape_string($con,isset($_POST['employer']) ? $_POST['employer'] : '');
$city= mysqli_real_escape_string($con,isset($_POST['inputCity']) ? $_POST['inputCity'] : '');
$start_date = mysqli_real_escape_string($con,isset($_POST['inputStartDate']) ? $_POST['inputStartDate'] : '');
$end_date = mysqli_real_escape_string($con,isset($_POST['inputEndDate']) ? $_POST['inputEndDate'] : '');

if(isset($_GET['updateId'])){
  $qury="UPDATE `employment` SET company_name='$employer', job_title='$position', city='$city', start_date='$start_date',end_date='$end_date' WHERE (`id` = '$id')";
          // Execute the SQL query
        if (mysqli_query($con, $qury)) {
          echo "Record updated successfully.";
        } else {
          echo "Error: " . mysqli_error($con);
        }
  }else{
  // Construct the SQL query
  $sql = "INSERT INTO employment (id,company_name,job_title,city,start_date,end_date) VALUES 
  ('$id', '$employer', '$position', '$city','$start_date','$end_date')";

        // Execute the SQL query
        if (mysqli_query($con, $sql)) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
  }
?>

<div class="mb-3 d-grid gap-2">
  <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Employement
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form3" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form3">
        <div class="card card-body">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validateEmployement()" name="formEmployement">
            <div class="col-12">
              <label for="position" class="form-label">Position</label>
              <input type="text" class="form-control" id="position" name="position" value='<?php echo $positions;?>'>
              <span id="positionError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label for="employer" class="form-label">Employer</label>
              <input type="text" class="form-control" id="employer" name="employer" value='<?php echo $company_names;?>'>
              <span id="employerError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" id="inputCity" name="inputCity" value='<?php echo $citysss;?>'>
              <span id="inputCityError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputStartDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="inputStartDate" name="inputStartDate" value='<?php echo $start_datess;?>'>
              <span id="inputStartDateError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputEndDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="inputEndDate" name="inputEndDate" value='<?php echo $end_datess;?>'>
              <span id="inputEndDateError" class="text-danger"></span>
            </div>
            <div id="employementField"></div>
            <div class="pt-5">
            <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-3" onclick="addEmployement()" style="width:200px;">+ Employement</button>
         </div>
            <div class="col-12">
        <button type="submit" name="employment" class="btn btn-primary">Next</button>
      </div>
         </form>
      </div>
      </div>
     </li>
  </ul>

  <script>
    function validateEmployement() {
      var position = document.forms["formEmployement"]["position"].value;
      var employer = document.forms["formEmployement"]["employer"].value;
      var city = document.forms["formEmployement"]["inputCity"].value;
      var start_date = document.forms["formEmployement"]["inputStartDate"].value;
      var end_date = document.forms["formEmployement"]["inputEndDate"].value;
     

      if (position == "") {
        document.getElementById("positionError").innerHTML = "Please enter position level.";
        return false;
      }else{
        if (!/^[a-zA-Z]+$/i.test(position)) {
        document.getElementById("positionError").innerHTML = "Please string only";
        return false;
      } 
    }
    
      if (employer == "") {
        document.getElementById("employerError").innerHTML = "Please enter your employer name";
        return false;
      }else{
        if (!/^[ A-Za-z]*$/i.test(employer)) {
        document.getElementById("employerError").innerHTML = "Please string only";
        return false;
      } 
    }
      if (city == "") {
        document.getElementById("inputCityError").innerHTML = "Please enter school city.";
        return false;
      }
      if(end_date<start_date){
        document.getElementById("inputStartDateError").innerHTML = "Start date must be less than End date.";
        return false;
      }
      
    }

  </script>