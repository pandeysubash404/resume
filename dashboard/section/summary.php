<?php
 
$id="";
$summaries="";
if(isset($_GET["id"]) || isset($_GET["updateId"])){
  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
  $resuls = mysqli_query($con, "SELECT * FROM summary WHERE id='$id'") or die;
  if($resuls->num_rows>0){
$row = mysqli_fetch_array($resuls);
$id= $row['id'];
$summaries = $row['summaries'];
//echo $summaries;
  }
}
?>



<?php

// Retrieve data from the form educational
if(isset($_POST['summary'])){
    $summar = mysqli_real_escape_string($con,isset($_POST['summaries']) ? $_POST['summaries'] : '');
  
    $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die();
    if($results->num_rows>0){
        if(isset($_GET['updateId'])){
          $qury="UPDATE `summary` SET summaries='$summar' WHERE (`id` = '$id')";
                  // Execute the SQL query
                if (mysqli_query($con, $qury)) {
                  echo "Record updated successfully.";
                } else {
                  echo "Error: " . mysqli_error($con);
                }
          }else{
                  // Construct the SQL query
                  $sql = "INSERT INTO summary (id,summaries) VALUES ('$id', '$summar')";

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
          Summary
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form6" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form6">
        <div class="card card-body" >
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validateSummary()" name="formSummary">
            <div class="col-12">
              <label for="summaries" class="form-label">Summary</label>
              <textarea type="text" class="form-control" id="summaries" name="summaries"><?php echo $summaries;?></textarea>
              <span id="summariesError" class="text-danger"></span>
            </div>
            <div class="col-12">
        <button type="submit" name="summary" class="btn btn-primary">Next</button>
      </div>
         </form>

         
      </div>
      </div>
     </li>
  </ul>

  <script>
    function validateSummary() {
  var summaries = document.forms["formSummary"]["summaries"].value;
  if (summaries == "") {
    document.getElementById("summariesError").innerHTML = "Please enter a summary.";
    return false;
  } else {
    return true;
  }
}
</script>