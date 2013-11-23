<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Add New Admin</title>
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
        <a href="admin-1.php">Admin Options</a> > Add New Admin
      </p>
    </div>
    
    <h1>Add New Admin</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
    ?>

    <!-- Creates form to add new item to limbo_db -->
    <form action="addadminprocess.php" method="POST" name="add_admin_form">
      <p>
        Username:
        <input name="username" type="text" />
      </p>
	  
	  <p>
        Password:
        <input name="password" type="password" />
      </p>
	  
      <!-- Submit and Reset button -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>
	</body>
</html>