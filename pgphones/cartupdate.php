<?php
	session_start();
	include("dbconnection.php");
	
	//Getting the values
	$user_id = $_GET["user_id"];
	$prod_id = $_GET["prod_id"];
	$quantity = $_GET["quantity"];
	$commander = $_GET["commander"]; //0 is products, 1 is cart
	
	
	//Command came from the products section
	if ( $commander == 0 ) {
		//Checking if user already has this prod_id, to increase its quantity
		$query = "SELECT * FROM cart WHERE user_id=$user_id AND prod_id=$prod_id";
		$result = mysqli_query($conn, $query);
		if ( mysqli_num_rows($result) > 0 ) {
			$query = "UPDATE cart SET quantity=quantity+$quantity WHERE user_id=$user_id AND prod_id=$prod_id";
			$result = mysqli_query($conn, $query); //<--Not checked if properly done
		}
		else {
			$query = "INSERT INTO cart (user_id, prod_id, quantity) VALUES ($user_id, $prod_id, '$quantity')";
			$result = mysqli_query($conn, $query); //<--Not checked if properly done
		}
	}
	//Command came from the cart section
	else if ( $commander == 1 ) {
		$query = "UPDATE cart SET quantity='$quantity' WHERE user_id=$user_id AND prod_id=$prod_id";
		$result = mysqli_query($conn, $query); //<--Not checked if properly done
	}
	
	//Now show the cart
	include("showcart.php");
?>