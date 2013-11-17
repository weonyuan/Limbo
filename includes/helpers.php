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
function show_link_records($dbc, $item, $reportedDate, $status) {
  $item = ' \'%' . $item . '%\' ';
  $reportedDate = 'DATE_SUB(Now(), INTERVAL ' . $reportedDate . ' DAY) ';
  $status = '\'' . $status . '\'';
  
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, update_date, item_status, description FROM stuff ' .
           'WHERE description LIKE' . $item . 'AND item_status = ' . $status .
           'AND update_date BETWEEN ' . $reportedDate . 'AND Now() ' .
           'ORDER BY update_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;
  
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

# Shows the selected record in quick link.
function show_record($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, update_date, item_status, description FROM stuff ' .
           'WHERE id=' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;
  
  # This will count the number of results in the table.
  $rowCount = mysqli_num_rows($results);

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<P>';
      echo '<A HREF=limbo.php>Limbo</A> > ';
      echo '<A HREF=lost.php>Lost something</A> > ';
      echo $row['description'];
      
      echo '<H1>' . $row['description'] . '</H1>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . $row['item_status'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Update Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['update_date'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . $row['description'] . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    
    echo '<P><A HREF=stuff.php?id=' . $row['id'] . '&full=true>' .
         'Click here for full description</A></P>';
    
    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
}

# Shows the selected record in complete info.
function show_full_record($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT s.id, s.create_date, s.update_date, s.item_status, l.name, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<P>';
      echo '<A HREF=limbo.php>Limbo</A> > ';
      echo '<A HREF=lost.php>Lost something</A> > ';
      echo $row['description'];
      
      echo '<H1>' . $row['description'] . '</H1>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . $row['item_status'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Reported Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['create_date'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Update Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['update_date'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $row['name'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . $row['description'] . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    echo '<BR>';

    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
}

# Displays the title on top of the browser.
function show_title($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, description FROM stuff WHERE id=' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<TITLE>Limbo - ' . $row['description'] . '</TITLE>';
    }
  }
  
  # Free up the results in memory
  mysqli_free_result( $results ) ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug) {
    echo "<p>Query = $query</p>" ;
  }
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true) {
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
}
?>