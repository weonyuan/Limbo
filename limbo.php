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
  
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <p>Home</a></p>
    
    <h1>Welcome to Limbo!</h1>
    <div>
         If you lost or found something, you're in luck: 
         this is the place to report it.
    </div>
    
    <div>
      Reported in last
      <select name="lastReported">
        <option value="7">week</option>
        <option value="30">month</option>
        <option value="90">3 months</option>
        <option value="183">6 months</option>
        <option value="365">year</option>
      </select>
    </div>
    
    <br>
    
    <?php
      # Connect to MySQL server and the database
      require( '/includes/connect_limbo_db.php' ) ;

      # Create a query to get the name and price sorted by price
      $query = 'SELECT id, update_date, item_status, description FROM stuff  ORDER BY update_date DESC' ;

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
        echo '<TH>Date/Time</TH>';
        echo '<TH>Item Status</TH>';
        echo '<TH>Stuff</TH>';
        echo '</TR>';

        # For each row result, generate a table row
        while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
          $alink = '<A HREF=lost.php?id=' . $row['id'] . '>' .
                 $row['id'] . '</A>' ;
          $alinkDesc = '<A HREF=lost.php?id=' . $row['id'] . '>' .
                   $row['description'] . '</A>' ;
          echo '<TR>' ;
          echo '<TD ALIGN=right>' . $alink . '</TD>' ;
          echo '<TD ALIGN=left>' . $row['update_date'] . '</TD>' ;
          echo '<TD ALIGN=left>' . $row['item_status'] . '</TD>' ;
          echo '<TD ALIGN=left>' . $alinkDesc . '</TD>' ;
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
  </body>
</html>