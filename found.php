<html>
  <head>
    <title>Limbo - Home</title>
  </head>
  
  <body>
    <div>
      <a href="lost.php">Lost something</a>;
      <a href="found.php">Found something</a>;
      <a href="admin.php">Admins</a>;
    </div>
    
    <p><a href="limbo.php"> Home</a> > Found Something</p>
    
    <h1>Found Something</h1>
    <div>
         If you have found something, search for it here!
    </div>
    
   <div>
      <form action="found.php" method="POST">
        <input type="search" name="item"> <input type="submit">
        Reported in last
        <select name="lastReported">
          <option value="7">week</option>
          <option value="30">month</option>
          <option value="90">3 months</option>
          <option value="183">6 months</option>
          <option value="365">year</option>
        </select>
      </form>
    </div>
	
	<?php
      # Connect to MySQL server and the database
      require( 'includes/connect_limbo_db.php' ) ;

      # Connect to MySQL server and the database
      require( 'includes/found_tools.php' );
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $item = $_POST['item'];
        $reportedDate = $_POST['lastReported'];
        //load('found.php', $item);
        show_link_records($dbc, $item, $reportedDate);
      }

      # Close the connection
      mysqli_close( $dbc );
      ?>
  </body>
</html>