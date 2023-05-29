<?php
session_start();

// Destroy the session
session_destroy();


// Delete the user's activity cookie
setcookie("last_activity", "", time() - (60 * 60 * 24 * 30));

// Redirect to the login page
header("Location:index.php");
exit;
?>