<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Claim Ticket</title>
	</head>
	
	<body>
    <!-- Navigation Bar -->
    <div>
        <a href="lost.php">Lost something</a>&nbsp;
        <a href="found.php">Found something</a>&nbsp;
        <a href="admin.php">Admins</a>
    </div>
    
    <!-- Breadcrumbing -->
    <div>
      <p>
        <a href="limbo.php">Home</a> > 
        <a href="admin.php">Admin Login</a> > 
        <a href="admin-1.php">Admin Options</a> > Claim ticket
      </p>
    </div>
    
    <h1>Claim Ticket</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
    ?>
	
    <!-- Form for deletion of item -->
    <form action="claim_process.php" name="claim_ticket_form">
      
      <p>Please enter the item's ID you wish to claim.</p>
      <p>
        ID:
        <input name="id" type="int" size="5" />
        <input type="submit" value="Claim" />
      </p>
      
    </form>
	</body>
</html>