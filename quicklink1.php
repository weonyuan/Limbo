<html>
  <head>
    <title>Quick Links</title>
  </head>
  
  <body>
    <div>
      <a href="lost.php">Lost something</a>
      <a href="found.php">Found something</a>
      <a href="admin.php">Admins</a>
    </div>
    
    <p><a href="limbo.php"> Home</a>  >  Quick Link</p>
    
    <h1>Quick Links</h1>
    
    <div>
      Reported in last
      <select name="lastReported">
        <option value="7 days">7 days</option>
      </select>
    </div>
    
    <?php
      # Connect to MySQL server and the database
      require( '/includes/connect_limbo_db.php' ) ;

      # Create a query to get the name and price sorted by price
      $query = 'SELECT id,item_status, update_date, location_id FROM stuff ORDER BY update_date DESC' ;

      # Execute the query
      $results = mysqli_query( $dbc , $query ) ;

      # Show results
      if( $results )
      {
        # But...wait until we know the query succeeded before
        # starting the table.
        echo '<TABLE border=\"2px solid black\">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Item Status</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>Location ID</TH>';
        echo '</TR>';

        # For each row result, generate a table row
        while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
        {
          echo '<TR>' ;
          echo '<TD>' . $row['id'] . '</TD>' ;
          echo '<TD>' . $row['item_status'] . '</TD>' ;
          echo '<TD>' . $row['update_date'] . '</TD>' ;
          echo '<TD>' . $row['location_id'] . '</TD>' ;
          echo '</TR>' ;
        }

        # End the table
        echo '</TABLE>';

        # Free up the results in memory
        mysqli_free_result( $results ) ;
      }
      else
      {
        # If we get here, something has gone wrong
        echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
      }

      # Close the connection
      mysqli_close( $dbc ) ;
    ?>
	<button type="button">Click Here for Full Description</button>
  </body>
</html>