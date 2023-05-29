
<?php
if(isset($_GET['id']) &&  !$_GET['id']==""){
	$id=$_GET['id'];

include("../../database.php");
include("../session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar Example</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/style.css">
    <link rel = "stylesheet" href = "../../css/main.css">
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
<main class=" ms-sm-auto px-md-4 mt-0"> 
<div class="d-flex justify-content-between align-items-center pt-3 pb-3 m-3 border-bottom">
  <div class="d-flex align-items-center">
	<div class="nav-link " id="navbarDropdown" role="button" data-bs-toggle="dropdown"  data-bs-target="#bar" aria-expanded="false">
		<div class="badge bg-primary rounded-circle me-2" style="font-size: 24px;">
		<?php echo substr($_SESSION["name"], 0, 1); ?>
		</div>
</div>
		<ul class="dropdown-menu " aria-labelledby="navbarDropdown" id="bar">
		<li><a class="dropdown-item" href="#">Profile</a></li>
		<li><a class="dropdown-item" href="#">Settings</a></li>
		<li><hr class="dropdown-divider"></li>
		<li><a class="dropdown-item" href="../logout.php">Logout</a></li>
		</ul>
		<div>
		<h5 class="m-0">Welcome,<?php echo $_SESSION["name"]; ?></h5>
		</div>
  </div>
  <div class="d-flex align-items-center">
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group me-2">
			<button type="button" class="btn btn-sm btn-outline-primary">Share</button>
			<button type="button" class="btn btn-sm btn-outline-primary">Export</button>
		</div>
	  </div>
	</div>
  </div>


  <div class="card mb-3">
  <div class="card-img-top bg-primary p-3">
  <?php 
			$results = mysqli_query($con, "SELECT * FROM personal WHERE id='$id'") or die();
			if($results->num_rows > 0){
				$row = mysqli_fetch_array($results);
		?>
			<div  class="text-light">
				<h1 class=" mt-0 mb-0"><?php echo $row['first_name']." ". $row['middle_name']." ".$row['last_name']; ?></h1>
				<p class="mt-2 mb-2"><?php echo $row['email']; ?></p>
				<p class="mt-2 mb-2"><?php echo $row['phone_number']; ?></p>
				<p class="mt-2 mb-2"><?php echo $row['address']." , ".$row['city']." , ".$row['state']." - ".$row['zip_code']; ?></p>
			</div>
			</div>
		<?php }
			$resuly = mysqli_query($con, "SELECT * FROM summary WHERE id='$id'") or die();
			if($resuly->num_rows > 0){
				$rowsy = mysqli_fetch_array($resuly);
		?>
</div>
  <div class="card-body">
  <div class="p-3">
	<div class="section">
		<h3 class="mb-3">Summary</h3>
		<p class="mt-0 mb-2 m-2"><?php echo $rowsy['summaries']; ?></p>
	</div>
   </div>
		<?php } 
			$result = mysqli_query($con, "SELECT * FROM employment WHERE id='$id'") or die();
			if($result->num_rows > 0){
		?>
		<div class="p-3">
		<div class="section">
				<h3 class="mb-3">Experience</h3>
				<ul class="list-unstyled">
					<?php while($rows = mysqli_fetch_array($result)){ ?>
						<li class="media mb-4">
							<div class="media-body">
								<h6 class="mt-0 mb-1 m-4"><?php echo $rows['job_title']; ?></h6>
								<p class="mt-0 mb-2 m-4"><?php echo $rows['company_name']; ?> | <?php echo $rows['start_date']; ?> to <?php echo $rows['end_date']; ?> </p>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } 
			$resultss = mysqli_query($con, "SELECT * FROM education WHERE id='$id'") or die();
			if($resultss->num_rows > 0){
		?>
		<div class="p-3">
		<div class="section">
				<h3 class="mb-3">Education</h3>
				<?php while($rowss = mysqli_fetch_array($resultss)){ ?>
					<div class="media mb-4">
						<div class="media-body">
							<h6 class="mt-0 mb-2 m-4"><?php echo $rowss['education_level']; ?></h6>
							<p class="mt-0 mb-1 m-4"><?php echo $rowss['school']." , ". $rowss['city']; ?></p>
							<p class="mt-0 mb-1 m-4 "><?php echo $rowss['start_date']." to ".$rowss['end_date']; ?> </p>
							</div>
						</div>
					
				<?php } }
					$res = mysqli_query($con, "SELECT * FROM skills WHERE id='$id'") or die();
					if($res->num_rows>0){
					?>
				</div>
				</div>
				<div class="p-3">
				<div class="section">
					<h2 class="mb-3">Skills</h2>
					<ul class="list-unstyled">
						<li class="media mb-4">
							<div class="media-body">
							<ul type = "disc">
							<?php while($ro = mysqli_fetch_array($res)){ ?>
								<li class="mt-0 mb-1 m-4"><?php echo $ro['skill']." - ".$ro['proficiency_level'];?></li>
							<?php }?>
							</ul>
							</div>
						</li>
						</ul>
					</div>
				<?php } 
					$resu = mysqli_query($con, "SELECT * FROM hobbies WHERE id='$id'") or die();
					if($resu->num_rows>0){
					?>
					<div class="p-3">
					<div class="section">
					<h3 class="mb-3">Hobbies</h3>
					<ul class="list-unstyled">
						<li class="media mb-4">
							<div class="media-body">
							<ul type = "disc">
							<?php while($ros = mysqli_fetch_array($resu)){ ?>
								<li class="mt-0 mb-1 m-4"><?php echo $ros['hobbiesname'];?></li>
							<?php }?>
							</ul>
							</div>
						</li>
					</ul>
				</div>
				<?php } ?>
			 </div>

  </div>  
  <!-- div -->

 				<div class="d-flex justify-content-between align-items-center mt-5 m-2">
					 <div class="d-flex align-items-center">
					 <a href="../contact.php"><button type="button" class="btn btn-primary">Home</button></a>
					 </div>
					 <div class="d-flex align-items-center">
					<button onclick="history.back()" class="btn btn-primary">Go Back</button>
					</div>
					</div>
              </div>
		</main>
</body>
</html>
 <?php }else{
	// Redirect back to previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
} 
 ?>