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
      require('/includes/delete_tools.php');
      
      # This displays the appropriate message, based from the action executed
      if (isset($_GET['deletedadmin'])) {
        echo '<P STYLE=color:red;>Admin has been successfully deleted.</P>';
      }
      else if (isset($_GET['deleted'])) {
        echo '<P STYLE=color:red;>Item has been successfully deleted.</P>';
      }
      else if (isset($_GET['updatedadmin'])) {
        echo '<P STYLE=color:red;>Admin has been successfully updated.</P>';
      }
      else if (isset($_GET['updated'])) {
        echo '<P STYLE=color:red;>Item has been successfully updated.</P>';
      }
      else if (isset($_GET['addedadmin'])) {
        echo '<P STYLE=color:red;>Admin has been successfully added.</P>';
      }
      else if (isset($_GET['added'])) {
        echo '<P STYLE=color:red;>Item has been successfully added.</P>';
      }
      
      # Queries on stuffs, filtered by date
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
        <strong>Options:</strong>
        <div>
          Ticket(s) |
          <a href="add_ticket.php">Add Ticket</a>&nbsp;
          <a href="update_ticket.php">Update Ticket</a>&nbsp;
          <a href="claim_ticket.php">Claim Ticket</a>&nbsp;
          <a href="delete_ticket.php">Delete Ticket</a>
          
        </div>
        <div>
          Admin(s) |
          <a href="addadminform.php">Add New Admin</a>&nbsp;
          <a href="updateadminusername.php">Change Username</a>&nbsp;
          <a href="updateadminpassword.php">Change Password</a>&nbsp;
          <a href="deleteadmin.php">Delete Admin</a>
        </div>
      </div>
    </p>
  </body>
</html>