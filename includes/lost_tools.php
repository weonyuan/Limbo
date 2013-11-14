<!--
This file contains PHP login helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 7-Nov-13	Created.
JE	07-Nov-13   Modified File for Presidents table.
-->
<?php
# Includes these helper functions
//require( 'helpers.php' ) ;

# Loads a specified or default URL.
function load( $page = 'lost.php', $item) {
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the presidents id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?item=' . $item;
  
  # Execute redirect then quit.
  session_start( );
  
  header( "Location: $url" ) ;
  exit() ;
}

/*function getResults($item) {
  require( 'connect_limbo_db.php' ) ;
  
  $item =  '\'%' . $_POST['item'] . '%\'' ;
  
  # Create a query to get the name and price sorted by price
  $query = 'SELECT id, update_date, item_status, description FROM stuff ' .
           'WHERE description LIKE ' . $item . 'ORDER BY update_date DESC' ;

  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;

  # Show results
  if( $results ) {
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
    while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
    {
      echo '<TR>' ;
      echo '<TD>' . $row['id'] . '</TD>' ;
      echo '<TD>' . $row['update_date'] . '</TD>' ;
      echo '<TD>' . $row['item_status'] . '</TD>' ;
      echo '<TD><A href="#">' . $row['description'] . '</A></TD>' ;
      echo '</TR>' ;
    }

    # End the table
    echo '</TABLE>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else {
    # If we get here, something has gone wrong
    echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
  }

  # Close the connection
  mysqli_close( $dbc ) ;
}*/