<?php
$id="";
$user_ids=$education_levels=$schools=$cityss=$start_dates=$end_dates="";

if(isset($_GET["id"]) || isset($_GET["updateId"])){
  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
  $results = mysqli_query($con, "SELECT * FROM education WHERE id='$id'") or die;
  if($results->num_rows>0){
  $row = mysqli_fetch_array($results);
$user_ids= $row['id'];
$education_levels = $row['education_level'];
$schools = $row['school'];
$cityss = $row['city'];
$start_dates = $row['start_date'];
$end_dates =$row['end_date'];
  }
  }
?>



<?php

if(isset($_POST['education'])){
  $education_level = $_POST['education_levels'];
  $school = $_POST['schools'];
  $city = $_POST['cityss'];
  $start_date = $_POST['start_dates'];
  $end_date = $_POST['end_dates'];

  foreach($education_level as $key => $value) {
    $education_level_value = mysqli_real_escape_string($con, $value);
    $school_value = mysqli_real_escape_string($con, $school[$key]);
    $city_value = mysqli_real_escape_string($con, $city[$key]);
    $start_date_value = mysqli_real_escape_string($con, $start_date[$key]);
    $end_date_value = mysqli_real_escape_string($con, $end_date[$key]);

    $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die();
    if($results->num_rows>0){
      if(isset($_GET['updateId'])){
        $qury="UPDATE `education` SET education_level='$education_level_value', school='$school_value', city='$city_value', start_date='$start_date_value',end_date='$end_date_value' WHERE (`id` = '$id')";
                // Execute the SQL query
              if (mysqli_query($con, $qury)) {
                echo "Record updated successfully.";
              } else {
                echo "Error: " . mysqli_error($con);
              }
      }else{
      // Construct the SQL query
      $sql = "INSERT INTO education (id,education_level,school,city,start_date,end_date) VALUES 
      ('$id', '$education_level_value', '$school_value', '$city_value','$start_date_value','$end_date_value')";

            // Execute the SQL query
            if (mysqli_query($con, $sql)) {
                echo "Record inserted successfully.";
            } else {
                echo "Error: " . mysqli_error($con);
            }
          }
      }
    }
}
?>

<div class="mb-3 d-grid gap-2">
  <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Education
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form2" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form2">
        <div class="card card-body">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validateEducation()" name="formEducation">
                <div class="col-12">
                <label for="education_level" class="form-label">Education</label>
                <input type="text" class="form-control" id="education_level" name="education_levels[]" value='<?php echo $education_levels;?>'>
                <span id="education_levelsError" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                <label for="school" class="form-label">School</label>
                <input type="text" class="form-control" id="school" name="schools[]" value='<?php echo $schools;?>'>
                <span id="schoolsError" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                <label for="citye" class="form-label">City</label>
                <input type="text" class="form-control" id="citye" name="cityss[]" value='<?php echo $cityss;?>'>
                <span id="cityssError" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                <label for="start_dat" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_dat" name="start_dates[]" value='<?php echo $start_dates;?>'>
                <span id="start_datesError" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                <label for="end_dat" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_dat" name="end_dates[]" value='<?php echo $end_dates;?>'>
                <span id="end_datesError" class="text-danger"></span>
                </div>
                <div id="educationField"></div>
                <div class="pt-5">
                <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-3" onclick="addEducation()" style="width:200px;">+ Education</button>
                 </div>
                <div class="col-12">
                    <button type="submit" name="education" class="btn btn-primary">Next</button>
                </div>
         </form>
      </div>
      </div>
     </li>
  </ul>

  <script>
    function validateEducation() {
      var education_level = document.forms["formEducation"]["education_level"].value;
      var school = document.forms["formEducation"]["school"].value;
      var city = document.forms["formEducation"]["citye"].value;
      var start_date = document.forms["formEducation"]["start_dat"].value;
      var end_date = document.forms["formEducation"]["end_dat"].value;
     

      if (education_level == "") {
        document.getElementById("education_levelsError").innerHTML = "Please enter education level.";
        return false;
      }
    
      if (school == "") {
        document.getElementById("schoolsError").innerHTML = "Please enter  your schools name";
        return false;
      }else{
        if (!/^[ A-Za-z]*$/i.test(school)) {
        document.getElementById("schoolsError").innerHTML = "Please string only";
        return false;
      } 
    }
      if (city == "") {
        document.getElementById("cityssError").innerHTML = "Please enter school city.";
        return false;
      }
      if(end_date<start_date){
        document.getElementById("start_datesError").innerHTML = "Start date must be less than End date.";
        return false;
      }
      
    }

   // counter for unique field IDs
   var educationFieldCount = 0;

function addEducation() {
    // increment field counter
    educationFieldCount++;

    // create HTML for new education form fields
    var educationFieldHTML = `
        <div class="row g-3 education-field" id="education-field-${educationFieldCount}">
            <div class="col-12">
                <label for="education-${educationFieldCount}" class="form-label">Education</label>
                <input type="text" class="form-control" id="education-${educationFieldCount}" name="education_levels[]" value=''>
                <span id="education_levelsError-${educationFieldCount}" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="schools-${educationFieldCount}" class="form-label">School</label>
                <input type="text" class="form-control" id="schools-${educationFieldCount}" name="schools[]" value=''>
                <span id="schoolsError-${educationFieldCount}" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="cityss-${educationFieldCount}" class="form-label">City</label>
                <input type="text" class="form-control" id="cityss-${educationFieldCount}" name="cityss[]" value=''>
                <span id="cityssError-${educationFieldCount}" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="start_dates-${educationFieldCount}" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_dates-${educationFieldCount}" name="start_dates[]" value=''>
                <span id="start_datesError-${educationFieldCount}" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="end_dates" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_dates" name="end_dates[]" value=''>
                <span id="end_datesError" class="text-danger"></span>
            </div>
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-danger" onclick="removeEducationField(${educationFieldCount})">Remove</button>
            </div>
        </div>
    `;

    // insert new education fields into DOM
    var educationFieldDiv = document.getElementById("educationField");
    educationFieldDiv.insertAdjacentHTML("beforeend", educationFieldHTML);
}

function removeEducationField(fieldCount) {
    // get education field div to be removed
    var educationField = document.getElementById(`education-field-${fieldCount}`);

    // remove education field from DOM
    educationField.remove();
}

  </script>