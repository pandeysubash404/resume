
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Example</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link href="css/dashboard.css" rel="stylesheet">
 
</head>
<body class="m-4">
    
<?php
 include("dashheader.php");
 include("../database.php");
?>
<?php
$id="";
$first_names= $middle_names=$last_names=$emails=$phone_numbers=$addresss=$address_2s=$citys=$states=$zip_codes="";
$user_ids=$education_levels=$schools=$cityss=$start_dates=$end_dates="";

$update=false;
if(isset($_GET["id"]) && !$_GET["id"]==""){
  $update=true;
  $id=$_GET["id"];
  $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die;
  if($results->num_rows>0){
  $row = mysqli_fetch_array($results);
$first_names= $row['first_name'];
$middle_names = $row['middle_name'];
$last_names= $row['last_name'];
$emails = $row['email'];
$phone_numbers = $row['phone_number'];
$addresss = $row['address'];
$address_2s =$row['address_2'];
$citys= $row['city'];
$states= $row['state'];
$zip_codes =$row['zip_code'];
  }
}
?>




<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="mb-3 d-grid gap-2">
       <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Personal Information
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form1" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <div class="collapse" id="form1">
        <div class="card card-body">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>?id=<?php echo $id;?>" method="POST" onsubmit="return validatePersonal()" name="formPersonal">
            <div class="row-4">
              <label for="resumeId" class="form-label">Resume ID</label>
              <input type="text" class="form-control" id="resumeId" name="resumeId" value='<?php echo $id;?>' <?php echo $id==''?"":"disabled"; ?>>
              <span id="resumeIdError" class="text-danger"></span>
            </div>
            <div class="col-md-4">
              <label for="inputNamel" class="form-label">First Name</label>
              <input type="text" class="form-control" id="inputNamel" name="first_name" value='<?php echo $first_names;?>'>
              <span id="inputNamelError" class="text-danger"></span>
            </div>
            <div class="col-md-4">
              <label for="inputName2" class="form-label">Middle Name</label>
              <input type="text" class="form-control" id="inputName2" name="middle_name" value='<?php echo $middle_names;?>'>
              <span id="inputName2Error" class="text-danger"></span>
            </div>
            <div class="col-md-4">
              <label for="inputName3" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="inputName3" name="last_name" value='<?php echo $last_names;?>'>
              <span id="inputName3Error" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
              <input type="text" class="form-control" id="inputEmail" name="email" value='<?php echo $emails;?>'>
              <span id="inputEmailError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputPhone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="inputPhone" name="phone_number" value='<?php echo $phone_numbers;?>'>
              <span id="inputPhoneError" class="text-danger"></span>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="inputAddress"  name="address" value='<?php echo $addresss;?>'>
              <span id="inputAddressError" class="text-danger"></span>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2"  name="address_2" value='<?php echo $address_2s;?>'>
              <span id="inputAddress2Error" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" id="inputCity" name="city" value='<?php echo $citys;?>'>
              <span id="inputCityError" class="text-danger"></span>
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">State</label>
              <select id="inputState" class="form-select" name="state" value='<?php echo $states;?>'>
                <option value="Lumbini" selected>Lumbini</option>
                <option value="Bagmati">Bagmati</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip" name="zip_code" value='<?php echo $zip_codes;?>'>
              <span id="inputZipError" class="text-danger"></span>
            </div>
            <div class="col-12">
        <button type="submit" name="personal" class="btn btn-primary">Next</button>
      </div>
         </form>
        </div>
      </div>
     </li>
  </ul>


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
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>?id=<?php echo $id;?>" method="POST" onsubmit="return validateEducation()">
            <div class="col-12">
              <label for="inputNamel" class="form-label">Education</label>
              <input type="text" class="form-control" id="inputNameln" name="education_levels" value='<?php echo $education_levels;?>'>
              <span id="inputZipError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label for="inputName2" class="form-label">School</label>
              <input type="text" class="form-control" id="inputName2" name="schools" value='<?php echo $schools;?>'>
              <span id="inputZipError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label for="inputName3" class="form-label">City</label>
              <input type="text" class="form-control" id="inputName3" name="citys" value='<?php echo $cityss;?>'>
              <span id="inputZipError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="inputEmail4" name="start_dates" value='<?php echo $start_dates;?>'>
              <span id="inputZipError" class="text-danger"></span>
            </div>
            <div class="col-md-6">
            <label for="inputPhone" class="form-label">End Date</label>
              <input type="date" class="form-control" id="inputPhone" name="end_dates" value='<?php echo $end_dates;?>'>
              <span id="inputZipError" class="text-danger"></span>
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
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return validateEmployement()">
            <div class="col-12">
              <label for="inputNamel" class="form-label">Position</label>
              <input type="text" class="form-control" id="inputNamel">
            </div>
            <div class="col-md-6">
              <label for="inputName2" class="form-label">Employer</label>
              <input type="text" class="form-control" id="inputName2">
            </div>
            <div class="col-md-6">
              <label for="inputName3" class="form-label">City</label>
              <input type="text" class="form-control" id="inputName3">
            </div>
            <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
            <label for="inputPhone" class="form-label">End Date</label>
              <input type="date" class="form-control" id="inputPhone">
            </div>
            <div id="employementField"></div>
            <div class="pt-5">
            <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-3" onclick="addEmployement()" style="width:200px;">+ Employement</button>
         </div>
            <div class="col-12">
        <button type="submit" name="employement" class="btn btn-primary">Next</button>
      </div>
         </form>
      </div>
      </div>
     </li>
  </ul>


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
            <form class="row g-3"  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return validateSkill()">
            <div class="col-12">
              <label for="inputNamel" class="form-label">Skill</label>
              <input type="text" class="form-control" id="inputNamel">
            </div>
            <div class="col-md-4">
              <label for="customRange2" class="form-label">Level</label>
              <input type="range" class="form-range" min="0" max="5" id="customRange2">
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
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return validateHobbies()">
            <div class="col-12">
              <label for="inputNamel" class="form-label">Hobbies</label>
              <input type="text" class="form-control" id="inputNamel">
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


            <div class="container flex flex-wrap -m-2 pt-5 pb-3">
            <div class="col-md-12"><form><div id="input-fields"> 
                  <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-4" onclick="addDateBirth()" style="width:200px;">+ Date of birth</button>
                  <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-4" onclick="addGender()" style="width:200px;">+ Gender</button>
                  <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-4" onclick="addWebsite()" style="width:200px;">+ Website</button>
                  <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-4" onclick="addLinkedin()" style="width:200px;">+ Linkedin</button>
                  <button type="button" class="btn btn-outline-primary add-field mb-3 p-2 ms-4" onclick="addCustom()" style="width:200px;">+ Custom</button>
               </div>
       <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
              </div>
            </div>
          </div>
  </div>
</div>

<?php
// Retrieve data from the form personal
if(isset($_POST['personal'])){
$id= mysqli_real_escape_string($con,isset($_POST['resumeId']) ? $_POST['resumeId'] : '10');
$first_name= mysqli_real_escape_string($con,isset($_POST['first_name']) ? $_POST['first_name'] : '');
$middle_name = mysqli_real_escape_string($con,isset($_POST['middle_name']) ? $_POST['middle_name'] : '');
$last_name= mysqli_real_escape_string($con,isset($_POST['last_name']) ? $_POST['last_name'] : '');
$email = mysqli_real_escape_string($con,isset($_POST['email']) ? $_POST['email'] : '');
$phone_number = mysqli_real_escape_string($con,isset($_POST['phone_number']) ? $_POST['phone_number'] : '');
$address = mysqli_real_escape_string($con,isset($_POST['address']) ? $_POST['address'] : '');
$address_2 =mysqli_real_escape_string($con,isset($_POST['address_2']) ? $_POST['address_2'] : '');
$city= mysqli_real_escape_string($con,isset($_POST['city']) ? $_POST['city'] : '');
$state= mysqli_real_escape_string($con,isset($_POST['state']) ? $_POST['state'] : '');
$zip_code = mysqli_real_escape_string($con,isset($_POST['zip_code']) ? $_POST['zip_code'] : '');

if($update==true){
  $qury="UPDATE `personal` SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', email='$email',phone_number='$phone_number' ,address='$address',address_2='$address_2',city='$city',state='$state',zip_code='$zip_code' WHERE (`id` = '$id')";
          // Execute the SQL query
        if (mysqli_query($con, $qury)) {
          echo "Record updated successfully.";
        } else {
          echo "Error: " . mysqli_error($con);
        }
}else{
  $mail=$_SESSION["email"];
// Construct the SQL query
$sql = "INSERT INTO personal (id,first_name, middle_name, last_name, email,phone_number ,address,address_2,city,state,zip_code,user_email) VALUES 
('$id','$first_name', '$middle_name', '$last_name', '$email','$phone_number' ,'$address','$address_2','$city','$state','$zip_code','$mail')";


// Execute the SQL query
if (mysqli_query($con, $sql)) {
    //Record inserted successfully.
    header("Location:field.php?id=".$id);
    exit(); 

} else {
    echo "Error: " . mysqli_error($con);
}
}
}
?>

<?php
// Retrieve data from the form educational
if(isset($_POST['education'])){
$education_level= mysqli_real_escape_string($con,isset($_POST['education_levels']) ? $_POST['education_levels'] : '');
$school = mysqli_real_escape_string($con,isset($_POST['schools']) ? $_POST['schools'] : '');
$city= mysqli_real_escape_string($con,isset($_POST['citys']) ? $_POST['citys'] : '');
$start_date = mysqli_real_escape_string($con,isset($_POST['start_dates']) ? $_POST['start_dates'] : '');
$end_date = mysqli_real_escape_string($con,isset($_POST['end_dates']) ? $_POST['end_dates'] : '');


// Construct the SQL query
$sql = "INSERT INTO education (user_id,education_level,school,city,start_date,end_date) VALUES 
('$id', '$education_level', '$school', '$city','$start_date','$end_date')";

// Execute the SQL query
if (mysqli_query($con, $sql)) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . mysqli_error($con);
}



// Close the database connection
mysqli_close($con);
}
?>


<script src="js/field.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


