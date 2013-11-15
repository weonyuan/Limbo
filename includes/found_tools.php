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

# Shows the records in prints
function show_link_records($dbc, $item, $reportedDate) {
  $item = ' \'%' . $item . '%\' ';
  $reportedDate = 'DATE_SUB(Now(), INTERVAL ' . $reportedDate . ' DAY) ';
  
  # Create a query to get the name and price sorted by price
	$query = 'SELECT id, update_date, item_status, description FROM stuff ' .
           'WHERE description LIKE' . $item . 'AND item_status = \'found\' ' .
           'AND update_date BETWEEN ' . $reportedDate . 'AND Now() ' .
           'ORDER BY update_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeeded before
  		# rendering the table start.
  		echo '<TABLE border=\"2px solid black\">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Update Date</TH>';
  		echo '<TH>Item Status</TH>';
  		echo '<TH>Description</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=found.php?id=' . $row['id'] . '>' .
                 $row['id'] . '</A>' ;
        $alinkDesc = '<A HREF=found.php?id=' . $row['id'] . '>' .
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

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}
?>