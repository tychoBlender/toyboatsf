<?php
	include( "includes/header.php" );
	// connect to your MySQL database here 	
	require( "includes/dblogin.php" );	
			
	// Grab POSTED variables w/ escaped data 
	$name 	  = escape_data($_POST['name']); 
	$price 	  = escape_data($_POST['price']); 
	$desc 	  = escape_data($_POST['desc']); 
	$category = escape_data($_POST['category']);

	
	// Build sql command 
	//$sqlCommand = "INSERT INTO `fallMenu` (`id`, `name`, `price`, `desc`,`cat` ) VALUES ( NULL, '".$name."', '".$price."', '".$desc."', '".$category."')"; 
	
	$result = mysqli_query($sqlCommand);
	
	// Execute the query here now  
	if ($result) {
?>
	<div class="wrapper" style="font-family: Helvetica, Arial, sans-serif;margin: 20px auto;">
	<p>The menu page has been updated!</p>
	<h1>You posted a new item called: <br> 
	<?php echo $_POST['name'] ?>
	</h1>
	<br/> 
	with a description: <?php echo $_POST['desc']?>
	<br/>
<?php
	} else {
?>
	<p>There has been a problem updating your menu</p><br>
	<p>Error: <?php mysqli_sqlstate($db)?> </p>
<?php
	}	
?>
</div>
<?php 
	require( "includes/footer.php" );
?>