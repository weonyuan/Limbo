<html>
	<head>
		<title>Limbo - Change Admin Username </title>
	</head>
	
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <div>
      <p>
        <a href="limbo.php">Home</a>  > 
        <a href="admin.php">Admin Login</a> > 
        <a href="admin-1.php">Admin Options</a> > Change Admin Username
      </p>
    </div>
    
    <h1>Limbo - Change Admin Username</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
    ?>
	
    <!-- Form for updating an item -->
    <form action="username_update_process.php" method="get" name="username_update_form">
    
      <p>
        ID:
        <input name="id" type="int" />
      </p>
	  
	  <p>
        New Username:
        <input name="username" type="text" />
      </p>
      
      <p>
        Password:
        <input name="password" type="password" />
      </p>
    
      <!-- Submit and reset buttons -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>
	</body>
</html>