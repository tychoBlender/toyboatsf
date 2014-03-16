<?php
	include( "includes/header.php" );
?>

<div class="wrapper">
<h1 style="text-align:left">Would You Like to Make a Reservation?</h1>
<p style="text-align:left">We accommodate reservations for parties of 6 or more. Reservations for the entire venue can be made as well. Please provide a notice 4-6 week for parties of 50 or more.</p>
<br/>
<form method="post" action="thankyou.php" style="text-align:left;">
<label for="name">Name:</label>
<input type="text" name="name"/><br>
<label for="street">Phone:</label>
<input type="text" name="street"/><br>
<label for="email">Email:</label>
<input type="text" name="email" /><br>
<label for="message">Message:</label>
<textarea type="text" name="message" rows="4" cols="32" value="What is the size of your party?"></textarea><br>
<input type="submit" value="Make Reservation" style="font-weight: bold;"/>
</form>
<img src="images/reserve.jpg" alt="reserve space for your party" width="100%"/>
</div>
<?php
	require( "includes/footer.php" );
?>