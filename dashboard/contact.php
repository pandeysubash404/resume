<?php
include("../database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Example</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
    <link rel = "stylesheet" href = "../css/main.css">
  <link href="../css/dashboard.css" rel="stylesheet">
  <style>
    a{
      color:black;
    }
    </style>
</head>
<body>

        <nav class = "navbar navbar-expand-lg navbar-light bg-secondary">
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
$mail=$_SESSION["email"];
$results = mysqli_query($con, "SELECT * FROM personal WHERE user_email='$mail'") or die;
?>
            <div class="d-flex justify-content-between align-items-center pt-3 pb-3 m-3 border-bottom">
  <div class="d-flex align-items-center">
  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <div class="badge bg-primary rounded-circle me-2" style="font-size: 24px;">
      <?php echo substr($_SESSION["name"], 0, 1); ?>
    </div>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="profile.php">Profile</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
    </ul>
    <div>
      <h5 class="m-0">Welcome,<?php echo $_SESSION["name"]; ?></h5>
    </div>
  </div>
</div>

<div class="d-flex flex-wrap justify-content-center bg-white m-5 position-relative">
  <div class="card text-center m-5" style="width: 200px; height: 250px;">
    <a href="test.php" class="text-decoration-none ">
      <div class="card-body pt-5 pb-12 text-center">
        <h5 class="card-title">Create New Resume</h5>
        <p class="card-text fs-1">+</p>
      </div>
    </a>
  </div>

  <?php while ($row = mysqli_fetch_array($results)) { ?>
  <div class="card items-center m-5 h-200" style="width: 200px;">
  <div class="card-body pt-4 text-wrap text-decoration-none">
    <a href="section/my.php?id=<?php echo $row['id']; ?>" class="text-decoration-none ">
    <!-- <img src="../img/Basic.jpg" alt="" class="img-fluid"> -->
    <ul>
      <h6 class="font-weight-normal"><?php echo $row['first_name']; ?></h6>
      <p><?php echo $row['email']; ?></p>
      <p><?php echo $row['phone_number'];?> </p>
      <p><?php echo $row['address']; ?></p>
  </ul>
  </a>
    <div class="dropup-center dropup">
      <button class="badge border border-1 position-absolute bottom-0 end-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="../img/three-dots.svg" alt="" class="img-fluid">
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Download</a></li>
        <li><a class="dropdown-item" href="#">Share</a></li>
        <li><a class="dropdown-item" href="test.php?updateId=<?php echo $row['id']; ?>">Edit</a></li>
        <li><p class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</p></li>
      </ul>
    </div>
  </div>
</div>

<!--delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete resume?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this resume?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
       <a href="delete.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-primary">Delete</button></a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
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



</div>


</div>
        



    </main>
  </div>
</div>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
