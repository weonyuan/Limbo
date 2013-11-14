<html>
  <head>
    <title>Limbo - Lost Something</title>
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
      <form action="lost.php" method="post">
        <input type="search" name="item"> <input type = "submit">
        Reported in last
        <select name="lastReported">
          <option value="7 days">7 days</option>
        </select>
      </form>
    </div>
   
     <?php
      # Connect to MySQL server and the database
      require( 'includes/connect_limbo_db.php' ) ;

      # Connect to MySQL server and the database
      require( 'includes/lost_tools.php' ) ;

      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
          $item = $_POST['item'] ;
          load('lost.php', $item);
      }
      ?>
  </body>
</html>