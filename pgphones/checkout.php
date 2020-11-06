<?php
	if(!isset($_SESSION)) { session_start(); }
	include("dbconnection.php");
	
	$user_id = $_SESSION["user_id"];
	
	//For this exercise no action is done with the submitted form data
	
	
	//Remove all of the user's items from the cart (shopping is completed)
	$query = "DELETE FROM cart WHERE user_id=$user_id";
	mysqli_query($conn, $query);
	if ( mysqli_affected_rows($conn) > 0 ) {
		header('Location: index.php?checkoutSuccess=1');
	}
	else {
		header('Location: index.php?checkoutSuccess=0');
	}
?>