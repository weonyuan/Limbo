<!DOCTYPE HTML>
<html>
  <head>
    <title>Limbo - Update Ticket Process</title>
  </head>
  
  <!-- Navigation Bar -->
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
	
	<!-- Breadcrumbing -->
    <p>
      <a href="limbo.php"> Home</a> > 
      <a href="admin.php">Admin Login</a> > 
      <a href="admin-1.php">Admin Options</a> > 
      <a href="form_update.php">Update Ticket</a> > Ticket Updated </p>
	
			<?php
        #connect to limbo
        define('DB_NAME', 'limbo_db');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        define('DB_HOST', 'localhost');

        $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

        #error check
        if (!$link) {
          die('Could not connect: ' . mysql_error());
        }

        #select database
        $db_selected = mysql_select_db(DB_NAME, $link);

        if (!$db_selected) {
          die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
        }

        #create variables for form
        $id = $_GET['id'];
        $description = $_GET['description'];
        $room = $_GET['room'];
        $owner = $_GET['owner'];
        $finder = $_GET['finder'];
        $item_status = $_GET['item_status'];
        $location = $_GET['location'];
        $ticket_status = $_GET['ticket_status'];


        #update data in table
        $sql = "UPDATE stuff SET location_id = '$location', description = '$description', update_date = Now(), room = '$room', owner = '$owner', finder = '$finder', item_status = '$item_status', ticket_status = '$ticket_status' WHERE id = $id";

        mysql_query($sql, $link);

        #error check
        if (!mysql_query($sql)) {
          die('Error: ' . mysql_error());
        }
        echo '<h1>Ticket Successfully Edited.</h1>';	
        mysql_close();
			?>
	</body>
</html>