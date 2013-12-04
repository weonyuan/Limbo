<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Delete Ticket </title>
    
    <style>
      td, th {
        padding: 5px;
      }
    </style>
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
        <a href="admin-1.php">Admin Options</a> > Delete ticket
      </p>
    </div>
    
    <h1>Limbo - Delete Ticket</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/delete_tools.php' ) ;
            
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        confirm_delete($dbc, $id);
      }
    ?>
	</body>
</html>