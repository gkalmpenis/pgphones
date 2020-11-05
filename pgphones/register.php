<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			session_start();
			include("dbconnection.php");
		?>
	</head>
	
	<body>
		<?php
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$phone = $_POST["phone"];
			$st_name = $_POST["st_name"];
			$st_num = $_POST["st_num"];
			$zipcode = $_POST["zip"];
			$city = $_POST["city"];
			$country = $_POST["country"];
			
			//Checking if there is another user with the same email
			$query = "SELECT * FROM users WHERE email='$email' ";
			$result = mysqli_query($conn, $query); 
			$rows = mysqli_num_rows($result);	
			if ($rows > 0){	
				header('Location: index.php?regerror=1'); //Redirecting, regerror=1
			}
			else { //Creating new record
				
				$query = "INSERT INTO users(name, email, password, telephone, street_name, street_number, zipcode, city, country) VALUES ('$name', '$email', '$password', '$phone', '$st_name', '$st_num', '$zipcode', '$city', '$country')";
				$result = mysqli_query($conn, $query); 	
				
				if ($result == 1){	
					header('Location: index.php?regerror=0'); //Redirecting, regerror=0
				}
				else {
					echo "Error during data insertion " . mysqli_error($conn) . "<br>";
					echo "<a href=index.php>Home page</a>";
				}		
			}
		?>
	</body>
</html>