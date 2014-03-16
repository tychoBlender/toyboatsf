<?php
//mysqli
//$db = mysqli_connect('mysql.dannycastillo.com', 'dancas35', 'rd5Bowes', 'homedatabases');

mysql_pconnect( "mysql.dannycastillo.com", "dancas35", "rd5Bowes" ) or die ( "Unable to connect to database!" );    
mysql_select_db( "homedatabases" ); 
	
/* check connection mysqli*/
/*
if (mysqli_connect_errno()) {
	printf("Unable to connect to database", mysqli_connect_error());
	exit();
}
*/

?>