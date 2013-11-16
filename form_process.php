<?php
#connect to limbo
define('DB_NAME', 'limbo_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

#error check
if (!$link){
    die('Could not connect: ' . mysql_error());
	}

#select database
$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
    die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
	}

#create variables for form
$description = $_POST['description'];
$room = $_POST['room'];
$owner = $_POST['owner'];
$finder = $_POST['finder'];
$item_status = $_POST['item_status'];
$location = $_POST['location'];


#insert data into table
$sql = "INSERT INTO stuff (location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status) VALUES ('$location', '$description', Now(), Now(), '$room', '$owner', '$finder', '$item_status', 'open')";



#error check
if (!mysql_query($sql)) 
	{
	die('Error: ' . mysql_error());
	}
echo 'Ticket Successfully Added.';	
mysql_close();
?>