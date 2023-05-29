<?php
//database
	$serverName='localhost';
	$userName='root';
	$password='';
	$databaseName='resume_db';
	$con = mysqli_connect($serverName,$userName,$password , $databaseName);
	if(!$con)
		die("ERROR: Couldn't connect to database");

?>