<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
  // Redirect to the login page
  header("Location:../index.php");
  exit;
}

// Set the cache-control header to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>