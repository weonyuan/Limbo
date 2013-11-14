<?php

//connect to limbo_db
require( '/includes/connect_limbo_db.php' ) ;

//create variables for form
$description = $_POST['description'];
$room = $_POST['room'];
$owner = $_POST['owner'];
$finder = $_POST['finder'];
$item_status = $_POST['item_status'];

//insert data into table
$sql = "INSERT INTO stuff (description, room, owner, finder, item_status) VALUES ('$decription', '$room', '$owner', '$finder', '$item_status')";

//error check
if (!mysql_query($sql)) 
	{
	die('Error: ' . mysql_error());
	}
	
mysql_close();
?>