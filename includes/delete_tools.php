
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

# Shows the record before confirming deletion.
function confirm_delete($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringCreateDate = 'DATE_FORMAT(s.create_date, \'%b. %D%, %Y at %r\') as createDate, ' ;
  $stringUpdateDate = 'DATE_FORMAT(s.update_date, \'%b. %D%, %Y at %r\') as updateDate' ;
	$query = 'SELECT s.id, ' . $stringCreateDate . $stringUpdateDate . ', s.item_status, l.name, s.room, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<H2>' . ucfirst($row['description']) . '</H2>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['item_status']) . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Reported Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['createDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Update Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['updateDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $row['name'] . ' ' . $row['room'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['description']) . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    echo '<BR>';
    
    echo 'Are you sure you want to delete this?';
    
    echo '<FORM ACTION="delete_process.php" METHOD="POST">';
    echo '<INPUT TYPE="hidden" NAME="id" VALUE="' . $id . '" />';
    echo '<INPUT TYPE="submit" NAME="Yes" VALUE="Yes" />';
    echo '<INPUT TYPE="submit" NAME="No" VALUE="No" />';
    echo '</FORM>';
    
    # Free up the results in memory
    mysqli_free_result( $results ) ;
  }
  else {
    echo '<P>Invalid item ID.</P>';
    echo '<FORM ACTION="delete_ticket.php" METHOD="POST">';
    echo '<INPUT TYPE="submit" NAME="Back" VALUE="Back" />';
    echo '</FORM>';
  }
}

function delete_record($dbc, $id) {
  $query = 'DELETE from stuff WHERE id = ' . $id;

  $results = mysqli_query($dbc,$query) ;
}

# Loads a specified or default URL.
function load( $page = 'delete.php' ) {
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}
?>