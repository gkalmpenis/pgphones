<?php
	$servername = "localhost";
	$username = "root";
	$pass = null;
	$dbname = "pgphones";
			
	$conn = mysqli_connect($servername, $username, $pass, $dbname); //Opening connection
	if (!$conn) {
		echo 'Connection failed: ' . mysqli_connect_error();
	}
?>