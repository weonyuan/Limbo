<!DOCTYPE HTML>
<html>
  <head>
    <title>Limbo - Home</title>
    
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
    <p>Home</a></p>
    
    <h1>Welcome to Limbo!</h1>
    <div>
         If you lost or found something, you're in luck: 
         this is the place to report it.
    </div>
    
	<!-- Dropdown menu -->
    <div>
      <form action="limbo.php">
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
    
    <br>
    
    <?php
      # Connect to MySQL server and the database
      #require('/includes/connect_limbo_db.php');
      
      # Includes these helper functions
      require( 'includes/helpers.php' ) ;
      
      # Initialize the database
      $dbc = init();
      
      # Connects to a helpers file that sets up the table
      require('/includes/limbo_init.php');
      
      if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
        if(isset($_GET['lastReported'])) {
          $reportedDate = $_GET['lastReported'];
          show_filtered_records($dbc, $reportedDate);
        }
        else {
          show_init_records($dbc);
        }
      }
      # Close the connection
      mysqli_close( $dbc );
    ?>
  </body>
</html>