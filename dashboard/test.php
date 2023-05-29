<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Example</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
    <link rel = "stylesheet" href = "../css/main.css">
  <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>

        <nav class = "navbar navbar-expand-lg navbar-light bg-secondary w-100">
            <div class="container">
                <a class = "navbar-brand fw-bold fs-2 bg-secondary" href = "#">
                    <span>
                        <i class = "fa-solid fa-file-invoice"></i>
                    </span>
                    <span class = "navbar-brand-text">CV</span> CREATOR
                </a>
                 </div>
        </nav>
 

    
<?php
 include("session.php");
 include("../database.php");
?>

        <main class=" ms-sm-auto px-md-4 mt-0 m-2"> 
        
        <div class="d-flex justify-content-between align-items-center pt-3 pb-3 mb-3 border-bottom">
  <div class="d-flex align-items-center">
  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <div class="badge bg-primary rounded-circle me-2" style="font-size: 24px;">
      <?php  echo substr($_SESSION["name"], 0, 1); ?>
    </div>
    </a>
    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
    </ul>
    <div>
      <h5 class="m-0">Welcome,<?php  echo $_SESSION["name"]; ?></h5>
    </div>
  </div>
</div>



<!--Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="logoutModalLabel">Logout?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to logout?
      </div>
      <div class="modal-footer">
       <a href="../logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
      </div>
    </div>
  </div>
</div>


 <div class="container">
                <div class="row">

                <?php
              include("section/personal.php");
              include("section/summary.php");
              include("section/education.php");
              include("section/employe.php");
              include("section/skill.php");
              include("section/hobbies.php");
              ?>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                        <div class="d-flex align-items-center">
                         <?php
                         $idd="";
                         if(isset($_GET["id"]) || isset($_GET["updateId"])){
                          $idd=isset($_GET['updateId'])?$_GET['updateId']:$_GET['id'];
                         }?>
                          <a href="section/my.php?id=<?php echo $idd;?>"> <button type="button" class="btn btn-primary">Preview</button></a>
                        </div>
                        <div class="d-flex align-items-center">
                          <a href="contact.php"><button type="button" class="btn btn-primary">Home</button></a>
                        </div>
                      </div>
                </div>
              </div>

<!-- <script src="js/field.js"></script> -->
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>