<?php
$id=$err="";
$first_names= $middle_names=$last_names=$emails=$phone_numbers=$addresss=$address_2s=$citys=$states=$zip_codes="";

if(isset($_GET["id"]) || isset($_GET["updateId"])){

  $id=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
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


<?php
// Retrieve data from the form personal
if(isset($_POST['personal'])){
$id= mysqli_real_escape_string($con,isset($_POST['resumeId']) ? $_POST['resumeId'] :$_GET['updateId']);
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

if(isset($_GET['updateId'])){
  echo "Hiiiiii";
  $idd=$_GET['updateId'];
  $qury="UPDATE personal SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', email='$email',phone_number='$phone_number' ,address='$address',address_2='$address_2',city='$city',state='$state',zip_code='$zip_code' WHERE id='$idd' ";
          // Execute the SQL query
        if (mysqli_query($con, $qury)) {
          echo "Record updated successfully.";
         // header("Location:test.php?updateId=$idd");
        } else {
          echo "Error: " . mysqli_error($con);
        }
}else{
  $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die;
  if(!$results->num_rows>0){
  $mail=$_SESSION["email"];
// Construct the SQL query
$sql = "INSERT INTO personal (id,first_name, middle_name, last_name, email,phone_number ,address,address_2,city,state,zip_code,user_email) VALUES 
('$id','$first_name', '$middle_name', '$last_name', '$email','$phone_number' ,'$address','$address_2','$city','$state','$zip_code','$mail')";


// Execute the SQL query
if (mysqli_query($con, $sql)) {
  echo "Record inserted successfully.";
   header("Location:test.php?id=".$id);
    exit(); 

} else {
    echo "Error: " . mysqli_error($con);
    }}else{
      $err="The Resume ID ".$id." has been already taken !";
      $id="";
    }
  }
}
?>

<div class="mb-3 d-grid gap-2">
       <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Personal Information
          <span class="badge bg-primary">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form1" aria-expanded="false" aria-controls="form1">
          +
        </button></span>
      </div>
      <!-- ?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php //echo $id;?> -->
      <div class="collapse" id="form1">
        <div class="card card-body">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>?<?php echo isset($_GET['updateId'])?"updateId":"id"; ?>=<?php echo $id;?>" method="POST" onsubmit="return validatePersonal()" name="formPersonal">
            <div class="row-4">
              <label for="resumeId" class="form-label">Resume ID</label>
              <input type="text" class="form-control" id="resumeId" name="resumeId" value='<?php echo $id;?>' <?php echo $id==''?"":"disabled"; ?>>
              <span id="resumeIdError" class="text-danger"><?php echo $err;?></span>
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
              <label for="inputState" class="form-label">Zone</label>
              <input type="text" class="form-control" id="inputState" name="state" value='<?php echo $states;?>'>
              <span id="inputStateError" class="text-danger"></span>
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

  <script>
    function validatePersonal() {
      var resumeid = document.forms["formPersonal"]["resumeId"].value;
      var fname = document.forms["formPersonal"]["inputNamel"].value;
      var mname = document.forms["formPersonal"]["inputName2"].value;
      var lname = document.forms["formPersonal"]["inputName3"].value;
      var email = document.forms["formPersonal"]["inputEmail"].value;
      var phone = document.forms["formPersonal"]["inputPhone"].value;
      var address = document.forms["formPersonal"]["inputAddress"].value;
      var address2 = document.forms["formPersonal"]["inputAddress2"].value;
      var zone = document.forms["formPersonal"]["inputState"].value;
      var city = document.forms["formPersonal"]["inputCity"].value;
      var zip = document.forms["formPersonal"]["inputZip"].value;

      if (resumeid == "") {
        document.getElementById("resumeIdError").innerHTML = "Please enter resume id";
        return false;
      }else{
        if (!/^[0-9]+$/.test(resumeid)&& !resumeid == "") {
          document.getElementById("resumeIdError").innerHTML = "Please enter numbers only.";
          return false;
        } 
    }
    
      if (fname == "") {
        document.getElementById("inputNamelError").innerHTML = "Please enter  your first name";
        return false;
      }else{
        if (!/^[a-zA-Z]+$/i.test(fname)) {
        document.getElementById("inputNamelError").innerHTML = "Please string only";
        return false;
      } 
    }
    if (!/^[a-zA-Z]+$/i.test(mname) && !mname == "") {
      document.getElementById("inputName2Error").innerHTML = "Please string only";
      return false;
    }
        if (lname == "") {
        document.getElementById("inputName3Error").innerHTML = "Please enter  your Last name";
        return false;
      }else{
      if (!/^[a-zA-Z]+$/i.test(lname)) {
        document.getElementById("inputName3Error").innerHTML = "Please string only";
        return false;
      }
    }
      if (email == "") {
        document.getElementById("inputEmailError").innerHTML = "Please enter your email";
        return false;
      }else{
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
          document.getElementById("inputEmailError").innerHTML = "Please enter a valid email address.";
          return false;
        } 
      }
      if (phone == "") {
        document.getElementById("inputPhoneError").innerHTML = "Please enter your phone";
        return false;
      }else{
        if (!/^[+]?[0-9]+$/.test(phone)) {
          document.getElementById("inputPhoneError").innerHTML = "Please enter numbers only.";
          return false;
        } 
      }
    
      if (address == "") {
        document.getElementById("inputAddressError").innerHTML = "Please enter your address";
        return false;
      }
      if (zone == "") {
        document.getElementById("inputStateError").innerHTML = "Please enter Zone";
        return false;
      }else{
      if (!/^[a-zA-Z]+$/i.test(zone)) {
        document.getElementById("inputStateError").innerHTML = "Please string only";
        return false;
      }
    }
      if (!/^[0-9]+$/.test(zip)&& !zip == "") {
        document.getElementById("inputZipError").innerHTML = "Please enter numbers only.";
        return false;
      } 
      
      
    }
  </script>