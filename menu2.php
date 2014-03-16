<?php
	include( "includes/header.php" );
?>

<nav id="menu">
<ul style="list-style-type:none;margin:20px auto;text-align:center;">
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Sandwiches'?>">SANDWICHES</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Wraps'?>">WRAPS</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Salads'?>">SALAD/SOUP</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Breakfast'?>">BREAKFAST</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Smoothies'?>">SMOOTHIES</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Fountains'?>">FOUNTAIN</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Cake'?>">CAKE</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF']. '?category=Medium Drinks'?>">DRINKS</a></li>
<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>">All</a></li>
</ul>
</nav>
<div class="wrapper">
<?php 

	// Include the connection script 
	require( "includes/dblogin.php");

	
	// Check for the $_GET['category']
	if ( isset( $_GET['category'] ) ) {
		// category is set so load only menu items that match the category chosen
		$results = mysql_query( "SELECT * FROM fallMenu WHERE cat='{$_GET['category']}' ORDER BY `name`" );
		
		if (!$results) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		
	} else {
		// Category is not set so load the entire menu
		$query ="SELECT * FROM fallMenu ORDER BY cat, name";
		$results = mysql_query($query);
		
		if (!$results) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
	}
	
	// Display the results
	
	$current_cat = ""; // Use this variable to mark the current category. 

	$i = 0;
	while ( $myrow = mysql_fetch_array( $results ) ) {
		// Gather all $row values into local variables 
		$name 	= $myrow['name']; 
		$price 	= $myrow['price']; 
		$desc 	= $myrow['desc'];
		// Check the category 
		if ( $myrow['cat'] != $current_cat ) { // If the current category does not match $current_cat
			echo "</section>";
			echo "<section>";
			if ( $myrow['cat'] == "Bagels" ) {
				$cat = "Bagels";
			} else if ( $myrow['cat'] == "Breakfast" ) {
				$cat = "Breakfast";

			} else if ( $myrow['cat'] == "Cake" ) {
				$cat = "Cake";

			} else if ( $myrow['cat'] == "Fountains" ) {
				$cat = "Fountains";

			} else if ( $myrow['cat'] == "Medium Drinks" ) {
				$cat = "Drinks";

			} else if ( $myrow['cat'] == "Salads" ) {
				$cat = "Salad/Soup";

			} else if ( $myrow['cat'] == "Sandwiches" ) {
				$cat = "Sandwiches";

			} else if ( $myrow['cat'] == "Smoothies" ) {
				$cat = "Smoothies";

			} else if ( $myrow['cat'] == "Wraps" ) {
				$cat = "Wraps";

			}
		
			
			echo "<header>
				  <h1>$cat</h1>
				  <div class='diamondWrap'>
				  <div class='diamond'></div>
				  <div class='diamond'></div>
				  <div class='diamond'></div>
				  </div>
				  <hr style='clear:both;border:none;height:5px;background: #333;margin:0;'>
				  </header>";
		   
	
			$current_cat = $myrow['cat']; // set $current_cat to the value of the current category.
		}
	
		// Each item will be displayed in a div
		echo "<div class='item'>
			 <p class='name'>$name <small class='price'>$price</small></p> 
			 <p class='desc'>$desc</p>
			 </div>";
	    
		$i++;
	        	
	}
?>

</div> <!--close wrapper-->
<?php
	require( "includes/footer.php" );
?>