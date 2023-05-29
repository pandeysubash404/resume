
<?php 
 if (isset($_POST["submitlogin"])){
                $email = $_POST["email"];
                $password = md5($_POST["password"]);

                $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                $result = $con->query($query);
                
                if ($result->num_rows > 0) {
                    $row=mysqli_fetch_assoc($result);
                    // Login successful
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["name"] =$row["name"];
        $_SESSION["logged_in"] = true;
        setcookie("last_activity", time(), time() + (60 * 60 * 24 * 30));
        
        header("Location: dashboard/contact.php");
        exit;
                } 
            else {
                $login_error = "Invalid email or password";
              }
 }?>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if (!empty($login_error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $login_error; ?>
        </div>
        <?php } ?>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateloginForm()" name="loginForm">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Email address</label>
            <input type="text" class="form-control" id="loginEmail" name="email">
            <span id="loginEmailError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="loginPassword" name="password">
            <span id="loginPasswordError" class="text-danger"></span>
          </div>
          <button type="submit" class="btn btn-primary" name="submitlogin" data-bs-target="#loginModal" >Login</button>
        </form>
      </div>

     </div>
    </div>
  </div>
</div>

<?php 
 if (isset($_POST["submitregister"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"] )){
                $name=$_POST["name"];
                $email = $_POST["email"];
                $pass=$_POST["password"];
                $password = md5($_POST["password"]);
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                  // Check if the email and password match a record in the database
                  $query = "SELECT * FROM users WHERE email='$email'";    
                  $result = $con->query($query);
                  
                  if ($result->num_rows > 0) {
                    $status="alert-danger";
                    $register_error = "Email ".$email." already exist ! ".'<span id="blue" data-bs-toggle="modal" data-bs-target="#loginModal">Login ?</span>';
                  }else{
                    // Insert the email and password  in the database
                 $querys = "INSERT INTO  users(name,email,password) VALUES('$name','$email','$password')";
                 $results= $con->query($querys);
                 $status="alert-success";
                 $register_error="Remember <br>Email:".$email."<br>Password:".$pass;

                  }
                 } else {
                $status="alert-danger";
                $register_error = "Invalid email";
              }
 }?>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php if (!empty($register_error)) { ?>
        <div class="alert  <?php echo $status; ?>" role="alert">
            <?php echo $register_error; ?>
        </div>
        <?php } ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateregisterForm()" name="registerForm">
          <div class="mb-3">
            <label for="registerName" class="form-label">Name</label>
            <input type="text" class="form-control" id="registerName" name="name" id="name">
            <span id="RegisterNameError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="registerEmail" class="form-label">Email address</label>
            <input type="text" class="form-control" id="registerEmail" name="email" id="email">
            <span id="RegisterEmailError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="registerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="registerPassword" name="password" id="password">
            <span id="RegisterPasswordError" class="text-danger"></span>
          </div>
          <button type="submit" class="btn btn-primary" name="submitregister" data-bs-target="#registerModal" >Register</button>
        </form>
        <small class="text-muted">By clicking Register, you agree to the terms of use.</small>
      </div>
    </div>
  </div>
</div>

<script src="js/login.js"></script>
<!--login and register END-->