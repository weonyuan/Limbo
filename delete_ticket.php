<html>
	<head>
		<title> Delete Ticket </title>
	</head>
	<div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
	</div>
	
	<div>
	<p><a href="limbo.php"> Home</a>  > <a href="admin.php"> Admin Login</a> > <a href="admin-1.php"> Admin Options</a> > Delete ticket</p>
	</div>
	<h1>Limbo - Delete Ticket</h1>
	<body>
	
	<?php
	//connect to limbo_db
	require( '/includes/connect_limbo_db.php' ) ;
	?>
	
	<form action="delete_process.php" method="get" name="delete_ticket_form">
	
		<p>
		ID:
		<input name="id" type="int" />
		</p>
		
	<input type="submit" name="submit" id="submit" value="Submit" />
	<input type="reset" name="reset" id="reset" value="Reset" />
	</form>
	
	<body>
</html>