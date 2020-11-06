<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" href="images/favicon.ico">
		<script src="jquery-3.3.1.min.js"></script>
		<?php
			session_start();
			include("dbconnection.php");
		?>
	</head>

	<body>
		<div class="header">
		  <a href="index.php"> <img class="logo" src="images/logo.png" alt="Company Logo"> </a>
			<?php
				//Checking for registration errors
				if ( isset($_GET["regerror"]) && $_GET["regerror"]==1 ) {
					echo "<div id=reg_error>The email you entered is already in use. Please try registering with another email</div>";
				}
				else if ( isset($_GET["regerror"]) && $_GET["regerror"]==0 ) {
					echo "<div id=reg_success>Successful registration!</div>";
				}
			?>
		  <div class="header-right">
			<?php
				//If session variables are set
				if ( isset($_SESSION["user_name"]) ) {
					echo "<div id='welcomemsg'>Welcome " . $_SESSION["user_name"] . "</div>";
					?>
					<a class="btn" href="logout.php">Logout</a>
					<?php
				}
				//If login form was submitted
				else if ( isset($_POST["email"]) && isset($_POST["password"]) ) {
					$email = $_POST["email"];
					$password = $_POST["password"];
					$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
					$result = mysqli_query($conn, $query); //Execute query
					
					if (mysqli_num_rows($result) == 0) {
						echo "<div id=errormsg>Wrong credentials</div>";
						
						//Show to login form next to the message
						include("loginform.html");
					}
					else {
						$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
						$_SESSION["user_id"] = $row["user_id"];
						$_SESSION["user_name"] = $row["name"];
						$_SESSION["email"] = $row["email"];
						$_SESSION["telephone"] = $row["telephone"];
						$_SESSION["street_name"] = $row["street_name"];
						$_SESSION["street_number"] = $row["street_number"];
						$_SESSION["zipcode"] = $row["zipcode"];
						$_SESSION["city"] = $row["city"];
						$_SESSION["country"] = $row["country"];
						echo "<div id=welcomemsg>Welcome " . $_SESSION["user_name"] . "</div>";
						?>
						<a class="btn" href="logout.php">Logout</a>
						<?php
					}
				}
				//Else just show the login form
				else {
					include("loginform.html");
					
					//Default Session user_id is -1
					$_SESSION["user_id"] = -1;
				}
				?>
				
			<!--Registration form -->
			<?php include("regform.html")?>
			
		  </div> <!-- End of header-right div -->
		</div> <!-- End of header div -->
		
		
		<!-- Showing the shop info -->
		<?php include("shopinfo.html"); ?>
		
		
		<!-- Showing the brand logos -->
		<?php include("brandlogos.php")?>
		
		<!-- JS to change the div according the selection -->
		<script type="text/javascript" src="selection.js"></script>
		
		<div class="cart">
			<?php include("showcart.php");?>
		</div>
		
		<?php
			//Alert box for checkout success
			if ( isset($_GET['checkoutSuccess']) && $_GET['checkoutSuccess']==1 ) {
				 echo "<script>alert('The checkout was successful')</script>";
			}
			else if (isset($_GET['checkoutSuccess']) && $_GET['checkoutSuccess']==0) {
				echo "<script>alert('There was a problem with the checkout procedure')</script>";
			}
		?>
	</body>
</html>