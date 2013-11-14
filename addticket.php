<html>
	<head>
		<title> Add Ticket </title>
	</head>
	<div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
	</div>
	
	<div>
	<p><a href="limbo.php"> Home</a>  > <a href="admin.php"> Admin Login</a> > <a href="admin-1.php"> Admin Options</a> > Add ticket</p>
	</div>
	<h1>Add Ticket</h1>
	<body>
	
	<?php
	//connect to limbo_db
	require( '/includes/connect_limbo_db.php' ) ;
	?>
	
	<form action="form_process.php" method="post" name="add_ticket_form">
		<p>
		Description:
		<input name="description" type="text" />
		</p>
		
		<p>
		Room:
		<input name="room" type="text" />
		</p>
		
		<p>
		Owner (If Applies):
		<input name="owner" type="text" />
		</p>
		
		<p>
		Finder (If Applies):
		<input name="finder" type="text" />
		</p>
		
		<p>
		Item Status:
		<input name="item_status" type="text" />
		</p>
	
	<input type="submit" name="submit" id="submit" value="Submit" />
	<input type="reset" name="reset" id="reset" value="Reset" />
	</form>
	
	<body>
</html>