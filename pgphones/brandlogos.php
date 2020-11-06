<?php
	if(!isset($_SESSION)) { session_start(); } 
	include("dbconnection.php");
	
	$query = "SELECT * FROM categories";
	$result = mysqli_query($conn, $query);
	
	?> <div class="brandlogos"> <?php
	//Show all the categories
	while ( $row = mysqli_fetch_array($result,MYSQLI_ASSOC) ) {
		?>
		<div class="brands">
			<a href="products.php?catname=<?php echo $row["cat_name"];?>"> <img src="images/<?php echo $row["cat_picture"];?>" alt="<?php echo $row["cat_picture"];?> Logo">
			<div class="desc"><?php echo $row["cat_name"];?></div> </a>
		</div>
		<?php
	}
	
	//"Show all products" button
	?>
	<div class="brands" style="margin-left: auto; margin-right:auto;">
		<a href="products.php?catname=%%"> <img src="images/allproducts.png" alt="All products">
		<div class="desc">See all products</div> </a>
	</div>

</div> <!-- End of "brandlogos" div -->
