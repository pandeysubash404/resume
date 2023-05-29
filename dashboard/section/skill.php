<?php
 
$id="";
$skill=$level="";
if(isset($_GET["id"]) || isset($_GET["updateId"])){
  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
  $results = mysqli_query($con, "SELECT * FROM skills WHERE id='$id'") or die;
  if($results->num_rows>0){
  $row = mysqli_fetch_array($results);
$id= $row['id'];
$skill = $row['skill'];
$level = $row['proficiency_level'];
  }
}
?>



<?php

// Retrieve data from the form educational
if(isset($_POST['skill'])){
    $skills = $_POST['skills'];
    $levels = $_POST['level'];
  
    foreach($skills as $key => $value) {
      $skill_value = mysqli_real_escape_string($con, $value);
      $level_value = mysqli_real_escape_string($con, $levels[$key]);

      if(isset($_GET['updateId'])){
        $qury="UPDATE `skills` SET skill='$skill_value', proficiency_level='$level_value' WHERE (`id` = '$id')";
                // Execute the SQL query
              if (mysqli_query($con, $qury)) {
                echo "Record updated successfully.";
              } else {
                echo "Error: " . mysqli_error($con);
              }
        }else{
          // Construct the SQL query
          $sql = "INSERT INTO skills (id,skill,proficiency_level) VALUES 
          ('$id', '$skill_value', '$level_value')";

          // Execute the SQL query
          if (mysqli_query($con, $sql)) {
              echo "Record inserted successfully.";
          } else {
              echo "Error: " . mysqli_error($con);
          }
       }
      }
   }
?>


<div class="mb-3 d-grid gap-2">
  <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Skill
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form4" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form4">
        <div class="card card-body">
            <form class="row g-3"  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validateSkill()" name="formSkill">
            <div class="col-12">
              <label for="skills" class="form-label">Skill</label>
              <input type="text" class="form-control" id="skills" name="skills[]" value='<?php echo $skill;?>'>
              <span id="skillError" class="text-danger"></span>
            </div>
            <div class="col-12">
              <label for="level" class="form-label">Level</label>
              <select class="form-select" aria-label="Default select example" name="level[]" value='<?php echo $level;?>'>
                <option value="Begniner" selected>Begniner</option>
                <option value="Intermidiate">Intermidiate</option>
                <option value="Professional">Professional</option>
              </select>
            </div>
            <div id="skillField"></div>
            <div class="pt-5">
            <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-3" onclick="addSkill()" style="width:200px;">+ Skill</button>
            </div>
            <div class="col-12">
        <button type="submit" name="skill" class="btn btn-primary">Next</button>
      </div>
         </form>
         
      </div>
      </div>
     </li>
  </ul>

  <script>
    
    function validateSkill() {
  var skill = document.forms["formSkill"]["skills"].value;
 
  if (skill == "") {
    document.getElementById("skillError").innerHTML = "Please enter a skill.";
    return false;
  } else if (!/^[ /ta-zA-Z]+$/i.test(skill)) {
    document.getElementById("skillError").innerHTML = "Please enter a string only";
    return false;
  } else {
    return true;
  } 
}


 // counter for unique field IDs
 var skillFieldCount = 0;

function addSkill() {
  // increment field counter
  skillFieldCount++;

  // create HTML for new skill form fields
  var skillFieldHTML = `
    <div class="row g-3 skill-field" id="skill-field-${skillFieldCount}">
      <div class="col-12">
        <label for="skill-${skillFieldCount}" class="form-label">Skill</label>
        <input type="text" class="form-control" id="skill-${skillFieldCount}" name="skills[]" value="">
        <span id="skillError-${skillFieldCount}" class="text-danger"></span>
      </div>

      <div class="col-12">
        <label for="level-${skillFieldCount}" class="form-label">Level</label>
        <select class="form-select" aria-label="Default select example" id="level-${skillFieldCount}" name="level[]" value="">
          <option value="Begniner" selected>Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Professional">Professional</option>
        </select>
      </div>

      <div class="col-md-12 text-end">
        <button type="button" class="btn btn-danger" onclick="removeSkillField(${skillFieldCount})">Remove</button>
      </div>
    </div>
  `;

  // insert new skill fields into DOM
  var skillFieldDiv = document.getElementById("skillField");
  skillFieldDiv.insertAdjacentHTML("beforeend", skillFieldHTML);
}

function removeSkillField(fieldCount) {
  // get skill field div to be removed
  var skillField = document.getElementById(`skill-field-${fieldCount}`);

  // remove skill field from DOM
  skillField.remove();
}



  </script>