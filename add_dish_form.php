<?php
	include( "includes/header.php" );
	// connect to your MySQL database here 	

	if ( $_POST['submit'] ) {
		require( "includes/dblogin.php" );
	
		function escape_data( $data ) {
			if ( ini_get( 'magic_quotes_gpc' ) ) {
				$data = stripslashes( $data );
			}
			if ( !is_numeric( $data ) ) {
				/*
				if ( !is_numeric( $data ) ) {
				$dbLink = mysqli_connect('mysql.dannycastillo.com', 'dancas35', 'rd5Bowes', 'homedatabases');
				
				if (mysqli_connect_errno()) {
				printf("Unable to connect to database [", mysqli_connect_error());
				exit();
				}
				
				$data = mysqli_real_escape_string($dbLink, $data);
				mysqli_close($dbLink);
				}
				*/

				$data = mysql_real_escape_string( $data );
			}
			
			return $data;
		}			
		
		$name     = escape_data( $_POST['name'] );
		$price    = escape_data( $_POST['price'] );
		$desc     = escape_data( $_POST['desc'] );
		$category = escape_data( $_POST['category'] );
			
		$sql = "INSERT INTO fallMenu (id, name, `desc`, price, cat ) VALUES (NULL, '$name', '$desc', '$price', '$category' );";
	
		$result = mysql_query( $sql );
	
		if ( $result ) {
			echo "<p>The menu table has been updated</p>";
		} else {
			echo "<p>There has been an error updating the menu table</p>";
			//echo "<p>Error: " . mysqli_sqlstate($db) . "</p>";
			echo "<p>Error:" . mysql_error() . "</p>";
		}
	} else {
?>

	<div class="wrapper" style="font-family: Helvetica, Arial, sans-serif;margin: 20px auto;">
	<form id="ajax-contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="field">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
	</div>

	<div class="field">
		<label for="message">Price:</label>
		<input id="price" name="price" required>
	</div>

	<div class="field">
		<label for="desc">Description:</label>
		<textarea name="desc"></textarea>
	</div>

	<div class="field">
		<select name="category">
		<option>Sandwiches</option>
		<option>Wraps</option>
		<option>Salads</option>
		<option>Bagels</option>
		<option>Breakfast</option>
		<option>Smoothies</option>
		<option>Fountains</option>
		<option>Cake</option>
		<option>Small drinks</option>
		<option>Medium Drinks</option>
		<option>Large drinks</option>
		</select>
	</div>
	

	<div class="field">
		<!-- <button type="submit">Send</button> -->
		<input id='submit' type='submit' name='submit' value='Add Dish' />
	</div>
</form>

</div>
<?php 
	}
	
	require( "includes/footer.php" );
?>