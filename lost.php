<!DOCTYPE HTML>
<html>
  <head>
    <title>Limbo - Lost Something</title>
    
    <style>
      td, th {
        padding: 5px;
      }
    </style>
  </head>
  
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <p><a href="limbo.php"> Home</a> > Lost Something</p>
    
    <h1>Lost Something</h1>
    <div>If you have lost something, search for it here!</div>
    
    <div>
      <form action="lost.php" method="POST">
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
    
    <br>
    
     <?php
      # Connect to MySQL server and the database
      require( 'includes/connect_limbo_db.php' ) ;

      # Connect to MySQL server and the database
      require( 'includes/lost_tools.php' );
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $item = $_POST['item'];
        $reportedDate = $_POST['lastReported'];
        //load('lost.php', $item);
        show_link_records($dbc, $item, $reportedDate);
      }

      # Close the connection
      mysqli_close( $dbc );
      ?>
  </body>
</html>