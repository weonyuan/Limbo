<?php
/*
This file contains PHP helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 3-Oct-13	Created.
RC	30-Oct-13	Added show_record and show_link_records.
WY  14-Nov-13 Modified for Limbo. Added a link in item's description.
WY   6-Dec-13 Created a delete confirmation and delete_admin function.
*/

# Set this flag to false to disable debug diagnostics.
$debug = false;

# Shows the record before confirming deletion.
function confirm_delete($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringCreateDate = 'DATE_FORMAT(s.create_date, \'%b. %D%, %Y at %r\') as createDate, ';
  $stringUpdateDate = 'DATE_FORMAT(s.update_date, \'%b. %D%, %Y at %r\') as updateDate';
	$query = 'SELECT s.id, ' . $stringCreateDate . $stringUpdateDate . ', s.item_status, l.name, s.room, s.owner, s.finder, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query );

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
      echo '<TH ALIGN=center>Owner</TH>';
      echo '<TD ALIGN=left>' . $row['owner'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Finder</TH>';
      echo '<TD ALIGN=left>' . $row['finder'] . '</TD>';
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
    mysqli_free_result( $results );
  }
  else {
    echo '<P>Invalid item ID.</P>';
    echo '<FORM ACTION="delete_ticket.php" METHOD="POST">';
    echo '<INPUT TYPE="submit" NAME="Back" VALUE="Back" />';
    echo '</FORM>';
  }
}

# Deletes an item based on the ID.
function delete_record($dbc, $id) {
  $query = 'DELETE from stuff WHERE id = ' . $id;

  $results = mysqli_query($dbc,$query);
}

# Deletes an admin based on the username and ID.
function delete_admin($dbc, $username, $id) {
  # Create a query to insert an admin using the parameters above.
	$query  = 'DELETE FROM users ';
  $query .= 'WHERE username = \'' . $username . '\' ';
  $query .= 'AND id = ' . $id;

	# Execute the query
	$results = mysqli_query($dbc, $query);
}
?>