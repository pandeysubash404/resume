
<?php
include("../database.php");
include("session.php");
$name=$password="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Example</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link href="css/dashboard.css" rel="stylesheet">
</head>
<body class="p-5">

<?php
 $email=$_SESSION["email"];
// Check if the email and password match a record in the database
$query = "SELECT * FROM users WHERE email='$email'";    
$result = $con->query($query);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $name=$row["name"];
    $password=md5($row["password"]);
?>
<!-- onsubmit="return validateProfileForm()"     && !empty($_POST["changeCheck"] ) -->
<?php 
 if (isset($_POST["change"]) && !empty($_POST["changeName"]) && !empty($_POST["changePassword"])){
                $name=$_POST["changeName"];
                $check = $_POST["changeCheck"];
                $password = md5($_POST["changePassword"]);

                    // UPDATE the name and password  in the database
                 $querys = "UPDATE users SET name='$name',password='$password' WHERE email='$email' ";
                 $results= $con->query($querys);
                 $_SESSION["name"]=$name;
                 header("Location:../logout.php");

                  }
                  else {
                echo "Fill All";
              }
 ?>

<div class="card m-auto mt-5" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title">Change Information</h5>
    
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"  name="profileForm">
  <div class="form-group">
    <label for="changeNames">Name</label>
    <input type="text" class="form-control" id="changeNames" name="changeName" aria-describedby="emailHelp" placeholder="Enter name" value='<?php echo $name; ?>'>
    <span id="changeNameError" class="text-danger"></span>
  </div>
  <div class="form-group">
    <label for="changePasswords">Password</label>
    <input type="password" class="form-control" id="changePasswords" name="changePassword" placeholder="Password" value='<?php echo $password; ?>'>
    <span id="changePasswordError" class="text-danger"></span>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="changeChecks" name="changeCheck" value="Agreed">
    <label class="form-check-label" for="changeChecks">Agree to change</label>
    <span id="changeCheckError" class="text-danger"></span>
  </div>
  <button type="submit" name="change" class="btn btn-primary">Change</button>
</form>
<small class="text-muted">By clicking Change, you going to logout.</small>
<?php }else{
    echo "Not Found data.";
}
 ?>
</div>
</div>

 <script>
    
function validateProfileForm() {
  var name = document.forms["profileForm"]["changeName"].value;
  var password = document.forms["profileForm"]["changePassword"].value;
  var checkbox = document.forms["profileForm"]["changeCheck"].value;

  if (name == "") {
    document.getElementById("changeNameError").innerHTML = "Please enter your name";
    return false;
  }else if(!/^[ A-Za-z]*$/i.test(name)) {
    document.getElementById("changeNameError").innerHTML = "Please string only";
    return false;
     
  }
  if (password == "") {
    document.getElementById("changePasswordError").innerHTML = "Please enter your password";
    return false;
  }
  if (checkbox != "Agreed") {
    document.getElementById("changeCheckError").innerHTML = "Please check on the box.";
    return false;
  }
  
  
}
</script>





            <div class="d-flex justify-content-between align-items-center mt-5">
            <div class="d-flex align-items-center">
            <button onclick="history.back()" class="btn btn-primary">Go Back</button>
            </div>
            </div>

          
</body>
</html>
 <?php 
 ?>