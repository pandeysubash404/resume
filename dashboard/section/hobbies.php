<?php
 
$id="";
$hobbies="";
if(isset($_GET["id"]) || isset($_GET["updateId"])){
  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
  $results = mysqli_query($con, "SELECT * FROM hobbies WHERE id='$id'") or die;
  if($results->num_rows>0){
  $row = mysqli_fetch_array($results);
$id= $row['id'];
$hobbies = $row['hobbiesname'];
  }
}
?>



<?php

// Retrieve data from the form educational
if(isset($_POST['hobbies'])){
    $hobbies = $_POST['hobbie'];
  
    foreach($hobbies as $key => $value) {
      $hobbie_value = mysqli_real_escape_string($con, $value);

      $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die();
      if($results->num_rows>0){
        if(isset($_GET['updateId'])){
          $qury="UPDATE `hobbies` SET hobbiesname='$hobbie_value' WHERE (`id` = '$id')";
                  // Execute the SQL query
                if (mysqli_query($con, $qury)) {
                  echo "Record updated successfully.";
                } else {
                  echo "Error: " . mysqli_error($con);
                }
          }else{
                  // Construct the SQL query
                  $sql = "INSERT INTO hobbies (id,hobbiesname) VALUES ('$id', '$hobbie_value')";

                  // Execute the SQL query
                  if (mysqli_query($con, $sql)) {
                      echo "Record inserted successfully.";
                  } else {
                      echo "Error: " . mysqli_error($con);
                  }
            }  }
        }
   }
?>


<div class="mb-3 d-grid gap-2">
  <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Hobbies
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form5" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form5">
        <div class="card card-body" >
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validateHobbies()" name="formHobbies">
            <div class="col-12">
              <label for="hobbies" class="form-label">Hobbies</label>
              <input type="text" class="form-control" id="hobbies" name="hobbie[]" value='<?php echo $hobbies;?>'>
              <span id="hobbiesError" class="text-danger"></span>
            </div>
            <div id="hobbiesField"></div>
            <div class="pt-5">
            <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-3" onclick="addHobbies()" style="width:200px;">+ Hobbies</button>
         </div>
            <div class="col-12">
        <button type="submit" name="hobbies" class="btn btn-primary">Next</button>
      </div>
         </form>

         
      </div>
      </div>
     </li>
  </ul>

  <script>
    function validateHobbies() {
  var hobbies = document.forms["formHobbies"]["hobbie"].value;
  if (hobbies == "") {
    document.getElementById("hobbiesError").innerHTML = "Please enter a hobby.";
    return false;
  } else if (!/^[a-zA-Z\s]+$/.test(hobbies)) {
    document.getElementById("hobbiesError").innerHTML = "Please enter only letters and spaces.";
    return false;
  } else {
    return true;
  }
}

  // counter for unique field IDs
  var hobbiesFieldCount = 0;

  function addHobbies() {
    // increment field counter
    hobbiesFieldCount++;

    // create HTML for new hobbies form fields
    var hobbiesFieldHTML = `
      <div class="row g-3 skill-field" id="hobbies-field-${hobbiesFieldCount}">
        <div class="col-12">
          <label for="hobbies-${hobbiesFieldCount}" class="form-label">Hobbies</label>
          <input type="text" class="form-control" id="hobbies-${hobbiesFieldCount}" name="hobbie[]" value=''>
          <span id="hobbiesError-${hobbiesFieldCount}" class="text-danger"></span>
        </div>
        <div class="col-md-12 text-end">
          <button type="button" class="btn btn-danger" onclick="removeHobbiesField(${hobbiesFieldCount})">Remove</button>
        </div>
      </div>
    `;

    // insert new hobbies fields into DOM
    var hobbiesFieldDiv = document.getElementById("hobbiesField");
    hobbiesFieldDiv.insertAdjacentHTML("beforeend", hobbiesFieldHTML);
  }

  function removeHobbiesField(fieldCount) {
    // get hobbies field div to be removed
    var hobbiesField = document.getElementById(`hobbies-field-${fieldCount}`);

    // remove hobbies field from DOM
    hobbiesField.remove();
  }
</script>