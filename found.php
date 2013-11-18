<!DOCTYPE HTML>
<html>
  <head>
    <title>Limbo - Found Something</title>
    
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
    <p><a href="limbo.php">Home</a> > Found Something</p>
    
    <h1>Found Something</h1>
    <div>If you have found something, search for it here!</div>
    
	<!-- Dropdown menu -->
    <div>
      <form action="found.php">
        <input type="search" name="item">
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
      require( 'includes/connect_limbo_db.php' ) ;

      # Connect to MySQL server and the database
      require( 'includes/helpers.php' );
      
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['item'])) {
          $item = $_GET['item'];
          $reportedDate = $_GET['lastReported'];
          $status = 'found';
          show_link_records($dbc, $item, $reportedDate, $status);
        }
      }

      # Close the connection
      mysqli_close( $dbc );
    ?>
  </body>
</html>