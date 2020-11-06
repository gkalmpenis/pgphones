<html>

<head>
	<?php if(!isset($_SESSION)) { session_start(); } ?>
</head>
	
<body>
	<button class="checkoutbtn" type="button" onclick="document.getElementById('checkoutFormBackground').style.display='block'" style="width:auto;">Proceed to checkout</button>
	<div id="checkoutFormBackground">
		<form name="checkoutform" class="checkout-form-content" method="post" action="checkout.php">
			<img id="imgleft" src="images/checkout.png"><img id="imgright" src="images/checkout.png"><h2>Checkout form</h2>
			<h4>Please fill in the boxes below</h4>
			<div class="body">
			Name on Card <input type="text" placeholder="Card name" name="c_name" required>
			
			Credit card number <input type="text" placeholder="1111-2222-3333-4444" name="c_number" required>
			Expiration month <input type="text" placeholder="Exp month" name="c_month" required>
			Expiration year <input type="text" placeholder="2019" name="c_year" required>
			CVV <input type="text" placeholder="123" name="c_cvv" required>
			
			<br>
			<?php
				if ( isset($_SESSION["user_name"]) ) {
					echo "<div class='msg'>Your products will be sent to the following address: <br>";
					echo $_SESSION["street_name"]." ".$_SESSION["street_number"].", ".$_SESSION["zipcode"]."<br>".$_SESSION["city"].", ".$_SESSION["country"] . "</div>";
					echo "</div>"; //End of "body" div
				}
				else {
					//User will enter shipping information
					?>
					<div class="msg">Provide the shipping information</div>
					Your full name <input type="text" placeholder="Name" name="u_name" required>
					Your address <input type="text" placeholder="Address" name="u_address" required>
					Your city <input type="text" placeholder="City" name="u_city" required>
					Your country <input type="text" placeholder="Country" name="u_country" required>
					 </div> <!-- End of "body" div-->
					<?php
				}
			?>
			<br>
			<button type="submit" class="checkoutbtn">Complete shopping</button>
		</form>
		
		<!-- JS to dissapear the checkout form -->
		<script type="text/javascript" src="form_dissapear.js"></script>
		
		
	</div> <!-- End of checkout form div -->
</body>
	
</html>