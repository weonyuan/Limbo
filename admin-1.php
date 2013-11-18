<html>
  <head>
    <title>Limbo - Admin Options</title>
    
    <style>
      td, th {
        padding: 5px;
      }
    </style>
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
      <a href="limbo.php">Home</a> > 
      <a href="admin.php">Admin Login</a> > Admin Options
    </p>
    
    <h1>Admin Options</h1>
	
    <!-- Drop Down Menu -->
    <div>
      <form action="admin-1.php">
        Reported in last
        <select name="lastReported">
          <option value="7">week</option>
          <option value="30">month</option>
          <option value="90">3 months</option>
          <option value="183">6 months</option>
          <option value="365">year</option>
        </select>
        <input type="submit">
      </form>
    </div>
    
    <?php
      # Connect to MySQL server and the database
      require('/includes/connect_limbo_db.php');
      require('/includes/admin_init.php');
      
      if(isset($_GET['lastReported'])) {
        $reportedDate = $_GET['lastReported'];
        show_filtered_records($dbc, $reportedDate);
      }
      else {
        show_init_records($dbc);
      }
      
      # Close the connection
      mysqli_close( $dbc ) ;
    ?>
	
	<!-- Bottom of the Page Navigation Bar -->
	<p>
	<div>
      <a href="addticket.php">Add Ticket</a>
	  <a href="form_update.php">Update Ticket</a>
	  <a href="delete_ticket.php">Delete Ticket</a>
      <a href="#">Add New User</a>
      <a href="#">Change Password</a>
    </div>
    </p>
  </body>
</html>