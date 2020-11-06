<?php
	session_start();
	include("dbconnection.php");
	
	
	//Getting the requested category name
	$cat_name = $_GET["catname"]; 
	
	//Searching for its id
	$query = "SELECT * FROM categories WHERE cat_name LIKE '$cat_name'";
	$result = mysqli_query($conn, $query);
	
	//If 1 row returned, user chose a specific category
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$cat_id = $row["cat_id"];
	}
	//Else if >1 rows returned, user chose all categories
	else if (mysqli_num_rows($result) > 1) {
		$cat_id = "%%";
	}
	
	$query = "SELECT * FROM products WHERE cat_id LIKE '$cat_id' ORDER BY prod_price DESC";
	$result = mysqli_query($conn, $query);
	
	//Back to brands selection link
	?>
	<div class="backbtn">
		<a href="index.php"><img src="images/back.png"><div class="txt">Back to brand selection</div></a>
	</div>
	<?php
	echo "<div class=prods>";
	while ( $row=mysqli_fetch_array($result,MYSQLI_ASSOC) ) {
		echo "<div class=prodAppearance>";
			echo "<div id=p_img><img src=images/".$row["prod_picture"].">";
			echo "<div id=p_name>".$row["prod_name"]."</div>";
			echo "<div id=p_desc>".$row["prod_desc"]."</div>";
			echo "<div id=p_price>Price: ".$row["prod_price"]."</div>";
			
			//Quantity and "add to cart" button
			?>
			<div class="addCartForm"><form id="addCartForm" name="addCartForm" action="cartupdate.php">
				Quantity <input type="number" name="quantity" min="0" value="1">
				<input type="hidden" name="user_id" value="<?php 
					if (isset ($_SESSION["user_id"]))
						echo $_SESSION["user_id"];
					else
						//if no user is logged in
						echo "-1";?>" />
				<input type="hidden" name="prod_id" value="<?php echo $row["prod_id"];?>" />
				<input type="hidden" name="commander" value="0">
				<input type="submit" id="sbmtBtn" value="Add to cart">
			</form> </div>
			</div> <!-- End of p_img div -->
			
			
			<!-- JS to change the div according the selection -->
			<script type="text/javascript" src="selection.js"></script>
			<?php
		echo "</div>"; //End of "prodAppearance" div
	}
	echo "</div>"; //End of "prods" div
?>