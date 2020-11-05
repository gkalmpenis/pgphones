<?php
    if(!isset($_SESSION))  {
        session_start(); 
    } 
	include("dbconnection.php");
	
	$user_id = $_SESSION["user_id"];
	
	//Setting a total_price variable
	$total_price = 0;
	
	//----- Showing the cart -----
	echo "<div class='head'><img src=images/cart.png>Your shopping cart<img src=images/cart.png></div>";
	
	$query = "SELECT * FROM cart WHERE user_id=$user_id";
	$result = mysqli_query($conn, $query);
	echo "<div class='scrollable'>";
	if ( mysqli_num_rows($result) > 0) {
		//Showing all products
		while ( $row=mysqli_fetch_array($result,MYSQLI_ASSOC) ) {
			//Will not show products with Quantity=0
			if ( $row["quantity"] == 0 ) {
				//Do nothing
			}
			else {
				//Getting info for each product
				$query_p = "SELECT * FROM products WHERE prod_id=$row[prod_id]";
				$result_p = mysqli_query($conn, $query_p);
				while ( $row_p=mysqli_fetch_array($result_p,MYSQLI_ASSOC) ) {
					echo "<div class='body'>";
					echo "<div id=p_img><img src=images/".$row_p["prod_picture"].">";
					echo "<div id=p_name>".$row_p["prod_name"]."</div>";
					echo "<div id=p_price>Item price: ".$row_p["prod_price"]."</div>";
					
					//Show current quantity and let user change it
					?>
					<div class="quantityform"><form id="quantityChangeForm" name="quantityChangeForm" action="cartupdate.php">
						Quantity <input type="number" name="quantity" min="0" value="<?php echo $row["quantity"];?>">
						<input type="hidden" name="user_id" value="<?php 
							if (isset ($_SESSION["user_id"]))
								echo $_SESSION["user_id"];
							else
								//if no user is logged in
								echo "-1";?>" />
						<input type="hidden" name="prod_id" value="<?php echo $row["prod_id"];?>" />
						<input type="hidden" name="commander" value="1">
						<input type="submit" id="sbmtBtn" value="Change">
					</form> </div>
					</div> <!-- div "p_img" -->
					</div> <!-- div "body" -->
					
					
					<!-- JS to change the div according the selection -->
					<script type="text/javascript" src="selection.js"></script>
					<?php
					
					$total_price = $total_price + ($row["quantity"]*$row_p["prod_price"]);
				}
			}
		}
		echo "</div>"; //End of div "scrollable"
		echo "<div style='margin: 5%; font-weight:bold;'>";
		echo "Total price: " . $total_price . "</div>";
		
		
		//"Proceed to checkout" button
		include("checkoutform.php");
	}
	else {
		echo "</div>"; //End of div "scrollable"
		echo "<div style='position: relative; bottom: 50%;'>";
		echo "The cart is empty </div>";
	}
	
	
?>