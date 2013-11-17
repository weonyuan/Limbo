<?php
/*
This file contains PHP helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 3-Oct-13	Created.
RC	30-Oct-13	Added show_record and show_link_records.
WY  14-Nov-13 Modified for Limbo. Added a link in item's description.
*/

# Set this flag to false to disable debug diagnostics.
$debug = true;

# Shows the records in stuff
function show_init_records($dbc) {
  # Create a query to get the name and price sorted by price
  $query = 'SELECT id, update_date, item_status, description, ticket_status FROM stuff ORDER BY update_date DESC' ;

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
    echo '<TH>Ticket Status</TH';
    echo '</TR>';

    # For each row result, generate a table row
    while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      $alink = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
             $row['id'] . '</A>' ;
      $alinkDesc = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
               $row['description'] . '</A>' ;
      echo '<TR>' ;
      echo '<TD ALIGN=right>' . $alink . '</TD>' ;
      echo '<TD ALIGN=left>' . $row['update_date'] . '</TD>' ;
      echo '<TD ALIGN=left>' . $row['item_status'] . '</TD>' ;
      echo '<TD ALIGN=left>' . $alinkDesc . '</TD>' ;
      echo '<TD ALIGN=left>' . $row['ticket_status'] . '</TD>' ;
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
}

# Shows the selected record in complete info.
function show_filtered_records($dbc, $reportedDate) {
  $reportedDate = 'DATE_SUB(Now(), INTERVAL ' . $reportedDate . ' DAY) ';
  
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, update_date, item_status, description, ticket_status FROM stuff ' .
           'WHERE update_date BETWEEN ' . $reportedDate . 'AND Now() ' .
           'ORDER BY update_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
  
  # This will count the number of results in the table.
  $rowCount = mysqli_num_rows($results);
  
  if($rowCount > 0) {
    # Show results
    if( $results ) {
      # But...wait until we know the query succeeded before
      # rendering the table start.
      echo '<BR>';
      echo '<TABLE border=\"2px solid black\">';
      echo '<TR>';
      echo '<TH>ID</TH>';
      echo '<TH>Update Date</TH>';
      echo '<TH>Item Status</TH>';
      echo '<TH>Description</TH>';
      echo '<TH>Ticket Status</TH';
      echo '</TR>';

      # For each row result, generate a table row
      while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
        $alink = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
                 $row['id'] . '</A>' ;
        $alinkDesc = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
                 $row['description'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo '<TD ALIGN=left>' . $row['update_date'] . '</TD>' ;
        echo '<TD ALIGN=left>' . $row['item_status'] . '</TD>' ;
        echo '<TD ALIGN=left>' . $alinkDesc . '</TD>' ;
        echo '<TD ALIGN=left>' . $row['ticket_status'] . '</TD>' ;
        echo '</TR>' ;
      }

      # End the table
      echo '</TABLE>';

      # Free up the results in memory
      mysqli_free_result( $results ) ;
    }
  }
  else {
    echo '<P>No results found.</P>' ;
  }
}
?>