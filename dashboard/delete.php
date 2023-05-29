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
include("../database.php");

if(isset($_GET["id"]) && !$_GET["id"]==""){
 //
  $update=true;
  $id=$_GET["id"];
  $results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die;
  if($results->num_rows>0){
    $sql = "DELETE FROM education WHERE id='$id'";
    mysqli_query($con, $sql);
    $sqll = "DELETE FROM employment WHERE id='$id'";
    mysqli_query($con, $sqll);
    $sqlll = "DELETE FROM skills WHERE id='$id'";
    mysqli_query($con, $sqlll);
    $sqlli = "DELETE FROM hobbies WHERE id='$id'";
    mysqli_query($con, $sqlli);
    $sqli = "DELETE FROM summary WHERE id='$id'";
    mysqli_query($con, $sqli);
    $sqly = "DELETE FROM personal WHERE id='$id'";
    mysqli_query($con, $sqly);
        header("Location:contact.php");
        exit(); // add this line to stop the script from executing further
  }
}
include("dashheader.php");
?>


<script src="js/field.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
